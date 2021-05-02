@extends('layouts.layout')

@section('content')
    <h1>Mes enchères:</h1>

    <div class="row">
        @foreach($carts as $cart)
            <div class="col-3">
                <div class="card">
                    <div class="card-header"><h3>{{ DB::table('posts')->where('post_id', '=', $cart->post_id)->value('title') }}</h3></div>
                    <div class="card-body">
                        <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/default.png') }})"></div>
                        <a href="{{ route('post.show', ['id'=> $cart->post_id]) }}" class="btn btn-outline-primary">
                            Prix : <b>{{ DB::table('posts')->where('post_id', '=', $cart->post_id)->value('prixActuel') }} €</b> </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="bottomMargin">
        @if(!isset($_GET['search']))
            {{ $carts->links() }}
        @endif
    </div>
@endsection
