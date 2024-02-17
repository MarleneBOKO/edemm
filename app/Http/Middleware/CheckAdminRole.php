<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {



        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login'); // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        // Vérifier si l'utilisateur est un administrateur
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized'); // Renvoyer une erreur 403 si l'utilisateur n'est pas un administrateur
        }

        return $next($request);
    }
}
