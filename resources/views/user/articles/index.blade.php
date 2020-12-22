@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom pb-2">
            <span>LISTA DE ARTIGOS</span>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('artigos.create') }}">Novo</a>
        </p>
        
        <div class="row">
            @foreach ($articles as $item)
                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                    <a style="text-decoration: none" href="{{ route('artigos.show', $item->id) }}">
                        <div class="card">
                            <div class="card-body">
                                <p class="h5 card-title">{{ $item->title }}</p>
                                <p class="card-subtitle text-muted float-right" style="font-size: 10px">{{ $item->author->name }}</p>
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
                <p class="text-muted">{{ "Mostrando {$articles->count()} de $articles_total itens." }}</p>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection

@section('body-end')
@endsection