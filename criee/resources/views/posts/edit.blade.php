@extends('layouts.layout', ['title' => "Modifier Lot №$post->post_id"])

@section('content')

    <form action="{{ route('post.update', ['id'=>$post->post_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3>Modifier un lot</h3>
        @include('posts.parts.form')

        <input type="submit" value="Modifier" class="btn btn-outline-success">
    </form>

@endsection
