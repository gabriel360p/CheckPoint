<?php

namespace App\Http\Controllers;


use App\Models\Sessao;
use App\Models\Projeto;
use App\Models\Categoria;
use App\Notifications\notifyOpenSession;
use App\Notifications\notifyClosedSession;
use App\Http\Requests\OpenSessaoRequest;

use App\Http\Requests\ClosedSessaoRequest;
use Auth;
// use Carbon\Carbon;

use Illuminate\Http\Request;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $projetos = \DB::table('projetos')->where('producao','=',true)->where('user_id','=',Auth::id())->get();

        return view('sessaos.create',['categorias'=>$categorias,'projetos'=>$projetos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpenSessaoRequest $request)
    {
        Sessao::create([
            'aberta'=>true,
            'abertura'=>\Carbon\Carbon::now()->toDateTimeString(),
            'categoria_id'=>$request->categoria,
            'user_id'=>Auth::id(),
            'finalidades'=>$request->finalidades,
            'projeto_id'=>$request->projeto,
        ]);

        $user = Auth::user();
        $finalidades=$request->finalidades;

        // Auth::user()->notify(new notifyOpenSession($user,$finalidades));

        return redirect(url('sessao/opens'));
    }

    /**
     * Display the specified resource.
     */
    
    public function closedPage(Sessao $sessao)
    {
        $categorias = Categoria::all();

        return view('sessaos.closedPage',['sessao'=>$sessao,'categorias'=>$categorias]);
    }

    public function show(Sessao $sessao)
    {
        $this->authorize('viewSession',$sessao);

        $categorias = Categoria::all();
        $projetos = \DB::table('projetos')->where('producao','=',true)->where('user_id','=',Auth::id())->get();

        return view('sessaos.show',['sessao'=>$sessao,'categorias'=>$categorias,'projetos'=>$projetos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sessao $sessao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sessao $sessao)
    {
        $this->authorize('updateSession',$sessao);

        $sessao->update([
            'abertura'=>$request->abertura,
            'categoria_id'=>$request->categoria,
            'finalidades'=>$request->finalidades,
            'projeto_id'=>$request->projeto,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sessao $sessao)
    {
        //
    }

    public function all()
    {
        $sessaos=Sessao::where('user_id',Auth::id())->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('sessaos.all',['sessaos'=>$sessaos]);
    }

    public function opens()
    {
        // $sessaos=\DB::table('sessaos')->where('user_id','=',Auth::id())->where('aberta','=',true)->get();

        $sessaos=Sessao::where('user_id',Auth::id())->where('aberta',true)->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('sessaos.opens',['sessaos'=>$sessaos]);

    }

    public function closeds()
    {
        $sessaos=Sessao::where('user_id',Auth::id())->where('aberta',false)->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('sessaos.closeds',['sessaos'=>$sessaos]);
        
    }

    public function details(Sessao $sessao)
    {
        $categorias=Categoria::all();
        $projetos = \DB::table('projetos')->where('producao','=',true)->where('user_id','=',Auth::id())->get();

        return view('sessaos.details',['sessao'=>$sessao,'categorias'=>$categorias,'projetos'=>$projetos]);
    }


    public function reopen(Sessao $sessao)
    {
        $this->authorize('reopenSession',$sessao);

        $sessao->update([
            'aberta'=>true,
        ]);

        return redirect(route('sessao.opens'));
    }

    public function closed(Sessao $sessao, ClosedSessaoRequest $request)
    {
        $this->authorize('closedSession',$sessao);


        $sessao->update([
            'abertura'=>$request->abertura,
            'categoria_id'=>$request->categoria,
            'finalidades'=>$request->finalidades, 
            'aberta'=>false,
            'fechamento'=>\Carbon\Carbon::now()->toDateTimeString(),
            'feitos'=>$request->feitos,           
        ]);

        $user = Auth::user();
        $feitos = $request->feitos;
        
        // Auth::user()->notify(new notifyClosedSession($user, $feitos));

        return redirect(route('sessao.opens'));
    }
}
