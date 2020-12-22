@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <p class="h4 border-bottom">EDITAR PEÇA</p>
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
                <div class="col-6 mt-2">
                    <label for="title">Título</label>
                    <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off" value="{{ old('title') ?: $piece->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2">
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
                    <input type="file" id="image" name="image" class="form-control-file mt-1" disabled>
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
@endsection