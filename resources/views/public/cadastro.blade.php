<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Feira de Ciências</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/startbootstrap-creative/styles.css') }}">
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
            <a class="nav-link js-scroll-trigger" href="{{ url('/') }}#about">Sobre o projeto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#location">Como chegar?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead" style="background: #f4623a">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <form method="POST" action="{{ url('sing-up') }}">
        @csrf
          <div class="col-lg-12 text-center mb-5 pb-5">
            <h2 class="text-uppercase text-white">Área de Cadastro</h2>
            <p class="text-white-75" style="font-size: 15px">Inscreva-se já, de graça, para concorrer a um telescópio e garantir sua presença em nossa feira. <br> Estamos esperando por você!</p>
            <hr class="divider light my-4">
            <div class="form-row my-3">
              <div class="col-12">
                <input name="name" value="{{ old('name') }}" class="form-control name @error('name') is-invalid border-dark @enderror" placeholder="Nome Completo" autocomplete="name" required>

                @error('name')
                  <span class="invalid-feedback text-dark" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-row my-3">
              <div class="col-12">
                <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid border-dark @enderror" placeholder="Email (exemplo@email.com)" autocomplete="email" required>

                @error('email')
                  <span class="invalid-feedback text-dark" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-row my-3">
              <div class="col-9 col-sm-10 col-md-10 pr-1">
                <input name="phone" value="{{ old('phone') }}" class="form-control cel @error('phone') is-invalid border-dark @enderror" placeholder="Celular ((84) 98805-5320)" autocomplete="phone" required>

                @error('phone')
                  <span class="invalid-feedback text-dark" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-3 col-sm-2 col-md-2 pl-1">
                <input name="age" value="{{ old('age') }}" class="form-control age @error('age') is-invalid border-dark @enderror" placeholder="Idade" autocomplete="off">

                @error('age')
                  <span class="invalid-feedback text-dark" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-row my-3">
              <div class="col-12 text-white  d-flex justify-content-between">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="escolaridade">Nível de Escolaridade</label>
                  </div>
                  <select name="scholarity_level" value="{{ old('scholarity_level') }}" class="custom-select form-control @error('scholarity_level') is-invalid border-dark rounded-right @enderror" id="escolaridade" required>
                    <option value disabled selected>Selecione...</option>
                    <option value="1">Ensino Básico</option>
                    <option value="2">Ensino Médio</option>
                    <option value="3">Ensino Superior (ou acima)</option>
                  </select>

                  @error('scholarity_level')
                    <span class="invalid-feedback text-dark" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <p class="text-white-50 mb-4"></p>
            <button class="btn btn-light btn-xl js-scroll-trigger mt-3">Cadastrar-se!</button>
          </div>
        </form>
      </div>
    </div>
  </header>

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

  <!-- Toast -->
  @if (session('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="position: absolute; bottom: 0; right: 10px; width: 200px">
      <div class="toast-header">
        <strong class="mr-auto text-success">Sucesso!</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        Inscrição concluída.
      </div>
    </div>
  @endif

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/magnific-popup/scripts.js') }}"></script>
  <script src="{{ asset('assets/startbootstrap-creative/scripts.js') }}"></script>
  <script src="{{ asset('assets/jquery-mask-plugin/jquery-mask-plugin.js') }}"></script>
  {{-- <script src="{{ asset('assets/maps/scripts.js') }}"></script> --}}

  <script>
    $(document).ready(function () {
      $('.toast').toast();
      $('.toast').toast('show')

      $('.name').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        'translation': {
          A: {pattern: /[A-Za-z záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]/},
        }
        ,onKeyPress: function (value, event) {
          let capitalize = ucwords(event.currentTarget.value, true);
          event.currentTarget.value = capitalize;
        }
      });
      $('.age').mask('00');
      $('.cel').mask('(00) A0000-0000', {
        translation: {
          'A': {
            pattern: /[9]/
          }
        }
      });
    });

    function ucwords(str, force) {
      str = force ? str.toLowerCase() : str;
      return str.replace(/(\b)([a-zA-Z])/g,
      function(firstLetter){
        return firstLetter.toUpperCase();
      });
    }
  </script>

</body>

</html>