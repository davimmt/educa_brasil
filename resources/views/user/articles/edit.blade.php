@extends('layouts.user')

@section('head-end')
    <link href="{{ asset('assets/_tail.select/css/bootstrap4/tail.select-default.css') }}" rel="stylesheet">
@endsection

@section('body-start')
    <script src="{{ asset('assets/_tail.select/js/tail.select.js') }}"></script>
    <script src="{{ asset('assets/_tail.select/langs/tail.select-pt_BR.js') }}"></script>
@endsection

@section('content')
    <div class="container col-10">
        <ul class="list-unstyled">
            <li>
                <small>
                    <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                    <a class="text-muted" href="{{ url('artigos') }}">Lista de Artigos</a> >
                    <a class="text-muted" href="{{ url("artigos/$article->id") }}">Artigo #{{ $article->id }}</a> >
                    <span class="text-muted">Editar Artigo</span>
                </small>
            </li>
            <li>
                <p class="h4 border-bottom font-weight-bold pb-2">EDITAR ARTIGO</p>
            </li>
        </ul>
        @if (session('response'))
            <div class="alert alert-{{ session('response')[0] }} alert-dismissible fade show mb-1" role="alert">
                {{ session('response')[1] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('artigos.update', $article->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="row">
                <div class="col-xl-6 col-sm-12 mt-2">
                    <label for="title">Título</label>
                    <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off" value="{{ old('title') ?: $article->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <label for="content">Corpo</label>
                    <textarea id="content" name="content" class="@error('content') is-invalid @enderror">{{ old('content') ?: $article->content }}</textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('body-end')
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    {{-- <script src="{{ asset('assets/ckeditor/script.cdn.js') }}"></script> --}}
    <script>
        ClassicEditor.create(document.querySelector('#content'))
            // .then(editor => {
            //     console.log(editor);
            // })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection