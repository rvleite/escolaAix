<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use DB;
use Datatables;

class CursosController extends Controller
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
       
         return view('curso.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $nome = $_POST['nomecurso'];
        $codigo = $_POST['codigoCurso'];

        DB::insert('insert into cursos (nome, codigo) values (?, ?)', [$nome, $codigo]);

        return redirect()
        ->back()
        ->with('success', 'OS cursos foram adicionado com sucesso!');

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
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos)
    {
       
       // $cursos =  Datatables::of(Cursos::query())->make(true);
        //dd($cursos);

        //return Datatables::of($cursos)->make();
        //return view('curso.showcursos',compact('cursos'));

        
        $cursos = Cursos::pluck('nome', 'codigo')->toArray();

        return view('curso.showcursos',['cursos' => $cursos]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit( Cursos $codigo)
    {
        //dd($codigo);
        $user = Cursos::find($codigo);
        $roles = Cursos::pluck('nome','codigo');
        
        
        foreach ($roles as $key => $value) {
            $codigo = $key;
            $nome = $value;
        }
        
        
        return view('curso.editcurso',compact('roles', 'nome', 'codigo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update( Cursos $cursos)
    {
        
        request()->validate([
            'nome' => 'required',
            'codigo' => 'required',
        ]);

        $cursos->update($request->all());
    
        return redirect()
        ->back()
        ->with('success', 'O curso foi editador com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $codigo)
    {
        
        DB::table("cursos")->where('codigo',$codigo)->delete();
        return redirect()
        ->back()
        ->with('success', 'O curso foi deletado com sucesso!');
    }
}
