@extends('layouts.layout', ['title' => "Ajouter un lot"])

@section('content')

    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="ajouterLot">
        @csrf
        <h4>Ajouter un lot</h4>
        @include('posts.parts.form')

        <input type="submit" value="Ajouter" class="btn btn-outline-success">
    </form>

@endsection
