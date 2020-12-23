@extends('layouts.user')

@section('head-end')
    <link href="{{ asset('assets/_tail.select/css/bootstrap4/tail.select-default.css') }}" rel="stylesheet">
@endsection

@section('body-start')
    <script src="{{ asset('assets/_tail.select/js/tail.select.js') }}"></script>
    <script src="{{ asset('assets/_tail.select/langs/tail.select-pt_BR.js') }}"></script>
@endsection

@section('content')
    <div class="container col-10">
        <ul class="list-unstyled">
            <li>
                <small>
                    <a class="text-muted" href="{{ url('dashboard') }}">Dashboard</a> >
                    <a class="text-muted" href="{{ url('pecas') }}">Lista de Peças</a> >
                    <a class="text-muted" href="{{ url("pecas/$piece->id") }}">Peça #{{ $piece->id }}</a> >
                    <a class="text-muted" href="{{ url()->current() }}">Editar Peça</a>
                </small>
            </li>
            <li>
                <p class="h4 border-bottom font-weight-bold pb-2">EDITAR PEÇA</p>
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
        <form method="POST" action="{{ route('pecas.update', $piece->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="row">
                <div class="col-xl-6 col-sm-12 mt-2">
                    <label for="title">Título</label>
                    <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off" value="{{ old('title') ?: $piece->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 col-sm-12 mt-2">
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="update_image" id="keep_image" value="0" checked>
                        <label class="form-check-label" for="keep_image">Manter imagem</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="update_image" id="remove_image" value="">
                        <label class="form-check-label" for="remove_image">Remover imagem</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="update_image" id="update_image" value="1">
                        <label class="form-check-label" for="update_image">Alterar imagem</label>
                    </div>
                    <input type="file" id="image" name="image" class="form-control-file mt-1" accept="image/*" style="font-size: .8em" disabled>
                </div>
                <div class="col-12 mt-2">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?: $piece->description }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <label for="helpers">Referências</label>
                    <textarea id="helpers" name="helpers" rows="5" class="form-control @error('helpers') is-invalid @enderror">{{ old('helpers') ?: $piece->helpers }}</textarea>

                    @error('helpers')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 mt-2">
                    <label for="user_manager">Gerente(s)</label><br>
                    <select id="user_manager" name="user_manager[]" class="select-move @error('user_manager') is-invalid @enderror" multiple>
                        @foreach ($users as $item)
                            <option @if (in_array($item->id, $managers)) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    @error('user_manager')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('body-end')
    <script>
        $('input[type=radio][name=update_image]').on('change', function() {
            if (this.value != 1) {
                $('#image').attr('disabled', true);
                $('#image').val([]);
            }
            else {
                $('#image').attr('disabled', false);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            tail.select(".select-move", {
                search: true,
                hideSelected: true,
                multiShowCount: false,
                multiSelectAll: true,
                multiSelectNone: true,
                multiContainer: true,
                multiLimit: 2,
                locale: "pt_BR",
                width: "100%",
            });
        });
    </script>
@endsection