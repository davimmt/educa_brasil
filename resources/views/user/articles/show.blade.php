@extends('layouts.user')

@section('content')
    @include('modals.confirm_danger')

    <div class="container col-10">
        <ul class="list-unstyled m-0">
            <li>
                <small>
                    <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                    <a class="text-muted" href="{{ url('artigos') }}">Lista de Artigos</a> >
                    <span class="text-muted">Artigo #{{ $article->id }}</span>
                </small>
            </li>
        </ul>
        <p class="h1 border-bottom mb-4">
            {{ $article->title }}
            @if((auth()->id() == $article->user_id) || auth()->user()->can(''))
                <p class="text-muted position-absolute" style="top: 32px; right: 15px;">
                    <a href="{{ route('artigos.edit', $article->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i>Editar</a>
                    @if(auth()->user()->can(''))
                        <a id="linkConfirmDangerModal" href="#confirmDangerModal" data-toggle="modal" class="btn btn-danger btn-sm" 
                        onclick="confirmDangerModalForm('{{ route('artigos.destroy', $article->id) }}')">
                        <i class="fas fa-trash mr-1"></i>Excluir</a>
                    @endif
                </p>
            @endif
        </p>
        {!! nl2br($article->content, false) !!}
    </div>
@endsection

@section('body-end')
    <script>
        function confirmDangerModalForm(action) {
            form = document.getElementById("confirmDangerModalForm");
            form.action = action;
        }
    </script>
@endsection