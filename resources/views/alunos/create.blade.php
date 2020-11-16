@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Área de cadastro de alunos!</h1>
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
<!-- Cadastro do Aluno -->
            <div class="form-group">
                <label>Nome do aluno</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label>Código do aluno</label>
                <input type="nomecurso" class="form-control" name="nomecurso" id="nomecurso">
            </div>

            <div class="form-group">
            <label>Situação do Aluno:</label>
            {!! Form::select('motivo', [null => '-- SELECIONE SITUAÇÃO DO ALUNO --', 'ativo' => 'Ativo', 'inativo' => 'Inativo'],  ['id'=>'situaca','class'=>'form-control text-center required']) !!}
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    
                <h2>Endereço do aluno:</h2>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" id="inputCEP">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Endereço 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" class="form-control">
                        <option selected>Escolher...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <!-- cadastrar informações academicas -->
            <div class="form-row">
                <div class="form-group col-md-6">                    
                    <h2>Informações acadêmicas do aluno:</h2>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Curso do aluno</label>
                    <input type="text" class="form-control" id="inputCurso">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Turma do aluno</label>
                    <input type="text" class="form-control" id="inputTurma">
                    
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Data da matrícula</label>
                    <input type="text" class="form-control" id="inputMatricula">
                    
                </div>
                <div class="input-group mb-3" style="margin-top: 40px;">
                    <div class="file-field">
                    <span class="input-group-text">Selecione uma foto do aluno:</span>
                        <div class="btn  btn-sm float-left">
                            
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    <!-- fim do cadastro -->
    <div class="form-group col-md-2">
            <input type="submit" name="send" value="Salvar Cadastro" class="btn btn-dark btn-block">
        
    </div>
    </form>
    </div>
@endsection
