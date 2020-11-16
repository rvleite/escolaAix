@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Vizualizar todos os cursos cadastrados</h1>
    </div>

    <table id="listagem" class="table table-bordered">
    <thead>
      <tr>
        <th>Código do Curso</th>
        <th>Nome do curso</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
     
        <tr>
          <td></td>
          <td></td>         
          <td><a href="/ListarSaida/editar/"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td><a href="/ListarSaida/remove/"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      
    </tbody>
  </table>

@endsection