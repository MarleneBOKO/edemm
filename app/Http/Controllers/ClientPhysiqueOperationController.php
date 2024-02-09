<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnePhysique;
use App\Models\ClientPhysiqueOperation;

class ClientPhysiqueOperationController extends Controller
{
    public function index(){
        $personnesPhysiques = PersonnePhysique::all();
        $operationPhysique = ClientPhysiqueOperation::all();
        return view('client.operation', ['personnesPhysiques' => $personnesPhysiques, 'operationPhysique' => $operationPhysique]);
    }

    public function store(Request $request){
        $request->validate([
            'nat' => 'required|string',
            'moyen' => 'required|string',
            'montant' => 'required|numeric',
            'Date_op' => 'required|date',
            'client' => 'required|exists:personnes_physiques,id', // Assurez-vous que le client existe dans la table des personnes physiques
        ]);

        // Créer une nouvelle opération pour le client physique
        $operation = new ClientPhysiqueOperation();
        $operation->nature = $request->nat;
        $operation->moyen = $request->moyen;
        $operation->montant = $request->montant;
        $operation->date_operation = $request->Date_op;
        $operation->personne_physique_id = $request->client;
        $operation->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Opération enregistrée avec succès.');
    }
    public function edit($id) {
        $operation = ClientPhysiqueOperation::find($id);
        $personnesPhysiques = PersonnePhysique::all();
        return view('client.operation', ['operation' => $operation, 'personnesPhysiques' => $personnesPhysiques]);
    }

    public function update(Request $request, $id){
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nat' => 'required|string',
        'moyen' => 'required|string',
        'montant' => 'required|numeric',
        'Date_op' => 'required|date',
    ]);

    // Mettre à jour l'opération
    $operation = ClientPhysiqueOperation::findOrFail($id);
    $operation->nature = $request->input('nat');
    $operation->moyen = $request->input('moyen');
    $operation->montant = $request->input('montant');
    $operation->date_operation = $request->input('Date_op');
    $operation->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy($id){
        $operation = ClientPhysiqueOperation::findOrFail($id);
        $operation->delete();

        return redirect()->back()->with('success', 'L\'opération a été supprimée avec succès.');
    }


}
