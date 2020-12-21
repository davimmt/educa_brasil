@extends('layouts.user')

@section('head-end')
    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
    </style>
@endsection

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom pb-2">
            <span>LISTA DE PEÇAS</span>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('pecas.create') }}">Novo</a>
        </p>
        
        <div class="row">
            @foreach ($pieces as $item)
                <div class="col-xl-4 col-sm-12 mb-3">
                    <a style="text-decoration: none" href="{{ route('pecas.show', $item->id) }}">
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper rounded-circle">
                                    <img class="" src="{{ strpos('http', $item->image) !== false ? $item->image : asset($item->image) }}" style="width: 180px!important; height: 130px!important">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $item->title }}</h4>
                                    <p class="card-text">{{ $item->description }}</p>
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

        {{ $pieces->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('body-end')
@endsection