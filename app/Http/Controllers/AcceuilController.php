<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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

        // Récupérer la dernière date de mise à jour des clients physiques
        $lastUpdateDateP = PersonnePhysique::latest()->value('updated_at');

        // Formater la date si nécessaire
        $lastUpdateDateP = Carbon::parse($lastUpdateDateP)->format('d/m/Y');


        // Récupérer la dernière date de mise à jour des clients physiques
        $lastUpdateDateM = PersonneMorale::latest()->value('updated_at');

        // Formater la date si nécessaire
        $lastUpdateDateM = Carbon::parse($lastUpdateDateM)->format('d/m/Y');
                // Créer des instances de Carbon pour chaque date
        $carbonDateP = Carbon::parse($lastUpdateDateP);
        $carbonDateM = Carbon::parse($lastUpdateDateM);

        // Utiliser la méthode max() sur ces instances
        $lastUpdate = $carbonDateP->max($carbonDateM);
        $lastUpdate = Carbon::parse($lastUpdate)->format('d/m/Y');
        $personnesPhysiques = PersonnePhysique::all();
        $personnesMorales = PersonneMorale::all();
        $operationMorale = ClientMoraleOperation::all();
        $operationPhysique = ClientPhysiqueOperation::all();
        // Passer les données à la vue
        return view('dashboard.acceuil', compact('totalClients', 'physicalClients', 'legalClients','lastUpdate', 'lastUpdateDateP','lastUpdateDateM','personnesPhysiques', 'personnesMorales','operationMorale','operationPhysique'));
    }

}

