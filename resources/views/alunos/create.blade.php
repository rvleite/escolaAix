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

            <form name="formAluno" id="formAluno"  method="post" action="{{ route('CadAlunoPost') }}" enctype="multipart/form-data">

                <!-- CROSS Site Request Forgery Protection -->
                @csrf
                <!-- Cadastro do Aluno -->
                <div class="form-group">
                    <label>Nome do aluno</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label>Código do aluno</label>
                    <input type="text" class="form-control" name="codigocurso" id="codigocurso">
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
                        <input type="text" class="form-control" name="inputCEP" id="inputCEP">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Endereço</label>
                    <input type="text" class="form-control" name="inputAddress"  id="inputAddress" >
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Apartamento, hotel, casa, etc.">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" name="inputCity" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEstado">Estado</label>
                        <input type="text" class="form-control" name="inputEstado" id="inputEstado">
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
                        <input type="text" class="form-control" name="inputCurso" id="inputCurso">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTurma">Turma do aluno</label>
                        <input type="text" class="form-control" name="inputTurma" id="inputTurma">
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputMatricula">Data da matrícula</label>
                        <input type="text" class="form-control" name="inputMatricula" id="inputMatricula">
                        
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