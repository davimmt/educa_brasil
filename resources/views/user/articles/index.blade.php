@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom pb-2">
            <span>LISTA DE ARTIGOS</span>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('artigos.create') }}">Novo</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data</th>
                    <th scope="col"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $item)
                    <tr>
                        <th scope="row">{{ $item->title }}</th>
                        <td>{{ $item->author->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ route('artigos.show', $item->id) }}"><i class="fas fa-eye"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('body-end')
@endsection