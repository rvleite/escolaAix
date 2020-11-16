<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Cursos;
use Illuminate\Http\Request;
use DB;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = DB::select('select * from cursos ');

        $cursos = Cursos::pluck('nome', 'codigo')->toArray();
       // dd($cursos);
        //$cursos = Cursos::get()->pluck('nome', 'codigo')->toArray();
        
        //return View::make('curso.home')->with('cursos', $cursos);


        return view('import_arquivos.home',['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /* PEGA O ARQUIVO XML */
           // if (isset($_POST['Enviar Arquivos'])) {          
            if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
                $xml = simplexml_load_file($_FILES['fileToUpload']['tmp_name']); /* Lê o arquivo XML e recebe um objeto com as informações */            
               // dd( $xml);

                //inserir no banco
                $x = 0;
                foreach ($xml as $curso){
                    $nome = $curso->nome;
                    $codigo = $curso->codigo;

                    DB::insert('insert into cursos (nome, codigo) values (?, ?)', [$nome, $codigo]);

                    $x++;
                }

                    return redirect()
                    ->back()
                    ->with('success', 'OS cursos foram adicionado com sucesso!');
                
          //  }
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }
}
