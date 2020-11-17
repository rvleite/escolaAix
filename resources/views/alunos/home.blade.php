@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Listar alunos cadastrados</h1>
        
    </div>

    <div class="container mt-12">


        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <!-- Lista para paginação -->
        <table style="width: 100%;" aria-describedby="example" role="grid" id="example" class="table table-striped table-bordered dataTable no-footer" width="100%" cellspacing="0">
                <table id="myDataTable" class="table table-striped table-hover" cellspacing="0"
                                       width="100%">
                                    <thead>
            <tr>
                <th class="tfoot_search">ID</th>
                <th class="tfoot_search">Nome</th>
                <th class="tfoot_search">Codigo Curso</th>
                <th class="tfoot_search">Status</th>
                <th class="tfoot_search">CEP</th>
                <th class="tfoot_search">Endereço</th>
                <th class="tfoot_search">Bairro</th>
                <th class="tfoot_search">Complemento</th>
                <th class="tfoot_search">Cidade</th>
                <th class="tfoot_search">Estado</th>
                <th class="tfoot_search">Curso</th>
                <th class="tfoot_search">Turma</th>
                <th class="tfoot_search">Matricula</th>
                <th width="100px" colspan="2">Ações</th>      
            </tr>
            </thead>
            <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->name }}</td>
                <td>{{ $aluno->codigocurso }}</td>
                <td>{{ $aluno->motivo }}</td>
                <td>{{ $aluno->inputCEP }}</td>
                <td>{{ $aluno->inputAddress }}</td>
                <td>{{ $aluno->bairro }}</td>
                <td>{{ $aluno->complemento }}</td>
                <td>{{ $aluno->inputCity }}</td>
                <td>{{ $aluno->inputEstado }}</td>
                <td>{{ $aluno->inputCurso }}</td>
                <td>{{ $aluno->inputTurma }}</td>
                <td>{{ $aluno->inputMatricula }}</td>
                <td><a href="{{ route('EditAluno', $aluno->id)  }}"><i class="nav-icon fas fa-edit"></i></a></td>
                <td><a href="{{ route('DeleteAluno', $aluno->id)  }}"><i class="nav-icon fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
@section('include-js-rule-jquery')
$('.datatable-column-search-inputs').DataTable({
    initComplete: function() {
        this.api().columns().every(function() {
            var column = this;
            if ($(column.footer()).hasClass('tfoot_search')) {

                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                    that.search(this.value).draw();
                });

            } else if ($(column.footer()).hasClass('tfoot_select')) {
                //Updated this section
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            }
        });
    }
});

@stop