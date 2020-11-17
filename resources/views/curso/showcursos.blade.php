@extends('layouts.app')

@section('content')
   

    <div class="container mt-2">
    <h3 class="text-center">Vizualizar todos os cursos cadastrados </h3>
    <div class="x_content table-overflow" id="dvData">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="myTable" class="table table-striped table-hover">
    
        <thead>
            <tr>
                <th>Código</th>
                <th>Curso</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
       
        @foreach ($cursos as $key => $value)
            <tr>
                <td>{{ $key }} </td>
                <td>{{ $value }} </td>
                <td><a href="{{ route('EditCurso', $key)  }}"><i class="nav-icon fas fa-edit"></i></a></td>
                <td><a href="{{ route('DeleteCurso', $key)  }}"><i class="nav-icon fas fa-trash-alt"></i></a></td>
            </tr>  
            
        @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ShowCurso') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'codigo', name: 'codigo'},
            {data: 'nome', name: 'nome'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>

@endpush