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

            <form name="formAluno" id="formAluno"  method="post" action="{{ route('updateAluno','$id') }}" enctype="multipart/form-data">

                <!-- CROSS Site Request Forgery Protection -->
                @csrf
                <!-- Cadastro do Aluno -->
                <div class="form-group">
                    <label>Nome do aluno</label>
                    {!! Form::text('Name',$alunos->name, array('placeholder' => 'Nome do Aluno','class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <label>Código do aluno</label>
                    {!! Form::text('codigocurso',$alunos->codigocurso, array('placeholder' => 'Código do curso','class' => 'form-control')) !!}
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
                        <label >CEP</label>
                        {!! Form::text('inputCEP',$alunos->inputCEP, array('placeholder' => 'CEP','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Endereço</label>
                    {!! Form::text('inputAddress',$alunos->inputAddress, array('placeholder' => 'Endereço','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    {!! Form::text('bairro',$alunos->bairro, array('placeholder' => 'Bairro','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    {!! Form::text('complemento',$alunos->complemento, array('placeholder' => 'complemento','class' => 'form-control')) !!}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        {!! Form::text('inputCity',$alunos->inputCity, array('placeholder' => 'Cidade','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEstado">Estado</label>
                        {!! Form::text('inputEstado',$alunos->inputEstado, array('placeholder' => 'Estado','class' => 'form-control')) !!}
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
                        <label for="inputCurso">Curso do aluno</label>
                        {!! Form::text('inputCurso',$alunos->inputCurso, array('placeholder' => 'Estado','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTurma">Turma do aluno</label>
                        {!! Form::text('inputCurso',$alunos->inputCurso, array('placeholder' => 'Estado','class' => 'form-control')) !!}
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputMatricula">Data da matrícula</label>
                        {!! Form::text('inputMatricula',$alunos->inputMatricula, array('placeholder' => 'Matrícula','class' => 'form-control')) !!}
                        
                    </div>
                    <div class="input-group mb-3" style="margin-top: 40px;">
                        @if(isset($alunos->file))
                        <div class="file-field">
                            <span class="input-group-text">Foto do aluno:</span>

                            <div class="btn  btn-sm float-left">                                
                                <img width="150" src="{{ $alunos->file }}">
                            </div>
                        </div>
                        @else
                        <div class="file-field">
                            <span class="input-group-text">Selecione uma foto do aluno:</span>
                                <div class="btn  btn-sm float-left">
                                    
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                        </div>
                        @endif
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

@section('include-js-rule-jquery')


    $("#inputCEP").change(function() {
        var cep = $(this).val();
        var token = '{{csrf_token()}}';
       
        $.ajax({
            type: 'POST',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: 'json',
            url: 'https://serviceweb.aix.com.br/aixapi/api/cep/'+cep,
            async: true,
            data: { cep: "" + cep + "" },
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function(data) {
            console.log(data);

                $('#inputCEP').html( $data['cep'] );
                $('#bairro').html( $data['bairro'] );
                $('#inputAddress').html( $data['logradouro'] );
                $('#inputCity').html( $data['cidade'] );
                $('#inputEstado').html( $data['estado'] );
                    
            },
            error: function(jqXHR,status,error){
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
                    
            }
        });
    });


@stop