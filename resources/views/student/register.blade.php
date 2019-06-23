@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Estudante</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('student') }}">
                @csrf
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name">Nome</label>
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Nome do estudante" value="{{ old('name') }}"
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
                        <label class="col-md-12 control-label" for="birthday">Data de Nascimento</label>
                        <div class="col-md-12">
                            <input id="birthday" name="birthday" type="date" placeholder="Data" value="{{ old('birthday') }}"
                                class="form-control input-md @error('birthday') is-invalid @enderror" required="">
                            @error('birthday')
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
                            <input id="phone" name="phone" type="text" placeholder="(00) 00000-0000" value="{{ old('phone') }}"
                                class="form-control input-md @error('phone') is-invalid @enderror" >
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="course_id">Selecione o curso</label>
                        <div class="col-md-12">
                            <select id="course_id" name="course_id" class="form-control input-md @error('course_id') is-invalid @enderror">
                                <option value="">-</option>
                                @foreach ($courses as $course)
                                    @if (old('course_id') == $course->id)
                                        <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                                    @else
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="period">Selecione o período</label>
                        <div class="col-md-12">
                            <select id="period" name="period" class="form-control input-md @error('period') is-invalid @enderror">
                                <option value="">-</option>
                                @for ($period = 1; $period <= 12; $period++)
                                    @if (old('period') == $period)
                                        <option value="{{ $period }}" selected>{{ $period }}</option>
                                    @else
                                        <option value="{{ $period }}">{{ $period }}</option>
                                    @endif
                                @endfor
                            </select>

                            @error('period')
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