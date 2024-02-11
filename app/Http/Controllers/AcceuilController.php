<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonnePhysique;
use App\Models\PersonneMorale;
use App\Models\ClientMoraleOperation;
use App\Models\ClientPhysiqueOperation;
class AcceuilController extends Controller
{
    public function acceuil(){
        // Récupérer le nombre total de clients
        $totalClients = PersonnePhysique::count() + PersonneMorale::count();

        // Récupérer le nombre de clients physiques
        $physicalClients = PersonnePhysique::count();

        // Récupérer le nombre de clients moraux
        $legalClients = PersonneMorale::count();

        // Récupérer la date de la dernière mise à jour (à remplacer par la vraie logique)
        $lastUpdateDate = '15/10/2023';

        $personnesPhysiques = PersonnePhysique::all();
        $personnesMorales = PersonneMorale::all();
        $operationMorale = ClientMoraleOperation::all();
        $operationPhysique = ClientPhysiqueOperation::all();
        // Passer les données à la vue
        return view('dashboard.acceuil', compact('totalClients', 'physicalClients', 'legalClients', 'lastUpdateDate','personnesPhysiques', 'personnesMorales','operationMorale','operationPhysique'));
    }

}

