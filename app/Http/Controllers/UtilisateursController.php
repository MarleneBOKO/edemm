<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class UtilisateursController extends Controller
{
    


    public function index(Request $request){
        // Récupérer la requête de recherche depuis l'URL
        $query = $request->input('query');

        // Si une requête de recherche est effectuée
        if($query){
            // Effectuer la recherche et paginer les résultats
            $users = User::query()
                ->where('username', 'like', '%'.$query.'%')
                ->orWhere('user_type', 'like', '%'.$query.'%')
                ->paginate(5); // 10 utilisateurs par page, ajustez selon vos besoins

            // Réinitialiser le numéro de page actuel car les résultats sont paginés
            $currentPage = 1;

            // Calculer le nombre total de pages basé sur les résultats de la recherche paginés
            $totalPages = $users->lastPage();
        } else {
            $request->session()->forget('search_query');
            // Si aucune recherche n'est effectuée, récupérer tous les utilisateurs paginés
            $users = User::paginate(5); // 5 utilisateurs par page, ajustez selon vos besoins

            // Obtenez le numéro de la page actuelle
            $currentPage = $users->currentPage();

            // Obtenez le nombre total de pages
            $totalPages = $users->lastPage();
        }

        return view('dashboard.utilisateur', compact('users', 'currentPage', 'totalPages', 'query'));
    }


    public function show(){
        // Récupérez les données de profil de l'utilisateur depuis la base de données
        $user = auth()->user();

        // Retournez la vue du profil avec les données de l'utilisateur
        return view('dashboard.profile', ['user' => $user]);
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
