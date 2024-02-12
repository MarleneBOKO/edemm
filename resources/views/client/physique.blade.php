@extends('welcome')

@section('content')


        <!-- Partie droite -->

        <div class="flex flex-col bg-[#F2EDF3] w-full h-full m-4">
            <div class="flex flex-row mt-4 ml-6">
                <svg class="w-6 h-6" viewBox="0 0 27 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_306_142)">
                    <path d="M15 2.66667C16.2361 2.66667 17.4445 3.05766 18.4723 3.79021C19.5001 4.52275 20.3012 5.56394 20.7742 6.78211C21.2473 8.00029 21.3711 9.34073 21.1299 10.6339C20.8888 11.9271 20.2935 13.115 19.4194 14.0474C18.5453 14.9797 17.4317 15.6147 16.2193 15.8719C15.0069 16.1291 13.7503 15.9971 12.6082 15.4925C11.4662 14.988 10.4901 14.1335 9.80331 13.0371C9.11656 11.9408 8.75 10.6519 8.75 9.33334L8.75625 9.044C8.82615 7.32767 9.51451 5.70638 10.6778 4.51822C11.841 3.33006 13.3894 2.66677 15 2.66667ZM17.5 18.6667C19.1576 18.6667 20.7473 19.369 21.9194 20.6193C23.0915 21.8695 23.75 23.5652 23.75 25.3333V26.6667C23.75 27.3739 23.4866 28.0522 23.0178 28.5523C22.5489 29.0524 21.913 29.3333 21.25 29.3333H8.75C8.08696 29.3333 7.45107 29.0524 6.98223 28.5523C6.51339 28.0522 6.25 27.3739 6.25 26.6667V25.3333C6.25 23.5652 6.90848 21.8695 8.08058 20.6193C9.25269 19.369 10.8424 18.6667 12.5 18.6667H17.5Z" fill="#ACABA3"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_306_142">
                    <rect width="27" height="32" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <span>Client physique</span>
            </div>
            <div class="relative mt-4 ml-6 m-4">
                <form action="{{ route('client.physique') }}" method="GET" class="flex relative">
                    <input type="text" name="query" placeholder="Rechercher un utilisateur..." class="bg-white px-8 py-1 rounded-md shadow-md w-full h-20">
                    <!-- Icône de recherche dans le champ de recherche -->
                    <button type="submit" class="bg-[#53ABDC] absolute top-1/2 transform -translate-y-1/2 right-4 px-4 h-11 text-white font-semibold rounded-md">
                        <!-- Icône de loupe -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2"></path>
                            <circle cx="10" cy="10" r="8"></circle>
                        </svg>

                        Rechercher
                    </button>
                </form>
            </div>

    <div class="flex items-center justify-between mt-4 ml-6 m-4">
        <h3>Liste des personnes physique</h3>
    <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-[#DCB253] h-11 rounded-md flex items-center px-4"  type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Personne physique
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ajout d'une personne physique
                        </h3>
                        <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                        <form action="{{ route('client.physique.store') }}" method="POST" class="p-4 md:p-5">
                            @csrf
                                <div class="flex flex-row space-x-4">
                                    <div class="">
                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="Name">Nom</label>
                                            <input type="text" placeholder="Nom" id="projectName" class="w-full px-3 py-2 border rounded-lg " name="name" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="Date_lieu">Date et lieu de naissance</label>
                                            <input type="text" placeholder="Date et lieu de naissance" id="date_naiss" class="w-full px-3 py-2 border rounded-lg" name="date_lieu" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="Nationnalite">Nationnalité</label>
                                            <input type="text" placeholder="Nationnalité" id="nation" class="w-full px-3 py-2 border rounded-lg" name="nation" required/>
                                        </div>


                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="adp">Adresse professionnelle</label>
                                            <input type="text"  name="adres_pro" placeholder="Adersse professionnelle" id="ad_pro" class="w-full px-3 py-2 border rounded-lg" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="adr">Adresse de référence</label>
                                            <input type="text" name="adres_ref" placeholder="Adresse de référence" id="ad_ref" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="telp">Téléphone portable</label>
                                            <input type="number" name="tel" placeholder="Téléphone portable" id="tel_po" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="Np">N° de la pièce</label>
                                            <input type="number" name="np" placeholder="N° de la pièce" id="nump" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="id_aut">Identité de l'autorité ayant délivée</label>
                                            <input type="text" name="ident" placeholder="Identité de l'autorité ayant délivée" id="delivre" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>

                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="pre">Prénom</label>
                                            <input type="text" placeholder="Prénom" id="sec_name" class="w-full px-3 py-2 border rounded-lg " name="prenom" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="mat">Situation matrimonialle</label>
                                            <input type="text" placeholder="Nom et Prénom du conjoint(e)" id="sit" class="w-full px-3 py-2 border rounded-lg" name="sit_mat" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="pro">Profession</label>
                                            <input type="text" placeholder="Profession" id="prof" class="w-full px-3 py-2 border rounded-lg" name="profession" required/>
                                        </div>


                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="dom">Adresse de domicile</label>
                                            <input type="text"  name="adres_dom" placeholder="Adresse de domicile" id="adr" class="w-full px-3 py-2 border rounded-lg" required/>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="fixe">Téléphone fixe</label>
                                            <input type="number" name="tel_fixe" placeholder="Téléphone fixe" id="t_f" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="piece">Pièce d'indentité présentée</label>
                                            <input type="text" name="piece_presente" placeholder="Pièce d'indentité présentée" id="pie_pre" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-sm text-gray-600 mt-2" for="del">Date et lieu de délivrance</label>
                                            <input type="text" name="date_lieu_piece" placeholder="Date et lieu de délivrance" id="date_lieu" class="w-full px-3 py-2 border rounded-lg" required/>

                                        </div>

                                    </div>

                                </div>

                                <div class="flex flex-row ml-64">
                                    <button type="button" class="bg-[#53ABDC] text-white py-4 mr-2 rounded-lg" onclick="window.history.back();" >Annuler</button>
                                    <button type="submit" class="bg-[#DCB253] text-white py-4 rounded-lg">Enrégistrer</button>
                                </div>


                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <ul class="mt-3 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    </form>
                </div>
            </div>
        </div>

  </div>

    </div>




            </div>
        </div>
    </div>
            </div>
        </div>


    </div>
</div>
</div>
    </div>
</div>

<div class="flex justify-center items-center">
    <div class="bg-white p-4 w-full md:w-1/2 md:mb-0">
        <table class="table-auto w-full h-auto mb-4">
            <thead>
                <tr class="border-b border-[#7D7272] border-opacity-40">
                    <th class="p-2">Prénom & Nom</th>
                    <th class="p-2">Date & lieu de n...</th>
                    <th class="p-2">Situation mat..</th>
                    <th class="p-2">Nationnalité</th>
                    <th class="p-2">Action</th>

                </tr>
            </thead>
            @foreach ($personnesPhysiques as $personnePhysique)
            <tbody class="space-y-4">

                        <tr class="space-y-4 border-b border-[#7D7272] border-opacity-40">
                            <td>{{ $personnePhysique->prenom }} {{ $personnePhysique->nom }}</td>
                            <td>{{ $personnePhysique->date_lieu }}</td>
                            <td>{{ $personnePhysique->sit_mat }}</td>
                            <td>{{ $personnePhysique->nation }}</td>

                            <td>
                                <div class="flex items-center justify-center gap-1">
                                    <a href="#" data-modal-target="crud-modale-{{ $personnePhysique->id }}" data-modal-toggle="crud-modale-{{ $personnePhysique->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-blue-500 text-white  ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>

                                        <div id="crud-modale-{{ $personnePhysique->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" onclick="event.stopPropagation();">
                                            <div class="relative p-4 w-full max-w-md max-h-full" onclick="event.stopPropagation();">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" onclick="event.stopPropagation();">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Modification des informations d'une personnes physique
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modale">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form action="{{ route('client.physique.update', ['id' => $personnePhysique->id]) }}" method="POST" class="p-4 md:p-5" onclick="event.stopPropagation();">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="flex flex-row space-x-4">
                                                                <div class="">
                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="Name">Nom</label>
                                                                        <input type="text" placeholder="Nom" id="projectName" class="w-full px-3 py-2 border rounded-lg " name="name" value="{{ $personnePhysique->name }}" required onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="Date_lieu">Date et lieu de naissance</label>
                                                                        <input type="text" placeholder="Date et lieu de naissance" id="date_naiss" class="w-full px-3 py-2 border rounded-lg" name="date_lieu" value="{{ $personnePhysique->date_lieu }}" required onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="Nationnalite">Nationnalité</label>
                                                                        <input type="text" placeholder="Nationnalité" id="nation" class="w-full px-3 py-2 border rounded-lg" name="nation" value="{{ $personnePhysique->nation }}" required onclick="event.stopPropagation();"/>
                                                                    </div>


                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="adp">Adresse professionnelle</label>
                                                                        <input type="text" value="{{ $personnePhysique->adres_pro }}" name="adres_pro" placeholder="Adersse professionnelle" id="ad_pro" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="adr">Adresse de référence</label>
                                                                        <input type="text" value="{{ $personnePhysique->adres_ref }}" name="adres_ref" placeholder="Adresse de référence" id="ad_ref" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="telp">Téléphone portable</label>
                                                                        <input type="number" value="{{ $personnePhysique->tel }}" name="tel" placeholder="Téléphone portable" id="tel_po" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="Np">N° de la pièce</label>
                                                                        <input type="number" value="{{ $personnePhysique->tel }}" name="np" placeholder="N° de la pièce" id="nump" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="id_aut">Identité de l'autorité ayant délivée</label>
                                                                        <input type="text" value="{{ $personnePhysique->ident }}" name="ident" placeholder="Identité de l'autorité ayant délivée" id="delivre" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>

                                                                </div>
                                                                <div>
                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="pre">Prénom</label>
                                                                        <input type="text" placeholder="Prénom" id="sec_name" class="w-full px-3 py-2 border rounded-lg " name="prenom" required value="{{ $personnePhysique->prenom }}" onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="mat">Situation matrimonialle</label>
                                                                        <input type="text" placeholder="Nom et Prénom du conjoint(e)" id="sit" class="w-full px-3 py-2 border rounded-lg" name="sit_mat" value="{{ $personnePhysique->sit_mat }}" required onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="pro">Profession</label>
                                                                        <input type="text" placeholder="Profession" id="prof" class="w-full px-3 py-2 border rounded-lg" name="profession" required value="{{ $personnePhysique->profession }}" onclick="event.stopPropagation();"/>
                                                                    </div>


                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="dom">Adresse de domicile</label>
                                                                        <input type="text" value="{{ $personnePhysique->adres_dom }}" name="adres_dom" placeholder="Adresse de domicile" id="adr" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>
                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="fixe">Téléphone fixe</label>
                                                                        <input type="number" value="{{ $personnePhysique->tel_fixe }}" name="tel_fixe" placeholder="Téléphone fixe" id="t_f" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="piece">Pièce d'indentité présentée</label>
                                                                        <input type="text" value="{{ $personnePhysique->piece_presente}}" name="piece_presente" placeholder="Pièce d'indentité présentée" id="pie_pre" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>

                                                                    <div class="mb-4">
                                                                        <label class="block text-sm text-gray-600 mt-2" for="del">Date et lieu de délivrance</label>
                                                                        <input type="text" value="{{ $personnePhysique->date_lieu_piece }}" name="date_lieu_piece" placeholder="Date et lieu de délivrance" id="date_lieu" class="w-full px-3 py-2 border rounded-lg" required onclick="event.stopPropagation();"/>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="flex flex-row ml-64">
                                                                <button type="button" class="bg-[#53ABDC] text-white py-4 mr-2 rounded-lg" onclick="window.history.back(); ">Annuler</button>
                                                                <button type="submit" class="bg-[#DCB253] text-white py-4 rounded-lg">Enrégistrer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#"  data-modal-target="popup-modal-{{ $personnePhysique->id }}" data-modal-toggle="popup-modal-{{ $personnePhysique->id }}" onclick="event.stopPropagation();" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-red-500 text-white ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>

                                        <div id="popup-modal-{{ $personnePhysique->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Suppression d'un profil
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="popup-modal-{{ $personnePhysique->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes-vous sûr de supprimer cet utilisateur ?</h3>

                                                        <!-- Utilisez un formulaire pour la suppression -->
                                                        <form action="{{ route('client.physique.destroy', ['id' => $personnePhysique->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button data-modal-hide="popup-modal-{{ $personnePhysique->id }}" type="button" class="text-white bg-[#53ABDC] hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                Annuler
                                                            </button>
                                                            <button type="submit" class="text-gray-500 bg-[#DCB253] hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                Oui, je suis sûr
                                                            </button>
                                                        </form>
                                                        @if ($errors->any())
                                                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                                <strong class="font-bold">Oops!</strong>
                                                                <ul class="mt-3 list-disc list-inside">
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </a>


                                </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="flex items-center justify-between mt-4 ml-6 m-4">
    <div class="flex items-center bg-white rounded-lg ml-auto mr-80">
        <div class="relative px-1 py-1 mr-2">
            <!-- Bouton "Précédent" -->
            @if ($personnesPhysiques->previousPageUrl())
                <a href="{{ $personnesPhysiques->previousPageUrl() }}" class="h-11 flex items-center px-4">Previous</a>
            @else
                <button class="h-11 flex items-center px-4" disabled>Previous</button>
            @endif
        </div>

        <div class="flex space-x-2">
            @for ($i = 1; $i <= $personnesPhysiques->lastPage(); $i++)
                <div class="border-l h-14 mx-2 border-[#7D7272] opacity-20"></div>
                <div class="relative px-1 py-1">
                    <!-- Bouton de numéro de page -->
                    <button class="h-11 rounded-md flex items-center {{ $personnesPhysiques->currentPage() == $i ? 'bg-gray-500 text-white' : '' }}">
                        {{ $i }}
                    </button>
                </div>
            @endfor
        </div>

        <div class="border-l h-14 mx-2 border-[#7D7272] opacity-20"></div>

        <div class="relative px-2 py-1 ml-2">
            <!-- Bouton "Suivant" -->
            @if ($personnesPhysiques->nextPageUrl())
                <a href="{{ $personnesPhysiques->nextPageUrl() }}" class="h-11 rounded-md flex items-center">Next</a>
            @else
                <button class="h-11 rounded-md flex items-center" disabled>Next</button>
            @endif
        </div>
    </div>
</div>

</div>
    </div>

</div>

</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');

        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', function (event) {
                event.preventDefault();

                const targetId = this.getAttribute('data-modal-target');
                const modal = document.getElementById(targetId);

                if (modal) {
                    modal.classList.toggle('hidden');
                }
            });
        });

        const modalHides = document.querySelectorAll('[data-modal-hide]');

        modalHides.forEach(hide => {
            hide.addEventListener('click', function () {
                const targetId = this.getAttribute('data-modal-hide');
                const modal = document.getElementById(targetId);

                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>



@endsection

