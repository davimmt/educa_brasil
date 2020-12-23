@extends('layouts.user')

@section('head-end')
    <style>
        .img-responsive {
            width: 100%;
            height: auto;
            max-width: 50%;
            float: left;
        }
        @media only screen and (max-width: 768px) {
            .img-responsive {
                max-width: 100%;
                float: none;
            }
        }
        @media only screen and (max-width: 450px) {
            .piece-title {
                margin-bottom: 40px
            }
        }
    </style>
@endsection

@section('content')
    @include('modals.confirm_alert')
    @include('modals.confirm_danger')
    <div class="container col-10">
        <div class="border-bottom mb-4 position-relative">
            <ul class="list-unstyled">
                <li>
                    <small>
                        <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                        <a class="text-muted" href="{{ url('pecas') }}">Lista de Peças</a> >
                        <a class="text-muted" href="{{ url()->current() }}">Peça #{{ $piece->id }}</a>
                    </small>
                </li>
                <li>
                    <p class="piece-title h1">{{ $piece->title }}</p>
                </li>
            </ul>
            @if(($piece->user_is_manager()) || auth()->user()->can(''))
                <p class="text-muted position-absolute" style="bottom: -10px; right: 0;">
                    <a href="{{ route('pecas.edit', $piece->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i>Editar</a>
                    <a href="#confirmAlertModal" data-toggle="modal" class="btn btn-dark btn-sm"><i class="fas fa-eye-slash mr-1"></i>Ocultar</a>
                    @if(auth()->user()->can(''))
                        <a href="#confirmDangerModal" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i>Excluir</a>
                    @endif
                </p>
            @endif
        </div>

        <img class="img-responsive mr-3" src="{{ $piece->image == null ? 'http://via.placeholder.com/720x400' : asset($piece->image) }}">
        <span class="text-muted">Adicionado por {{ $piece->author->name }}</span>

        <p class="h5 mt-3 font-weight-bold">Descrição</p>
        <p class="">{!! nl2br($piece->description, false) !!}</p>

        @if(($piece->user_is_manager()) || auth()->user()->can(''))
            <p class="h5 font-weight-bold">Referências</p>
            <p class="">{!! nl2br($piece->helpers, false) !!}</p>
        @endif

        <ul class="list-unstyled">
            <p class="h5 font-weight-bold">Monitores</p>
            @if ($piece->managers->count() > 0)
                @foreach ($piece->managers as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            @else
                <li>Nenhum</li>
            @endif
        </ul>
    </div>
@endsection

@section('body-end')
@endsection