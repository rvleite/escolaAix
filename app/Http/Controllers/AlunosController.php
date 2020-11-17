<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;
use DB;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = DB::table('alunos')->paginate(15);
//dd($alunos[1]);
        return view('alunos.home', ['alunos' => $alunos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //convert a data no formato do BD
        $request['inputMatricula'] = date("Y-m-d H:i:s",strtotime(str_replace('/', '-', $request->inputMatricula)));
                
        
        $target_dir = "/";
        //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file = basename($_FILES["fileToUpload"]["name"]);

    
        $request["file"] = $target_file;


        // inseri no Bd os dadaso do aluno
        Alunos::create($request->all());
        return redirect()
        ->back()
        ->with('success', 'O Aluno foi incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function show(Alunos $id)
    {
        //dd($id);
        $alunos = Alunos::pluck('name','codigocurso','motivo','inputCEP','inputAddress','bairro','complemento','inputCity','inputEstado','inputCurso','inputTurma','inputMatricula', 'file')->toArray();

        return view('alunos.showcursos',['alunos' => $alunos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $alunos = DB::table('alunos')->find($id);
                
        return view('alunos.edit',['alunos' => $alunos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alunos $alunos)
    {
        
        $request['inputMatricula'] = date("Y-m-d H:i:s",strtotime(str_replace('/', '-', $request->inputMatricula)));

        
        request()->validate([
            'id' => 'required',
            'nome' => 'required',
            'name'  => 'required',
            'codigocurso'  => 'required',
            'motivo' => 'required',
            'inputCEP' => 'required',
            'inputAddress' => 'required',
            'bairro' => 'required',
            'complemento' => 'required',
            'inputCity' => 'required',
            'inputEstado' => 'required',
            'inputCurso' => 'required',
            'inputTurma' => 'required',
            'inputMatricula' => 'required'
        ]);

        $alunos->update($request->all());
    
        return redirect()
        ->back()
        ->with('success', 'O aluno foi editador com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("alunos")->where('id',$id)->delete();
        return redirect()
        ->back()
        ->with('success', 'O aluno foi deletado com sucesso!');
    }
}
