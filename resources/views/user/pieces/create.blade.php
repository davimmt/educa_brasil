@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom">CRIAR PEÇA</p>
        @if (session('response'))
            <div class="alert alert-{{ session('response')[0] }} alert-dismissible fade show mb-1" role="alert">
                {{ session('response')[1] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('pecas.store') }}" enctype="multipart/form-data">
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
                <div class="col-6 mt-2">
                    <label for="image">Imagem</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                <div class="col-12 mt-2">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <label for="helpers">Referências</label>
                    <textarea id="helpers" name="helpers" class="form-control @error('helpers') is-invalid @enderror">{{ old('helpers') }}</textarea>

                    @error('helpers')
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
@endsection