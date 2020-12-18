@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h1 border-bottom mb-4">{{ $article->title }}</p>
        {!! nl2br($article->content, false) !!}
    </div>
@endsection

@section('body-end')
@endsection