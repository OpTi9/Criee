@extends('layouts.layout', ['title' => 'Accueil'])

@section('content')

    @if(isset($_GET['search']))
        @if(count($posts)>0)
            <h2>Résultats: </h2>
            <p class="lead"> <b>{{count($posts)}}</b> lots</p>
        @else
            <h2>Aucun lot ne correspond à cette recherche.</h2>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">
                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/default.png') }})"></div>
                    <div class="card-author">Vendeur: <b>{{ $post->name }}</b> </div>
                    <a href="{{ route('post.show', ['id'=> $post->post_id]) }}" class="btn btn-outline-primary">Prix : <b>{{ $post->prixActuel }} €</b></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="bottomMargin">
        @if(!isset($_GET['search']))
            {{ $posts->links() }}
        @endif
    </div>

@endsection
