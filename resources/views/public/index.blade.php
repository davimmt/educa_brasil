<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Feira de Ciências</title>

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
    @if (auth()->user())
      <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Painel do Usuário') }}</a>
    @endif
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><i style='font-size:24px' class='fas'>&#xf135;</i>&ensp;EDUCA Brasil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item btn-group">
            <a class="nav-link js-scroll-trigger pr-1" href="#about">Sobre o projeto</a>
            <a class="nav-link dropdown-toggle pl-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#" style="font-size: 13px">Artigos</a>
              <a class="dropdown-item" href="#" style="font-size: 13px">Peças</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfólio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#location">Como chegar?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
          </li>
          <li class="nav-item">
            <a id="nav-link-register" class="nav-link js-scroll-trigger nav-link-important" href="{{ url('cadastro') }}">Cadastrar-se</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Feira de Ciências</h1>
          <h3 class="text-uppercase text-white font-weight-bold">Porque todo mundo deveria ser apaixonado por voar!</h3>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 col-md-9 col-sm-9 col-9 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Seja muito bem-vindo ao espaço da nossa primeria feira de ciências!<br> <a href="{{ url('cadastro') }}">Cadastre-se</a> agora para garantir sua presença no nosso envento*: é <u>gratuito</u> e você ainda concorre a um <u>telescópio</u>!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Saber mais</a>
          <p class="small text-white-75 font-weight-light mt-5" style="font-size: 15px">*O cadastro não é obrigatório para entrar no evento, mas lhe garante prioridade na fila de entrada.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9 col-sm-9 col-9 text-center">
          <h1 class="text-white mt-0">Feira de Ciências</h1>
          <h3 class="text-white mt-0">EDUCA Brasil</h3>
          <hr class="divider light my-4">
          <p class="text-white text-justify mb-5" style="font-size: 20px">
            Nunca antes a sociedade brasileira precisou tanto de execelência na educação, e é por isso que nós queremos, nesse projeto, estimular a inteligência e criatividade e incentavar a pesquisa científica no nosso país.
            <br><br>
            Para isso, nossa feira contará com a exposição de <u>160 peças</u> de ciência a nível de 2º grau, acompanhadas de banners educativos e monitores que irão explicar cada mecanismo. Além disso, iremos proporcionar <u>experimentos em tempo real</u> para melhor aprendizado e didática, tudo isso com você em mente!
            <br><br>
            Tudo em um ambiente agradável e estimulante para gerar em nossos jovens, o futuro do país, uma paixão duradoura pelas ciências exatas. Contamos com sua partipação, ajude o Brasil a estudar!
          </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">O que oferecemos?</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Ao seu serviço</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Peças de Qualidade</h3>
            <p class="text-muted mb-0">Todas as peças da nossa exposição foram prejetadas milimetricamente.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-atom text-primary mb-4"></i>
            <h3 class="h4 mb-2">Ciência</h3>
            <p class="text-muted mb-0">Nessa exposição, não há nada mais importante que o conhecimento científico!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-4"></i>
            <h3 class="h4 mb-2">Educação</h3>
            <p class="text-muted mb-0">Educação é o que move o mundo, e queremos contribuir com o nosso melhor.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Feito com Amor</h3>
            <p class="text-muted mb-0">Tudo que disponibilizamos é cuidadosamente pensando em você e na ciência!</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center" style="padding-top: 8em">
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#">Saiba Mais!</a>
      </div>
      <div class="row justify-content-center mt-5" style="padding-bottom: 1em">
        <a class="btn btn-light btn-xl js-scroll-trigger pb-1" href="#portfolio">Veja nossas fotos!<br>
          <i class="fas fa-angle-down"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/1.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/1.jpg') }}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/2.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/2.jpg') }}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/3.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/3.jpg') }}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/4.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/4.jpg') }}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/5.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/5.jpg') }}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{{ asset('assets/img/portfolio/fullsize/6.jpg') }}">
            <img class="img-fluid" src="{{ asset('assets/img/portfolio/thumbnails/6.jpg') }}" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Location Section -->
  <section class="page-section bg-dark text-white" id="location">
    <div class="container text-center">
      <h2 class="mt-0">Nossa localização:</h2>
      <div id="map" style="width:100%; height:400px"></div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Entre em contato conosco!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Se você estiver com dúvidas ou quiser participar ativamente do nosso projeto,<br> sinta-se à vontade para nos charmar!</p>
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
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>
  
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/magnific-popup/scripts.js') }}"></script>
  <script src="{{ asset('assets/startbootstrap-creative/scripts.js') }}"></script>
  {{-- <script src="{{ asset('assets/maps/scripts.js') }}"></script> --}}

</body>

</html>