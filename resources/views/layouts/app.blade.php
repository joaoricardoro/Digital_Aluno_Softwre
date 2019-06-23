<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="{!!asset('css/theme.css') !!}">
</head>

<body class="bg-info text-dark">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <i class="fa fa-graduation-cap"></i> <b> Digital Aluno<br></b>
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar10">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item"> <a class="nav-link" href="{{route('register')}}">Criar Conta<br></a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('login')}}">Login<br></a> </li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{route('students')}}">Buscar Estudantes<br></a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('courses')}}">Buscar Cursos<br></a> </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('student')}}">Cadastrar Estudante</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('course')}}">Cadastrar Curso</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}">Sair</a> </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="py-5">
        <div class="container">

        @if(session()->get('success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            {{ session()->get('success') }}  
                        </div>
                    </div>
                </div>
            @endif
            @if(session()->get('error'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}  
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $('#cpf').mask('000.000.000-00');
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        $('#phone').mask(SPMaskBehavior, spOptions);
    </script>
</body>
</html>