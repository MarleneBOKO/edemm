<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class UtilisateursController extends Controller
{

    public function index(){
        $users = User::all(); // Récupérer tous les utilisateurs depuis le modèle User
        // Récupérez la liste paginée des utilisateurs
        $users = User::paginate(10); // 10 utilisateurs par page, ajustez selon vos besoins

        // Obtenez le numéro de la page actuelle
        $currentPage = $users->currentPage();

        // Obtenez le nombre total de pages
        $totalPages = $users->lastPage();

        return view('dashboard.utilisateur', compact('users','users', 'currentPage', 'totalPages'));
    }

    public function edit($id){
        $user = User::find($id);

        return view('dashboard.utilisateur', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'user_type' => ['required', 'in:admin,user'],
        ]);

        $user->update($validatedData);

        return redirect()->route('dashboard.utilisateur')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function delete($id){
        // Recherche de l'utilisateur
        $user = User::find($id);

        // Vérifie si l'utilisateur existe
        if ($user) {
            // Suppression de l'utilisateur
            $user->delete();

            // Redirection avec un message de succès
            return redirect()->route('dashboard.utilisateur')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            // L'utilisateur n'existe pas, rediriger avec un message d'erreur
            return redirect()->route('dashboard.utilisateur')->with('error', 'Utilisateur non trouvé.');
        }
    }

}
