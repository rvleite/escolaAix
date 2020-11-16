<!-- need to remove -->
<li class="nav-item">
	<!-- Página principal -->
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
   <!-- Listar alunos Curso -->
    <a href="{{ route('ListAluno') }}" class="nav-link active">
        <i class="nav-icon fas fa-list"></i>
        <p>Listar Alunos</p>
    </a>
<!-- Cadastrar Curso -->
    <a href="{{ route('CadCurso') }}" class="nav-link active">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>Cadastrar Curso</p>
    </a>
<!-- Listar alunos Curso -->
     <a href="{{ route('ShowCurso') }}" class="nav-link active">
        <i class="nav-icon fas fa-list"></i>
        <p>Listar Cursos</p>
    </a>
<!-- Cadastrar Alunos -->
    <a href="{{ route('CadAluno') }}" class="nav-link active">
        <i class="nav-icon fas fa-pencil-alt"></i>
        <p>Cadastrar Aluno</p>
    </a>

    <!-- Importa arquivos xml -->
    <a href="{{ route('ImportCurso') }}" class="nav-link active">
        <i class="nav-icon fas fa-file-import"></i>
        <p>Importar arquivos XML</p>
    </a>
</li>
