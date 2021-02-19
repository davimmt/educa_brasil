@extends('layouts.user')

@section('head-end')
    <link href="{{ asset('assets/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container col-xl-10 col-md-11 col-sm-12">

        <div class="row container-fluid p-0 m-0">
            <div class="col-xl-6 col-md-4 col-sm-12 d-flex align-items-center p-0">
                <ul class="list-unstyled">
                    <li>
                        <small>
                            <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                            <a class="text-muted" href="{{ url()->current() }}">Lista de Peças</a>
                        </small>
                    </li>
                    <li>
                        <p class="h4 font-weight-bold p-0 m-0">LISTA DE PEÇAS</p>
                    </li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-8 col-sm-12 d-flex align-items-center p-0 mt-2">
                <div class="input-group">
                    <form id="pecas-search" method="GET" action="{{ route('search.pecas') }}">@csrf</form>
                    <input name="title" class="form-control" placeholder="Título..." form="pecas-search" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-sm" form="pecas-search"><i class="fas fa-search mr-1"></i>Procurar</button>
                        <a class="btn btn-outline-primary btn-sm align-self-center" style="padding: .677em .5em" href="{{ route('pecas.create') }}"><i class="fas fa-plus mr-1"></i>Novo</a>
                    </div>
                </div>
            </div>
        </div>
        
        @if (session('response'))
            <div class="alert alert-{{ session('response')[0] }} alert-dismissible fade show mb-1" role="alert">
                {{ session('response')[1] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row mt-3">
            @foreach ($pieces as $item)
                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                    <a style="text-decoration: none" href="{{ route('pecas.show', $item->id) }}">
                        <div class="card overflow-hidden">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper rounded-circle">
                                    @if ($item->image == null)
                                        <i class="fas fa-rocket fa-5x p-4 border-right img-responsive text-dark" style="background-color: rgba(0, 0, 0, 0.1)"></i>
                                    @else
                                        <img class="img-responsive" src="{{ asset($item->image) }}">
                                    @endif
                                </div>
                                <div class="card-body text-ellipsis">
                                    <p class="h4 card-title text-ellipsis">{{ $item->title }}</p>
                                    <p class="card-text text-ellipsis text-ellipsis-multiline text-muted" style="font-size: .8rem">{{ $item->getEllipsisDescription() }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $item->author->name }} — {{ $item->created_at }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <p class="text-muted">{{ "Mostrando de {$pieces->firstItem()} a {$pieces->lastItem()} de $pieces_total itens." }}</p>
                {{ $pieces->links() }}
            </div>
        </div>
    </div>
@endsection

@section('body-end')
@endsection