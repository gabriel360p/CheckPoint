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
        $projetos = \DB::table('projetos')->where('user_id','=',Auth::id())
        ->where('nome','like','%'.$request->search.'%')
        ->where('descricao','like','%'.$request->search.'%')
        ->get();

        $sessaos = \DB::table('sessaos')->where('user_id','=',Auth::id())
        ->where('feitos','like','%'.$request->search.'%')
        ->where('finalidades','like','%'.$request->search.'%')
        ->get();

        // dd($sessaos,$projetos);

        return view('results',['projetos'=>$projetos,'sessaos'=>$sessaos]);
    }
}
