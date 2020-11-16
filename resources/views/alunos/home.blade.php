@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Listar alunos cadastrados</h1>
    </div>

    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        
    </div>
@endsection
