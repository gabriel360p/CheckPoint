<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Sessao;
use Illuminate\Http\Request;
use Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function closed(Projeto $projeto)
    {
        $sessaos=\DB::table('sessaos')->where('projeto_id','=',$projeto->id)->get();
        //update em massa
        // ->update(['aberta' => false]);
        // ->update(['fechamento','=',date('d/m/Y H:i')]);

        if(count($sessaos)!=0){
            return back()->with('sessaoAberta','O projeto '.$projeto->nome.' não pode ser fechado pois possui sessões abertas');
        }else{
            $projeto->producao=false;
            $projeto->save();
            return redirect(url('projetos'));
        }
        return redirect(url('projetos'));
    }

    public function reopen(Projeto $projeto)
    {
        $projeto->producao=true;
        $projeto->save();
        return redirect(url('projetos'));
    }

    public function inProduction()
    {
        return view('projetos.inProduction',['projetos'=>$projetos=Projeto::where('user_id',Auth::id())->where('producao',true)->simplePaginate(5)]);
    }

    public function outProduction()
    {
        return view('projetos.outProduction
            ',['projetos'=>$projetos=Projeto::where('user_id',Auth::id())->where('producao',false)->simplePaginate(5)]);
    }

    public function index()
    {
        return view('projetos.all',['projetos'=>$projetos=Projeto::where('user_id',Auth::id())->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Projeto::create([
            'user_id'=>Auth::id(),
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'link2Projeto'=>$request->link2Projeto,
            'link1Projeto'=>$request->link1Projeto,
            'producao'=>true,
        ]);

        return redirect(url('projetos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Projeto $projeto)
    {
        return view('projetos.show',['projeto'=>$projeto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto)
    {
        $projeto->update([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'link2Projeto'=>$request->link2Projeto,
            'link1Projeto'=>$request->link1Projeto,
        ]);

        return redirect(url('projetos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projeto $projeto)
    {
        //
    }
}
