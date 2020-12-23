@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <ul class="list-unstyled">
            <li>
                <small>
                    <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                    <a class="text-muted" href="{{ url('pecas') }}">Lista de Peças</a> >
                    <a class="text-muted" href="{{ url()->current() }}">Criar Peça</a>
                </small>
            </li>
            <li>
                <p class="h4 border-bottom font-weight-bold pb-2">CRIAR PEÇA</p>
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
        <form method="POST" action="{{ route('pecas.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-xl-6 col-sm-12 mt-2">
                    <label for="title">Título</label>
                    <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off" value="{{ old('title') }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 col-sm-12 mt-2">
                    <label for="image">Imagem</label>
                    <input type="file" id="image" name="image" class="form-control-file mt-1" style="font-size: .8em" accept="image/*">
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
                    <textarea id="helpers" name="helpers" rows="5" class="form-control @error('helpers') is-invalid @enderror">{{ old('helpers') }}</textarea>

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