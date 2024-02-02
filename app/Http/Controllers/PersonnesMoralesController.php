<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonneMorale;

class PersonnesMoralesController extends Controller
{
    public function index()
    {
        $personnesMorales = PersonneMorale::all();
        return view('client.moral', ['personnesMorales' => $personnesMorales]);
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('client.moral');
    }

    // Traiter le formulaire de création
    public function store(Request $request){
        $validatedData = $request->validate([
            'denomination' => 'required|string|max:255',
            'forme_sociale' => 'required|string|max:255',
            'siege_social' => 'required|string|max:255',
            'num_rccm' => 'required|string|max:255',
            'num_ifu' => 'required|string|max:255',
            'nom_representant' => 'required|string|max:255',
            'prenom_representant' => 'required|string|max:255',
            'add_representant' => 'required|string|max:255',
            'dom_representant' => 'required|string|max:255',
            'home_representant'=>'required|string|max:255',
            'nationalite'=>'required|string|max:255',
            'piece_presentee'=>'required|string|max:255',
            'tel_fixe'=>'required|string|max:255',
            'tel_portable'=>'required|string|max:255',
            'email'=>'required|string|max:255',
        ]);

        PersonneMorale::create($validatedData);

        return redirect()->route('client.moral')->with('success', 'Personne morale créée avec succès');
    }

    // Afficher les détails d'une personne morale
    public function show($id)
    {
        $personneMorale = PersonneMorale::findOrFail($id);
        return view('client.moral', ['personneMorale' => $personneMorale]);
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $personneMorale = PersonneMorale::findOrFail($id);
        return view('client.moral', ['personneMorale' => $personneMorale]);
    }

    // Traiter le formulaire de modification
    public function update(Request $request, $id)
    {
        $request->validate([
            'denomination' => 'required|string|max:255',
            'forme_sociale' => 'required|string|max:255',
            'siege_social' => 'required|string|max:255',
            'num_rccm' => 'required|string|max:255',
            'num_ifu' => 'required|string|max:255',
            'nom_representant' => 'required|string|max:255',
            'prenom_representant' => 'required|string|max:255',
            'add_representant' => 'required|string|max:255',
            'dom_represantant' => 'required|string|max:255',
            'home_representant'=>'required|string|max:255',
            'nationnalité'=>'required|string|max:255',
            'piece_presente'=>'required|string|max:255',
            'tel_fixe'=>'required|string|max:255',
            'tel_portable'=>'required|string|max:255',
            'email'=>'required|string|max:255',
        ]);

        $personneMorale = PersonneMorale::findOrFail($id);
        $personneMorale->update($request->all());

        return redirect()->route('client.moral')
            ->with('success', 'Personne morale mise à jour avec succès');
    }

    public function destroy($id)
    {
        $personneMorale = PersonneMorale::findOrFail($id);
        $personneMorale->delete();

        return redirect()->route('client.moral')
            ->with('success', 'Personne morale supprimée avec succès');
    }
}
