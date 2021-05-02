<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Encherir;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class cartController extends Controller
{
    // we use constructor to redirect functionality we want to restrict
    public function __construct()
    {
        // unauthorised user can't use any methods except index and show
        $this->middleware('auth');
    }

    public function show($id)
    {
        // get all user bids
        $carts = Encherir::where('user_id', '=', \Auth::user()->id)
            ->orderBy('date_enchere', 'desc')
            ->simplePaginate(8);


        // pass all the info to the view
        return view('cart.cart', compact('carts'));
    }

}
