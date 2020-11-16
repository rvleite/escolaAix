@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Área de cadastro de cursos!</h1>
    </div>

    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form  method="post" action="{{ route('CadCursoPost') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Nome do curso</label>
                <input type="nomecurso" class="form-control" name="nomecurso" id="nomecurso">
            </div>

            <div class="form-group">
                <label>Código do curso</label>
                <input type="text" class="form-control" name="codigoCurso" id="codigoCurso">
            </div>

            <input type="submit" name="send" value="Salvar Curso" class="btn btn-dark btn-block">
        </form>
    </div>
   
@endsection