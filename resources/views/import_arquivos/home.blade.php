 @extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Área de cadastro de cursos!</h1>
    
        <form name="formimport" id="formImport" method="post" action="{{ route('ImportCursoPost') }}" enctype="multipart/form-data">
        @csrf

            <div class="file-field">
            <span class="input-group-text">Selecione um arquivo:</span>
                <div class="btn  btn-sm float-left">
                    
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </div>

            <div style="margin-top: 40px;">
                <input type="submit" value="Enviar Arquivos" name="submit">
            </div>
        </form>
    
        <!-- Menssagem de confirmação da importação do arquivos -->
        @if (session()->has('success'))
            {{ session('success') }}
        @endif
  
  <!-- lista de cursos -->
        <div class="form-group">
            {{ Form::label('cursosImport', 'Cursos Importados: ') }}

            {{  Form::select('cursos',$cursos,null,['class' => 'required form-control select2','id'=>'cursos']) }}

        </div>
    </div>

@endsection