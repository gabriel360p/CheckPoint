<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Models\Sessao;
use App\Notifications\notifyNewProject;
use Auth;
use App\Http\Requests\ProjetoRequest;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sessionsProject(Projeto $projeto)
    {
        $sessaos=\DB::table('sessaos')->where('user_id','=',Auth::id())->where('projeto_id','=',$projeto->id)->orderBy('created_at', 'desc')->simplePaginate(5);
        // dd($sessaos);
        return view('projetos.sessionsProject',['sessaos'=>$sessaos,'projeto'=>$projeto]);
    }

    public function closed(Projeto $projeto)
    {
        $this->authorize('closedProject',$projeto);

        //procurando sessões abertas, se não houver ele fecha o projeto.
        $sessaos=\DB::table('sessaos')->where('projeto_id','=',$projeto->id)->where('aberta','=',true)->get();
        //update em massa
        // ->update(['aberta' => false]);
        // ->update(['fechamento','=',date('d/m/Y H:i')]);

        // dd(count($sessaos));

        if(count($sessaos)!=0){
            return redirect(url('projeto/sessionsProject',$projeto->id))->with('sessaoAberta','O projeto '.$projeto->nome.' não pode ser fechado pois possui sessões abertas');
        }else{
            $projeto->producao=false;
            $projeto->save();
            return redirect(url('projetos'));
        }
        return redirect(url('projetos'));
    }

    public function reopen(Projeto $projeto)
    {
        $this->authorize('reopenProject',$projeto);

        $projeto->producao=true;
        $projeto->save();
        return redirect(url('projetos'));
    }

    public function inProduction()
    {
        return view('projetos.inProduction',['projetos'=>
            $projetos=\DB::table('projetos')->where('user_id','=',Auth::id())->where('producao','=',true)->orderBy('created_at', 'desc')->simplePaginate(5)]);
    }

    public function outProduction()
    {
        return view('projetos.outProduction',['projetos'=>
                $projetos=\DB::table('projetos')->where('user_id','=',Auth::id())->where('producao','=',false)->orderBy('created_at', 'desc')->simplePaginate(5)]);
    }

    public function index()
    {
        return view('projetos.all',['projetos'=>
                $projetos=\DB::table('projetos')->where('user_id','=',Auth::id())->orderBy('created_at', 'desc')->simplePaginate(5)]);
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
    public function store(ProjetoRequest $request)
    {   
        Projeto::create([
            'user_id'=>Auth::id(),
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'link2Projeto'=>$request->link2Projeto,
            'link1Projeto'=>$request->link1Projeto,
            'producao'=>true,
        ]);

        $projeto = $request->nome;
        // Auth::user()->notify(new notifyNewProject(Auth::user(),$projeto));

        return redirect(url('projetos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Projeto $projeto)
    {
        $this->authorize('viewProject',$projeto);

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
    public function update(ProjetoRequest $request, Projeto $projeto)
    {
        $this->authorize('updateProject',$projeto);

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
