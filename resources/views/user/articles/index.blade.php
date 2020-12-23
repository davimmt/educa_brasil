@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <div class="row container-fluid p-0 m-0">

            <div class="col-xl-6 col-md-4 col-sm-12 d-flex align-items-center p-0">
                <ul class="list-unstyled">
                    <li>
                        <small>
                            <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                            <a class="text-muted" href="{{ url()->current() }}">Lista de Artigos</a>
                        </small>
                    </li>
                    <li>
                        <p class="h4 font-weight-bold p-0 m-0">LISTA DE ARTIGOS</p>
                    </li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-8 col-sm-12 d-flex align-items-center p-0 mt-2">
                <div class="input-group">
                    <form id="artigos-search" method="GET" action="{{ route('search.user.artigos') }}">@csrf</form>
                    <input name="title" class="form-control" placeholder="Título..." form="artigos-search" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-sm" form="artigos-search"><i class="fas fa-search mr-1"></i>Procurar</button>
                        <a class="btn btn-outline-primary btn-sm align-self-center" style="padding: .677em .5em" href="{{ route('artigos.create') }}"><i class="fas fa-plus mr-1"></i>Novo</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            @foreach ($articles as $item)
                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('artigos.show', $item->id) }}">
                        <div class="card">
                            <div class="card-body pt-3 pb-1 px-3">
                                <p class="h5 card-title">{{ $item->title }}</p>
                                <p class="card-subtitle text-muted m-0 p-0 float-right" style="font-size: 10px">{{ $item->author->name }}</p>
                                <br>
                                <p class="card-subtitle text-muted float-right" style="font-size: 10px">{{ $item->created_at }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <p class="text-muted">{{ "Mostrando de {$articles->firstItem()} a  {$articles->lastItem()} de $articles_total itens." }}</p>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection

@section('body-end')
@endsection