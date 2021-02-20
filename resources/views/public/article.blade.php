<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Artigos — Educa Brasil</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/custom-styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/magnific-popup/styles.css') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}"><i style='font-size:24px' class='fas'>&#xf135;</i>&ensp;EDUCA Brasil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item btn-group">
            <a class="nav-link js-scroll-trigger pr-1" href="#about">Sobre o projeto</a>
            <a class="nav-link dropdown-toggle pl-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{ url('p/artigos') }}" style="font-size: 13px">Artigos</a>
              <a class="dropdown-item" href="{{ url('p/pecas') }}" style="font-size: 13px">Peças</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead masthead-secondary bg-img-manuscrito position-relative" style="background-position: 1% 34%">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="masthead-title text-uppercase text-white font-weight-bold">{{ $article->title }}</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-9 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">{{ $article->author->name }}<br>{{ date('d/m/Y', strtotime($article->created_at)) }}</p>
        </div>
      </div>
    </div>
    <div class="masthead-footer w-100 position-absolute text-center" style="bottom: 10px">
      <a href="{{ url('p/artigos') }}" class="text-white-75 font-weight-light" style="font-size: 12px">Voltar para Lista de Artigos</a>
    </div>
  </header>

  <!-- Article -->
  <section class="page-section bg-dark text-white" style="min-height: 45vh">
    <div class="container col-md-10 col-sm-12">
      <div class="row justify-content-center">
        <div class="col-xl-12 col-sm-11 text-justify article-text">
        {!! nl2br($article->content, false) !!}
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Entre em contato conosco!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Se você estiver com dúvidas ou quiser participar ativamente do nosso projeto,<br> sinta-se à vontade para nos chamar!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; {{ date('Y') }} - {{ config('app.name', 'EDUCA Brasil') }}</div>
    </div>
  </footer>
  
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/magnific-popup/scripts.js') }}"></script>
  <script src="{{ asset('assets/startbootstrap-creative/scripts.js') }}"></script>
</body>

</html>