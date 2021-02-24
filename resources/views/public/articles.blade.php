<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Artigos — Educa Brasil</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bg.css') }}">
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
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger pr-1 nav-link-important" href="{{ url('sobre') }}">Sobre o projeto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead masthead-secondary bg-img-newtonian-balls" style="background-position: 1% 75%">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Quer saber mais sobre nós?</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-9 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Leia abaixo nossa coleção de artigos feitos especialmente para você,<br> amante da ciência!</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Articles -->
  <section class="page-section bg-primary" id="article-list">
    <div class="container col-md-10 col-sm-12">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-9">
          <div class="row container-fluid p-0 m-0">
              <div class="col-xl-12 col-md-12 col-sm-12 d-flex align-items-center p-0 mt-2">
                <div class="input-group">
                    <form id="artigos-search" method="GET" action="{{ route('p.search.artigos') }}">@csrf</form>
                    <input name="title" class="form-control" placeholder="Título..." form="artigos-search" autocomplete="off">
                    <div class="input-group-append">
                      <button class="btn btn-light btn-sm" form="artigos-search"><i class="fas fa-search mr-2"></i>Procurar</button>
                    </div>
                </div>
              </div>
          </div>
          <div class="row mt-3">
              @foreach ($articles as $item)
                <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                  <a class="text-decoration-none" href="{{ route('p.artigos.show', $item->id) }}">
                    <div class="article-list card">
                      <div class="card-body pt-3 pb-1 px-3">
                        <p class="h5 card-title">{{ $item->title }}</p>
                        <p class="card-subtitle">
                          Autor: {{ $item->author->name }}<br>
                          {{ date('d/m/Y', strtotime($item->created_at)) }}
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
          </div>
          <div class="row">
            <div class="col-12 mt-3 text-left">
              <p class="text-light">{{ "Mostrando de {$articles->firstItem()} a  {$articles->lastItem()} de $articles_total itens." }}</p>
              {{ $articles->links('') }}
            </div>
          </div>
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