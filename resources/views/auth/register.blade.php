@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Registrar</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name">Nome</label>
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Digite seu nome" value="{{ old('name') }}"
                                class="form-control input-md @error('name') is-invalid @enderror" required="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="email">Email</label>
                        <div class="col-md-12">
                            <input id="email" name="email" type="email" placeholder="Digite seu email" value="{{ old('email') }}"
                                class="form-control input-md @error('email') is-invalid @enderror" required="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="phone">Telefone</label>
                        <div class="col-md-12">
                            <input id="phone" name="phone" type="text" placeholder="(00)00000-0000" value="{{ old('phone') }}"
                                class="form-control input-md @error('phone') is-invalid @enderror" required="">
                            @error('phone')
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
                            <input id="password" name="password" type="password" placeholder="Digite sua senha"
                                class="form-control input-md @error('password') is-invalid @enderror" required="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="password_confirmation">Confirme sua Senha</label>
                        <div class="col-md-12">
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repita sua senha"
                                class="form-control input-md @error('password_confirmation') is-invalid @enderror" required="">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-12 text-center" style="">
                        <button class="btn btn-lg btn-dark rounded mx-3 text-light px-4">Cadastrar</button>
                        <a class="btn btn-lg rounded px-4 btn-dark mx-3 text-light" href="/">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection