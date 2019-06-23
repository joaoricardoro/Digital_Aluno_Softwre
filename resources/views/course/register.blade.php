@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Curso</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('course') }}">
                @csrf
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name">Nome</label>
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Nome do curso" value="{{ old('name') }}"
                            class="form-control input-md @error('name') is-invalid @enderror" required="">
                            @error('name')
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