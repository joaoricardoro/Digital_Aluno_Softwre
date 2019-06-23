@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Pesquisa de Estudantes</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="GET" action="{{ route('students') }}">
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name">Nome</label>
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Nome do estudante" value="{{ @$parameters['name'] }}"
                            class="form-control input-md @error('name') is-invalid @enderror">
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
                            <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" value="{{ @$parameters['cpf'] }}"
                                class="form-control input-md @error('cpf') is-invalid @enderror">
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
                            <input id="email" name="email" type="email" placeholder="Digite seu email" value="{{ @$parameters['email'] }}"
                                class="form-control input-md @error('email') is-invalid @enderror">
                            @error('email')
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
                                    @if (@$parameters['course_id'] == $course->id)
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
                </fieldset>
                <div class="row">
                    <div class="col-md-12 text-center" style="">
                        <button class="btn btn-dark rounded mx-3 text-light px-4">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3> Estudantes </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th> Nome / Email </th>
                        <th> CPF </th>
                        <th> Data Nasc. </th>
                        <th> Telefone </th>
                        <th> Curso </th>
                        <th class="text-right"> Periodo </th>
                        <th class="text-center"> .:. </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}<br>
                                {{ $student->email }}</td>
                            <td>{{ $student->cpf }}</td>
                            <td>{{ $student->birthday->format('d/m/Y') }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td class="text-right">{{ $student->period }}</td>
                            <td class="text-center">
                                <a href="{{route('editStudent', $student->id)}}" class="btn btn-sm btn-light rounded text-dark">Editar</a>
                                <a href="{{route('deleteStudent', $student->id)}}" class="btn btn-sm btn-danger rounded text-light">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection