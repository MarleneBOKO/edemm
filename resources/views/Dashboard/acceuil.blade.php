@extends('welcome')



@section('content')
<!-- Partie droite -->
<div class="flex flex-col bg-[#F2EDF3] w-full h-full m-4">
    <div class="flex flex-row mt-4 ml-6">
        <svg class="w-6 h-6" viewBox="0 0 27 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.7931 6.33001C13.7146 6.24099 13.6101 6.19131 13.5015 6.19131C13.3928 6.19131 13.2884 6.24099 13.2099 6.33001L3.50146 17.3219C3.46023 17.3686 3.42743 17.4248 3.40504 17.487C3.38266 17.5492 3.37115 17.6161 3.37121 17.6838L3.36963 28C3.36963 28.5304 3.54742 29.0391 3.86389 29.4142C4.18035 29.7893 4.60958 30 5.05713 30H10.1249C10.3487 30 10.5633 29.8947 10.7215 29.7071C10.8798 29.5196 10.9687 29.2652 10.9687 29V20.5C10.9687 20.3674 11.0131 20.2402 11.0922 20.1465C11.1713 20.0527 11.2786 20 11.3905 20H15.6093C15.7212 20 15.8285 20.0527 15.9076 20.1465C15.9867 20.2402 16.0312 20.3674 16.0312 20.5V29C16.0312 29.2652 16.12 29.5196 16.2783 29.7071C16.4365 29.8947 16.6511 30 16.8749 30H21.9406C22.3881 30 22.8173 29.7893 23.1338 29.4142C23.4503 29.0391 23.6281 28.5304 23.6281 28V17.6838C23.6281 17.6161 23.6166 17.5492 23.5942 17.487C23.5718 17.4248 23.539 17.3686 23.4978 17.3219L13.7931 6.33001Z" fill="#ACABA3"/>
            <path d="M25.8879 15.2594L21.9433 10.7869V4C21.9433 3.73478 21.8544 3.48043 21.6962 3.29289C21.538 3.10536 21.3233 3 21.0996 3H18.5683C18.3445 3 18.1299 3.10536 17.9717 3.29289C17.8135 3.48043 17.7246 3.73478 17.7246 4V6L14.6702 2.53875C14.3844 2.19625 13.9593 2 13.5 2C13.0423 2 12.6183 2.19625 12.3325 2.53938L1.11588 15.2581C0.787872 15.6331 0.746739 16.25 1.04522 16.6562C1.12017 16.7588 1.21194 16.8422 1.31495 16.9014C1.41796 16.9605 1.53005 16.9942 1.6444 17.0004C1.75876 17.0066 1.87298 16.9852 1.98011 16.9374C2.08725 16.8896 2.18506 16.8165 2.2676 16.7225L13.21 4.33C13.2885 4.24099 13.393 4.19131 13.5016 4.19131C13.6103 4.19131 13.7147 4.24099 13.7932 4.33L24.7367 16.7225C24.8979 16.9057 25.1138 17.0057 25.3371 17.0006C25.5604 16.9954 25.7729 16.8855 25.9279 16.695C26.2517 16.2975 26.2248 15.6412 25.8879 15.2594Z" fill="#ACABA3"/>
        </svg>

        <span>Tableau de bord</span>
    </div>
    <div class="flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/3 h-36 shadow-md rounded-lg flex flex-col mt-2 mb-2 ml-4 mr-4 justify-center items-center text-white bg-gradient-to-br from-[#FFB496] opacity-70 to-[#FE8796] relative">
            <div class="flex flex-col">
                <span>Client Total</span>
                <span>{{ $totalClients }}</span>
                <p class="ml-4 relative">Mise à jour depuis le</p>
                <span class=" mx-auto">{{ $lastUpdateDate }}</span>

            </div>
        </div>


        <div class="w-full sm:w-1/3 h-36 shadow-md rounded-lg flex flex-col mt-2 mb-2 ml-4 mr-4 justify-center items-center text-white bg-gradient-to-br from-[#7ABFF5] opacity-70 to-[#3096E7]">
            <div class="flex flex-col">
                <span>Client Physique</span>
                <span>{{ $physicalClients }}</span>
                <p class="ml-4 relative">Mise à jour depuis le</p>
                <span class=" mx-auto">{{ $lastUpdateDate }}</span>

            </div>

        </div>
        <div class="w-full sm:w-1/3 h-36 shadow-md rounded-lg flex flex-col mt-2 mb-2 ml-4 mr-4 justify-center items-center text-white bg-gradient-to-br from-[#72D4CA] opacity-70 to-[#2AC2AC]">
            <div class="flex flex-col">
                <span>Client Moral</span>
                <span>{{ $legalClients }}</span>
                <p class="ml-4 relative">Mise à jour depuis le</p>
                <span class=" mx-auto">{{ $lastUpdateDate }}</span>

            </div>
        </div>

</div>

<h3 class="mt-4 ml-8 font-bold">Activités récentes</h3>
<div class="flex flex-row mt-4 ml-6 m-4">
    <div class="bg-white p-4 w-full md:w-1/2 mb-4 md:mb-0 mr-2">
        <h4 class="text-black mb-4 font-bold text-[17px]">Personne Physique</h4>
        <table class="table-auto w-full h-auto mb-4">
            <thead>
                <tr>
                    <th class="p-2">Prénom & Nom</th>
                    <th class="p-2">Nature de l'aff...</th>
                    <th class="p-2">Date de l'oprat...</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($operationPhysique as $operation)
                    @foreach ($personnesPhysiques as $personne)
                        @if ( $operation->personne_physique_id === $personne->id )
                            <tr>
                                <td class="border-b  py-2 border-black">{{ $personne->name }} {{ $personne->prenom }}</td>
                                <td class="border-b  py-2 border-black">{{ $operation->nature }}</td>
                                <td class="border-b  py-2 border-black">{{ $operation->date_operation }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-4 w-full md:w-1/2 ml-2">
        <h4 class="text-black mb-4 font-bold text-[17px]">Personne Morale</h4>
        <table class="table-auto w-full h-auto mb-4">
            <thead>
                <tr>
                    <th class="p-2  ">Dénomination</th>
                    <th class="p-2">Nature de l'aff...</th>
                    <th class="p-2">Date de l'opér...</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($operationMorale as $operation)
                @foreach ($personnesMorales as $personne)
                    @if ( $operation->personne_morale_id === $personne->id )
                        <tr>
                            <td class="border-b  py-2 border-black">{{ $personne->denomination }}</td>
                            <td class="border-b  py-2 border-black">{{ $operation->nature }}</td>
                            <td class="border-b  py-2 border-black">{{ $operation->date_operation }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<p class=" mt-4 ml-6  text-black">Copyright © 2023 Tous les droits réservés.</p>

</div>


</div>


</div>

@endsection
