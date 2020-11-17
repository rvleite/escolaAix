@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Área de editar</h1>
    </div>

    <div class="container mt-5">

<!-- Success message -->
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

<form method="post" action="{{ route('updateCurso', $codigo) }}">

    <!-- CROSS Site Request Forgery Protection -->
    @csrf


    <div class="form-group">
        <label>Nome do curso</label>
      
        {!! Form::text('Nome', $nome, array('placeholder' => 'Nome do curso','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <label>Código do curso</label>
        {!! Form::text('Codigo', $codigo, array('placeholder' => 'Nome do curso','class' => 'form-control')) !!}
    </div>

    <input type="submit" name="send" value="Salvar Curso" class="btn btn-dark btn-block">
</form>

</div>

@endsection