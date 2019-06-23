@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Login</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="cpf">CPF</label>
                        <div class="col-md-12">
                            <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" value="{{ old('cpf') }}"
                            class="form-control input-md @error('cpf') is-invalid @enderror" required="">
                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="password">Senha</label>
                        <div class="col-md-12">
                            <input id="password" name="password" type="password" placeholder="Digite sua senha" class="form-control input-md" required="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check">
                        <label class="col-md-12 control-label" for="password">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Lembrar de mim</label>
                        </label>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-12 text-center" style="">
                        <button class="btn btn-lg btn-dark rounded mx-3 text-light px-4">Login</button>
                        <a class="btn btn-lg rounded px-4 btn-dark mx-3 text-light" href="/">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection