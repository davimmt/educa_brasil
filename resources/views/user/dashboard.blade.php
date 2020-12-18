@extends('layouts.user')

@section('content')
    <div class="container col-10">
        <div class="row">
            @hasrole('adm')
            <div class="col-xl-3 col-md-6 col-sm-12 py-2">
                <a class="text-dark" href="#">
                    <div class="bg-white shadow-sm border rounded p-3" style="position: relative">
                        <i class="fas fa-users-cog fa-2x"></i>
                        <span class="h5" style="position: absolute; right: 20px; top: 30%">Gerenciar Contas</span>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 py-2">
                <a class="text-dark" href="#">
                    <div class="bg-white shadow-sm border rounded p-3" style="position: relative">
                        <i class="fas fa-history fa-2x"></i>
                        <span class="h5" style="position: absolute; right: 20px; top: 30%">Histórico</span>
                    </div>
                </a>
            </div>
            @endhasrole
            <div class="col-xl-3 col-md-6 col-sm-12 py-2">
                <a class="text-dark" href="{{ route('artigos.index') }}">
                    <div class="bg-white shadow-sm border rounded p-3" style="position: relative">
                        <i class="fas fa-newspaper fa-2x"></i>
                        <span class="h5" style="position: absolute; right: 20px; top: 30%">Artigos</span>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 py-2">
                <a class="text-dark" href="#">
                    <div class="bg-white shadow-sm border rounded p-3" style="position: relative">
                        <i class="fas fa-microscope fa-2x"></i>
                        <span class="h5" style="position: absolute; right: 20px; top: 30%">Peças</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection