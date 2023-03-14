<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sessao;
use App\Models\Projeto;
use Illuminate\Auth\Access\Response;

class userPolicy
{
    public function viewProject(User $user, Projeto $projeto)
    {
       return $user->id===$projeto->user_id ? Response::allow() : Response::deny('Você não criou este projeto');
    }

    public function viewSession(User $user, Sessao $sessao)
    {
       return $user->id===$sessao->user_id ? Response::allow() : Response::deny('Você não criou esta sessão');
    }



    public function updateProject(User $user, Projeto $projeto)  
    {
       return $user->id===$projeto->user_id ? Response::allow() : Response::deny('Você não criou este projeto');
    }

    public function updateSession(User $user, Sessao $sessao)  
    {
       return $user->id===$sessao->user_id ? Response::allow() : Response::deny('Você não criou esta sessão');
    }




    public function closedProject(User $user, Projeto $projeto)  
    {
       return $user->id===$projeto->user_id ? Response::allow() : Response::deny('Você não criou este projeto');
    }

    public function closedSession(User $user, Sessao $sessao)  
    {
       return $user->id===$sessao->user_id ? Response::allow() : Response::deny('Você não criou esta sessão');
    }




    public function reopenProject(User $user, Projeto $projeto)  
    {
       return $user->id===$projeto->user_id ? Response::allow() : Response::deny('Você não criou este projeto');
    }

    public function reopenSession(User $user, Sessao $sessao)  
    {
       return $user->id===$sessao->user_id ? Response::allow() : Response::deny('Você não criou esta sessão');
    }
}
