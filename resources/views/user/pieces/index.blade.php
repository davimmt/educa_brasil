@extends('layouts.user')

@section('head-end')
    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
        .text-ellipsis {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .text-ellipsis-multiline {
            overflow: hidden;
            /* for set '...' in absolute position */
            position: relative; 
            /* use this value to count block height */
            line-height: 1.2em;
            /* max-height = line-height (1.2) * lines max number (3) */
            max-height: 3.6em; 
            /**/
            text-align: justify;  
            margin-right: -1em;
            padding-right: 1em;
        }
        .text-ellipsis-multiline:before {
            /* points in the end */
            content: '...';
            /* absolute position */
            position: absolute;
            /* set position to right bottom corner of block */
            right: 4px;
            bottom: 0.6px;
        }
        /* hide '...' if we have text, which is less than or equal to max lines */
        .text-ellipsis-multiline:after {
            content: '';
            position: absolute;
            right: 0;
            width: 1em;
            height: 1em;
            margin-top: 0.2em;
            background: white;
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
                                    <img class="" src="{{ $item->image == null ? 'http://via.placeholder.com/720x400' : asset($item->image) }}" style="width: 180px!important; height: 130px!important">
                                </div>
                                <div class="card-body">
                                    <p class="h4 card-title text-ellipsis">{{ $item->title }}</p>
                                    <p class="card-text text-ellipsis-multiline text-muted">{{ $item->description }}</p>
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
                <p class="text-muted">{{ "Mostrando {$pieces->count()} de $pieces_total itens." }}</p>
                {{ $pieces->links() }}
            </div>
        </div>
    </div>
@endsection

@section('body-end')
@endsection