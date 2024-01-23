<?php

// app/Http/Controllers/PersonnePhysiqueController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonnePhysique;

class PersonnesPhysiquesController extends Controller
{
    public function index()
    {
        // Récupérer toutes les personnes physiques
        $personnesPhysiques = PersonnePhysique::all();

        // Passer les données à la vue (si vous en avez une)
        return view('personnes_physiques.index', ['personnesPhysiques' => $personnesPhysiques]);
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

        return redirect()->route('personnes_physiques.index')->with('success', 'Personne physique ajoutée avec succès');
    }

}
