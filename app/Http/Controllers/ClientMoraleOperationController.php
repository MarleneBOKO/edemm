<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonneMorale;
use App\Models\ClientMoraleOperation;

class ClientMoraleOperationController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');

        $operationMorale = ClientMoraleOperation::paginate(5);

        // Effectuer la recherche dans les opérations Morales


            if($query){
                $operationMorale = ClientMoraleOperation::query()
                ->where('nature', 'like', '%'.$query.'%')
                ->orWhere('moyen', 'like', '%'.$query.'%')
                ->paginate(5);
            } else {

                // Récupérer toutes les personnes Morales
                $personnesMorales = PersonneMorale::paginate(5);
            }

        return view('client.operationm', ['personnesMorales' => $personnesMorales, 'operationMorale' => $operationMorale]);
    }


    public function store(Request $request){
        $request->validate([
            'nat' => 'required|string',
            'moyen' => 'required|string',
            'montant' => 'required|numeric',
            'Date_op' => 'required|date',
            'client' => 'required|exists:personnes_morales,id', // Assurez-vous que le client existe dans la table des personnes Morales
        ]);

        // Créer une nouvelle opération pour le client Morale
        $operation = new ClientMoraleOperation();
        $operation->nature = $request->nat;
        $operation->moyen = $request->moyen;
        $operation->montant = $request->montant;
        $operation->date_operation = $request->Date_op;
        $operation->personne_morale_id = $request->client;
        $operation->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Opération enregistrée avec succès.');
    }
    public function edit($id) {
        $operation = ClientMoraleOperation::find($id);
        $personnesMorales = PersonneMorale::all();
        return view('client.operationm', ['operation' => $operation, 'personnesMorales' => $personnesMorales]);
    }

    public function update(Request $request, $id){
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nat' => 'required|string',
        'moyen' => 'required|string',
        'montant' => 'required|numeric',
        'Date_op' => 'required|date',
        'client' => 'required|exists:personnes_morales,id',
    ]);

    // Mettre à jour l'opération
    $operation = ClientMoraleOperation::findOrFail($id);
    $operation->nature = $request->input('nat');
    $operation->moyen = $request->input('moyen');
    $operation->montant = $request->input('montant');
    $operation->date_operation = $request->input('Date_op');
    $operation->personne_morale_id = $request->client;
    $operation->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy($id){
        $operation = ClientMoraleOperation::findOrFail($id);
        $operation->delete();

        return redirect()->back()->with('success', 'L\'opération a été supprimée avec succès.');
    }


}
