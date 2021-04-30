<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnchereRequest;
use App\Models\Encherir;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnchereController extends Controller
{

    public function __construct()
    {
        // unauthorised user can't use any methods except index and show
        $this->middleware('auth');
    }

    public function store(EnchereRequest $request)
    {
        $post_id = $request->post_id;

        $postAuthor = DB::table('posts')->where('post_id', '=', $post_id)->value('author-id');

        // check if user has rights to edit
        if ($postAuthor == \Auth::user()->id)
        {
            return redirect()->route('post.index')->withErrors('Enchere sur un lot propre est interdit');
        }

        $enchere = new Encherir();
        $current_date_time = \Illuminate\Support\Carbon::now()->isoFormat('YYYY-MM-DD hh:mm:ss');

        $enchere->user_id = \Auth::user()->id;
        $enchere->post_id = $post_id;
        $enchere->date_enchere = $current_date_time;
        $enchere->prix = $request->enchere;

        $enchere->save();

        $newPrice = Post::find($post_id);
        $newPrice->prixActuel = $request->enchere;
        $newPrice->save();

        return redirect()->route('post.index')->with('success', 'Votre enchere est enregistre!');

    }
}
