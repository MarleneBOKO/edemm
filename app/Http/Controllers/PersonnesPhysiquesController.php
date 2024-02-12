<?php

// app/Http/Controllers/PersonnePhysiqueController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonnePhysique;

class PersonnesPhysiquesController extends Controller
{
    public function index(Request $request){
        // Récupérer la requête de recherche
        $query = $request->input('query');

        // Si une recherche est effectuée, appliquer le filtre
        if($query){
            $request->session()->put('search_query', $query);
            $personnesPhysiques = PersonnePhysique::query()
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('prenom', 'like', '%'.$query.'%')
                ->paginate(5);
        } else {
            // Sinon, récupérer la liste paginée des utilisateurs
            $request->session()->forget('search_query');
            $personnesPhysiques = PersonnePhysique::paginate(5);
        }

        // Obtenez le numéro de la page actuelle
        $currentPage = $personnesPhysiques->currentPage();

        // Obtenez le nombre total de pages
        $totalPages = $personnesPhysiques->lastPage();

        // Rediriger vers la même route sans les paramètres de requête si aucun filtre de recherche n'est appliqué
        if (!$query && $request->session()->has('search_query')) {
            return redirect()->route('client.physique');
        }

        return view('client.physique', ['personnesPhysiques' => $personnesPhysiques, 'currentPage'=>$currentPage, 'totalPages'=>$totalPages, 'query' => $query]);
    }



    public function create()
    {
        return view('client.physique');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_lieu' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'adres_pro' => 'required|string|max:255',
            'adres_ref' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'np' => 'required|string|max:255',
            'ident' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sit_mat' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'adres_dom' => 'required|string|max:255',
            'tel_fixe' => 'required|string|max:255',
            'piece_presente' => 'required|string|max:255',
            'date_lieu_piece' => 'required|string|max:255',
        ]);

        PersonnePhysique::create($validatedData);

        return redirect()->route('client.physique')->with('success', 'Personne physique ajoutée avec succès');
    }
    public function show($id)
    {
        $personnePhysique = PersonnePhysique::find($id);

        return view('client.physique', ['personnePhysique' => $personnePhysique]);
    }

    public function edit($id)
    {
        $personnePhysique = PersonnePhysique::findOrFail($id);

        return view('client.physique', ['personnePhysique' => $personnePhysique]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_lieu' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'adres_pro' => 'required|string|max:255',
            'adres_ref' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'np' => 'required|string|max:255',
            'ident' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sit_mat' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'adres_dom' => 'required|string|max:255',
            'tel_fixe' => 'required|string|max:255',
            'piece_presente' => 'required|string|max:255',
            'date_lieu_piece' => 'required|string|max:255',
        ]);

        $personnePhysique = PersonnePhysique::findOrFail($id);
        $personnePhysique->update($validatedData);

        return redirect()->route('client.physique')->with('success', 'Personne physique mise à jour avec succès');
    }

    public function destroy($id)
    {
        $personnePhysique = PersonnePhysique::findOrFail($id);
        $personnePhysique->delete();

        return redirect()->route('client.physique')->with('success', 'Personne supprimé avec succès');
    }

}


