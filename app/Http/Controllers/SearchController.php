<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use App\Models\Projeto;
use Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $projetosNome = \DB::table('projetos')->where('user_id','=',Auth::id())
        ->where('nome','like','%'.$request->search.'%')
        ->get();
        
        $projetosDesc = \DB::table('projetos')->where('user_id','=',Auth::id())
        ->where('descricao','like','%'.$request->search.'%')
        ->get();

        $sessaosFeitos = \DB::table('sessaos')->where('user_id','=',Auth::id())
        ->where('feitos','like','%'.$request->search.'%')
        ->get();

        $sessaosFinalidades = \DB::table('sessaos')->where('user_id','=',Auth::id())
        ->where('finalidades','like','%'.$request->search.'%')
        ->get();

        return view('results',[
            'projetosNome'=>$projetosNome,
            'projetosDesc'=>$projetosDesc,
            'sessaosFeitos'=>$sessaosFeitos,
            'sessaosFinalidades'=>$sessaosFinalidades,
        ]);

    }
}
