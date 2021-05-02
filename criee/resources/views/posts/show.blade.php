@extends('layouts.layout', ['title' => "Lot №$post->post_id"])

@section('content')

    <div class="bottomMargin">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3>{{ $post->title }}</h3></div>
                    <div class="card-body">
                        <div class="card-img card-img__max" style="background-image: url({{ $post->img ?? asset('img/default.png') }})"></div>
                        <div class="card-description">
                            <b>Description: </b> {{ $post->description }}
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-sm border">
                                    <b>Date peche: </b> {{ $datePeche }}
                                </div>
                                <div class="col-sm border">
                                    <b>Espece: </b> {{ $espece }}
                                </div>
                                <div class="col-sm border">
                                    <b>Taille: </b> {{ $taille }}
                                </div>
                                <div class="col-sm border">
                                    <b>Qualité: </b> {{ $qualite }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm border">
                                    <b>Brut: </b> {{ $post->brut }} kg
                                </div>
                                <div class="col-sm border">
                                    <b>Type bac: </b> {{ $bac }}
                                </div>
                                <div class="col-sm border">
                                    <b>Bateau: </b> {{ $bateau }}
                                </div>
                                <div class="col-sm border">
                                    <b>Presentation: </b> {{ $present }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm border">
                                    <b>Prix plancher: </b> {{ $post->prixPlancher }} €
                                </div>
                                <div class="col-sm border">
                                    <b>Prix depart: </b> {{ $post->prixDepart }} €
                                </div>
                            </div>
                        </div>
                        <div class="card-date">Date poste: <b>{{ $postPublishDate->diffForHumans() }}</b> ( {{ $post->created_at }} ) </div>

                        <div class="card-author">Vendeur: <b>{{ $post->name }}</b> </div>
                        <div class="card-author text-light bg-dark">Dernière enchère: <b>{{$encherisseurActuel}} — {{ $post->prixActuel }} €</b> </div>
                        @if($interval->invert == 1)
                            <div class="card-author text-dark">Temps restant: <b>{{$interval->format("%h heures %i minutes")}}</b> </div>
                        @endif
                        @auth
                            @if(Auth::user()->id !== $post->{'author-id'})
                                @if($interval->invert == 1)
                                <div class="form-group">
                                    <form action="{{ route('enchere.store') }}" method="post" enctype="multipart/form-data" class="ajouterEnchere">
                                        @csrf
                                        <input type="number" step="0.01" min={{ $prixMinEnchere }} max="9999" class="form-control-enchere" name="enchere" placeholder="enchere" required>
                                        <input type="hidden" class="form-control-enchere" name="post_id" value={{ $post->post_id }}>
                                        <input type="submit" value="Encherir" class="btn btn-outline-dark">
                                    </form>
                                </div>
                                @else
                                    <div class="card-author text-light bg-danger">Enchère terminée</div>
                                @endif
                            @endif
                        @endauth

                        <div class="card-btn">
                            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Retour</a>
                            @auth
                                @if(Auth::user()->id == $post->{'author-id'})
                                    <a href="{{ route('post.edit', ['id'=>$post->post_id]) }}" class="btn btn-outline-secondary">Modifier</a>
                                    <form action="{{ route('post.destroy', ['id'=>$post->post_id]) }}" method="post" onsubmit="if(confirm('Supprimer ce lot?')) {return true} else {return false}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-danger" value="Supprimer">
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
