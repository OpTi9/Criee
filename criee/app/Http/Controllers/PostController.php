<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Avoir;
use App\Models\Bac;
use App\Models\Bateau;
use App\Models\DatePeche;
use App\Models\Encherir;
use App\Models\Espece;
use App\Models\Post;
use App\Models\Presentation;
use App\Models\Qualite;
use App\Models\Taille;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        // unauthorised user can't use any methods except index and show
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // check if user searched something using navbar
        if ($request->search) {
            $posts = Post::join('users', 'author-id', '=', 'users.id')
                    ->where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%')
                    ->orWhere('users.name', 'like', '%'.$request->search.'%')
                    ->orderBy('posts.created_at', 'desc')
                    ->get();
            return view('posts.index', compact('posts'));
        }

        // join posts and users
        $posts = Post::join('users', 'author-id', '=', 'users.id')
                ->orderBy('posts.created_at', 'desc')
                ->simplePaginate(8);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // bacs:
        $bacs = Bac::pluck('libelle', 'bac_id');
        $especes = Espece::pluck('libelle', 'espece_id');
        $tailles = Taille::pluck('libelle', 'taille_id');
        $bateaux = Bateau::pluck('nom', 'bateau_id');
        $presentations = Presentation::pluck('libelle', 'presentation_id');
        $qualites = Qualite::pluck('libelle', 'qualite_id');
        $dates = DatePeche::pluck('datePeche', 'date_id');
        return view('posts.create', compact('bacs','especes','tailles', 'bateaux','presentations','qualites', 'dates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // this method is called when we fill a form and click send

        // we use post model to access db post table
        // create variable and store all info we want to send into db
        $post = new Post();

        // fill the post variable using data from form that user filled:
        $post->title = $request->title;
        $post->description = $request->description;
        $post->brut = $request->brut;
        $post->prixDepart = $request->prixDepart;
        $post->prixActuel = $request->prixDepart;
        $post->prixPlancher = $request->prixPlancher;
        $post->espece_id = $request->espece_id;
        $post->taille_id = $request->taille_id;
        $post->bac_id = $request->bac_id;
        $post->bateau_id = $request->bateau_id;
        $post->presentation_id = $request->presentation_id;
        $post->qualite_id = $request->qualite_id;
        $post->date_id = $request->date_id;

        // author id
        $post->{'author-id'} = \Auth::user()->id;

        // check if image exists
        if ($request->file('img'))
        {
            // add image in storage folder
            $path = Storage::putFile('public', $request->file('img'));
            // create link to image
            $url = Storage::url($path);
            // save link to image in database
            $post->img = $url;
        }

        // save entry in db
        $post->save();

        // values to insert to encherir table:
        $postIdFromDB = Post::where([
            ['title', '=', $post->title],
            ['description', '=', $post->description],
        ])->value('post_id');

        $postPrixFromDB = Post::where([
            ['title', '=', $post->title],
            ['description', '=', $post->description],
        ])->value('prixDepart');

        $current_date_time = \Illuminate\Support\Carbon::now('Europe/Paris')->isoFormat('YYYY-MM-DD HH:mm:ss');

        // inserting values to encherir table:
        $enchere = new Encherir();

        $enchere->user_id = \Auth::user()->id;
        $enchere->post_id = $postIdFromDB;
        $enchere->date_enchere = $current_date_time;
        $enchere->prix = $postPrixFromDB;

        //saving entry to db
        $enchere->save();

        // return to main page
        return redirect()->route('post.index')->with('success', 'Ajouté avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // variable stores all info from db corresponding to this id
        $post = Post::join('users', 'author-id', '=', 'users.id')
                ->find($id);
        $postPublishDate = Post::where('post_id','=',$id)->value('created_at');

        // values of lot:
        $datePeche=DatePeche::where('date_id','=', $post->date_id)->value('datePeche');
        $espece=Espece::where('espece_id','=', $post->espece_id)->value('libelle');
        $taille=Taille::where('taille_id','=', $post->taille_id)->value('libelle');
        $qualite=Qualite::where('qualite_id','=', $post->qualite_id)->value('libelle');
        $bac=Bac::where('bac_id','=', $post->bac_id)->value('libelle');
        $bateau=Bateau::where('bateau_id','=', $post->bateau_id)->value('nom');
        $present=Presentation::where('presentation_id','=', $post->presentation_id)->value('libelle');
        $prixMinEnchere=$post->prixActuel+0.5;

        $encherisseurId=Encherir::where([
            ['post_id', '=', $post->post_id],
            ['prix', '=', $post->prixActuel]
        ])->value('user_id');

        // time untill end:
        $dateEnchere=Encherir::where([
            ['post_id', '=', $post->post_id],
            ['prix', '=', $post->prixActuel]
        ])->value('date_enchere');
        // current time
        $now = \Illuminate\Support\Carbon::now('Europe/Paris');
        $enchereEnd = new \DateTime($dateEnchere);
        $enchereEnd->add( new \DateInterval('PT' . 1 . 'M'));
        $interval = $enchereEnd->diff($now);

        $encherisseurActuel=User::where('id', '=', $encherisseurId)->value('name');

        //$enchere = Encherir::join('users',);

        // if user tries to access unexisting page return to main
        if (!$post)
        {
            return redirect()->route('post.index')->withErrors('404');
        }

        // pass all the info to the view
        return view('posts.show', compact('post','postPublishDate','datePeche','espece','taille',
            'qualite','bac','bateau','present',
            'prixMinEnchere','encherisseurActuel','dateEnchere', 'interval'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        // check if post exists
        if (!$post)
        {
            return redirect()->route('post.index')->withErrors('404');
        }


        // check if user has rights to edit
        if ($post->{'author-id'} != \Auth::user()->id)
        {
            return redirect()->route('post.index')->withErrors('Accès refusé');
        }

        $bacs = Bac::pluck('libelle', 'bac_id');
        $especes = Espece::pluck('libelle', 'espece_id');
        $tailles = Taille::pluck('libelle', 'taille_id');
        $bateaux = Bateau::pluck('nom', 'bateau_id');
        $presentations = Presentation::pluck('libelle', 'presentation_id');
        $qualites = Qualite::pluck('libelle', 'qualite_id');
        $dates = DatePeche::pluck('datePeche', 'date_id');

        return view('posts.edit', compact('post','bacs','especes','tailles', 'bateaux','presentations','qualites', 'dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // find the post in db
        $post = Post::find($id);
        $authorId = \Auth::user()->id;

        // check if user has rights to do this
        if ($post->{'author-id'} != $authorId)
        {
            return redirect()->route('post.index')->withErrors('Accès refusé');
        }

        $current_date_time = \Illuminate\Support\Carbon::now('Europe/Paris')->isoFormat('YYYY-MM-DD HH:mm:ss');

        // inserting values to encherir table:
        $enchere = DB::table('encherirs')
            ->where('user_id', '=', $authorId)
            ->where('post_id', '=', $post->post_id)
            ->where('prix', '=', $post->prixDepart)
            ->update(['prix' => $request->prixDepart]);

        //$enchere->user_id = $authorId;
        //$enchere->post_id = $post->post_id;
        //$enchere->date_enchere = $current_date_time;
        //$enchere->prix = $request->prixDepart;

        //saving entry to db
        //$enchere->update();

        // fill the post variable using data from form that user filled:
        $post->title = $request->title;
        $post->description = $request->description;
        $post->brut = $request->brut;
        $post->prixDepart = $request->prixDepart;
        $post->prixActuel = $request->prixDepart;
        $post->prixPlancher = $request->prixPlancher;
        $post->espece_id = $request->espece_id;
        $post->taille_id = $request->taille_id;
        $post->bac_id = $request->bac_id;
        $post->bateau_id = $request->bateau_id;
        $post->presentation_id = $request->presentation_id;
        $post->qualite_id = $request->qualite_id;
        $post->date_id = $request->date_id;

        // author id
        $post->{'author-id'} = $authorId;

        // check if image exists
        if ($request->file('img'))
        {
            // add image in storage folder
            $path = Storage::putFile('public', $request->file('img'));
            // create link to image
            $url = Storage::url($path);
            // save link to image in database
            $post->img = $url;
        }

        // update entry in db
        $post->update();

        $id = $post->post_id;
        return redirect()->route('post.show', compact('id'))->with('success', 'Modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $authorId = \Auth::user()->id;

        // check if post exists
        if (!$post)
        {
            return redirect()->route('post.index')->withErrors('404');
        }

        // check if user has rights to edit
        if ($post->{'author-id'} != \Auth::user()->id)
        {
            return redirect()->route('post.index')->withErrors('Accès refusé');
        }

        $enchere = DB::table('encherirs')
            ->where('post_id', '=', $post->post_id)
            ->delete();

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Supprimé avec succès!');
    }
}
