@extends('layouts.user')

@section('head-end')
    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
        .card-footer {
            padding: .1em .5em;
            text-align: right;
            font-size: .8em;
        }
        .text-ellipsis-multiline {
            overflow: hidden;
            /* use this value to count block height */
            line-height: 1.2em;
            /* max-height = line-height (1.2) * lines max number (3) */
            max-height: 3.6em; 
        }
        .img-responsive {
            width: 180px;
            height: 130px;
        }

        @media only screen and (max-width: 1500px) and (min-width: 1200px){.img-responsive{width:130px;height:110px;}.text-ellipsis-multiline{max-height:2.4em;}}
        @media only screen and (max-width: 900px) {.img-responsive{width:130px;height:110px;}.text-ellipsis-multiline{max-height:2.4em;}}

        @media only screen and (max-width: 1700px) and (min-width: 1500px){.text-ellipsis{text-overflow:ellipsis;white-space: nowrap;overflow: hidden;}}
        @media only screen and (max-width: 1405px) and (min-width: 1200px){.text-ellipsis{text-overflow:ellipsis;white-space: nowrap;overflow: hidden;}}
        @media only screen and (max-width: 960px) and (min-width: 765px){.text-ellipsis {text-overflow: ellipsis;white-space: nowrap;overflow: hidden;}}
        @media only screen and (max-width: 500px) {.text-ellipsis {text-overflow: ellipsis;    white-space: nowrap;    overflow: hidden;}}
    </style>
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
                    <form id="pecas-search" method="GET" action="{{ route('search.user.pecas') }}">@csrf</form>
                    <input name="title" class="form-control" placeholder="Título..." form="pecas-search" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-sm" form="pecas-search"><i class="fas fa-search mr-1"></i>Procurar</button>
                        <a class="btn btn-outline-primary btn-sm align-self-center" style="padding: .677em .5em" href="{{ route('pecas.create') }}"><i class="fas fa-plus mr-1"></i>Novo</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            @foreach ($pieces as $item)
                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                    <a style="text-decoration: none" href="{{ route('pecas.show', $item->id) }}">
                        <div class="card overflow-hidden">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper rounded-circle">
                                    <img class="img-responsive" src="{{ $item->image == null ? 'http://via.placeholder.com/720x400' : asset($item->image) }}">
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