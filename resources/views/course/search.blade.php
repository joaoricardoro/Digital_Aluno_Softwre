@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-graduation-cap fa-5x"></i>
            <h1 class="display-2">Pesquisa de Cursos</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="GET" action="{{ route('courses') }}">
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="name">Nome</label>
                        <div class="col-md-12">
                            <input id="name" name="name" type="text" placeholder="Nome do curso" value="{{ @$parameters['name'] }}"
                            class="form-control input-md @error('name') is-invalid @enderror">
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
                        <button class="btn btn-dark rounded mx-3 text-light px-4">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h3> Cursos </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th> Nome </th>
                        <th class="text-center"> .:. </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td class="text-center">
                                <a href="{{route('editCourse', $course->id)}}" class="btn btn-sm btn-light rounded text-dark">Editar</a>
                                <a href="{{route('deleteCourse', $course->id)}}" class="btn btn-sm btn-danger rounded text-light">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
@endsection