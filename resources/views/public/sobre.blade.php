<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Educa Brasil</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bg.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/custom-styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/magnific-popup/styles.css') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <style>
    header.masthead p {font-size: 1.5rem}
    @media only screen and (max-width: 767px){.block{margin-top: 2.5em}}
  </style>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    @if (auth()->user())
      <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Painel do Usuário') }}</a>
    @endif
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}"><i style='font-size:24px' class='fas'>&#xf135;</i>&ensp;EDUCA Brasil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a id="nav-link-register" class="nav-link js-scroll-trigger nav-link-important" href="{{ url('cadastro') }}">Cadastrar-se</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-img-outer-space">
    <div class="container h-100">
      <div class="row h-100 d-flex align-items-center justify-content-center text-center text-white">
        <div class="col-xl-3 col-lg-3 col-md-3 block">
          <a class="text-white" href="{{ url('p/pecas') }}">
            <i class="fas fa-4x fa-microscope mb-3"></i>
            <p class="font-weight-bolder">Lista de Peças</p>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 block">
          <a class="text-white" href="{{ url('p/artigos') }}">
            <i class="fas fa-4x fa-book mb-3"></i>
            <p class="font-weight-bolder">Lista de Artigos</p>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 block">
          <a class="text-white" href="{{ url('/') }}">
            <i class="fas fa-4x fa-users mb-3"></i>
            <p class="font-weight-bolder">Quem somos</p>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 block">
          <a class="text-white" href="{{ url('/') }}">
            <i class="fas fa-4x fa-crosshairs mb-3"></i>
            <p class="font-weight-bolder">Nosso objetivo</p>
          </a>
        </div>
      </div>
    </div>
  </header>
  
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/magnific-popup/scripts.js') }}"></script>
  <script src="{{ asset('assets/startbootstrap-creative/scripts.js') }}"></script>

</body>

</html>