@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom">CRIAR ARTIGO</p>
        @if (session('response'))
            <div class="alert alert-{{ session('response')[0] }} alert-dismissible fade show mb-1" role="alert">
                {{ session('response')[1] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('artigos.store') }}">
        @csrf
            <div class="row">
                <div class="col-6 mt-2">
                    <label for="title">Título</label>
                    <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off" value="{{ old('title') }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <label for="content">Corpo</label>
                    <textarea id="content" name="content" class="@error('content') is-invalid @enderror">{{ old('content') }}</textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Criar</button>
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