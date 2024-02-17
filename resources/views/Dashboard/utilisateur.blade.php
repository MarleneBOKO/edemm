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
                <span>Utilisateurs</span>
            </div>
            <div class="relative mt-4 ml-6 m-4">
                <form action="{{ route('dashboard.utilisateur') }}" method="GET" class="flex relative">
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
        <h3>Liste des utilisateurs</h3>
<!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-[#DCB253] h-11 rounded-md flex items-center px-4"  type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Nouveau profil
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ajout d'un profil
                        </h3>
                        <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only"> Close</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                        <form action="{{ route('create.profil') }}" method="POST" class="p-4 md:p-5" id="formulaire">
                            @csrf
                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mt-2" for="Name">Nom d'utilisateur</label>
                            <input type="text" placeholder="Nom d'utilisateur" id="projectName" class="w-full px-3 py-2 border rounded-lg " name="username" required/>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mt-2" for="Description">Email</label>
                            <input type="text" placeholder="Email" id="projectDescription" class="w-full px-3 py-2 border rounded-lg" name="email" required/>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mt-2" for="type">Type d'utilisateur</label>
                            <select  name="user_type" id="typerole" class="w-full px-3 py-2 border rounded-lg">
                                <option value="Admin">Admin</option>
                                <option value="Simple">Simple</option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mt-2" for="pass">Mot de passe</label>
                            <input type="password"  name="password" placeholder="Mot de passe" id="pass" class="w-full px-3 py-2 border rounded-lg" required/>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mt-2" for="projectTags">Confirmation</label>
                            <input type="password" name="password_confirmation" placeholder="Confirmation password" id="tags" class="w-full px-3 py-2 border rounded-lg" required/>

                        </div>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded  focus:ring-3 focus:ring-primary-300 dark:bg-black dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-black dark:text-black">J'accepte toutes les conditions générales </label>
                            </div>
                        </div>

                        <div class=" flex flex-row ml-64">
                            <button type="button" class=" bg-[#53ABDC] text-white py-3 mr-2 rounded-lg" onclick="resetForm()">Annuler</button>
                            <button type="submit" class=" bg-[#DCB253] text-white py-3 rounded-lg">Enrégistrer</button>
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
                    <th class="p-2">Nom d'utilisateur </th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody class="space-y-4">
                @foreach($users as $user)
                    <tr class="space-y-4 border-b border-[#7D7272] border-opacity-40">
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_type }}</td>
                        <td>
                            <div class="flex items-center justify-center gap-1">
                                <a href="#" data-modal-target="crud-modale-{{ $user->id }}" data-modal-toggle="crud-modale-{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-blue-500 text-white  ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>

                                    <div id="crud-modale-{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" onclick="event.stopPropagation();">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Modification d'un profil
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modale-{{ $user->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form class="p-4 md:p-5" action="{{ route('update.user', ['id' => $user->id]) }}" method="POST" onclick="event.stopPropagation();" id="formulaire">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-4">
                                                        <label class="block text-sm text-gray-600 mt-2" for="projectName">Nom d'utilisateur</label>
                                                        <input type="text" value="{{ $user->username }}" id="projectName" class="w-full px-3 py-2 border rounded-lg " name="username" required/>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="block text-sm text-gray-600 mt-2" for="projectDescription">Email</label>
                                                        <input type="text" value="{{ $user->email }}" id="projectDescription" class="w-full px-3 py-2 border rounded-lg" name="email" required/>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="block text-sm text-gray-600 mt-2" for="type">Type d'utilisateur</label>
                                                        <select  name="user_type" id="type" value="{{ $user->user_type }}" class="w-full px-3 py-2 border rounded-lg " >
                                                            <option value="avatar">Admin</option>
                                                            <option value="avatar">Simple</option>

                                                        </select>
                                                    </div>

                                                    <div class="flex items-start mb-5">
                                                        <div class="flex items-center h-5">
                                                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded  focus:ring-3 focus:ring-primary-300 dark:bg-black dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="terms" class="font-light text-black dark:text-black">J'accepte toutes les conditions générales </label>
                                                        </div>
                                                    </div>

                                                    <div class=" flex flex-row ml-64">
                                                        <button type="button" class=" bg-[#53ABDC] text-white py-3 mr-2 rounded-lg" data-modal-toggle="crud-modale-{{ $user->id }}">Annuler</button>
                                                        <button type="submit" class=" bg-[#DCB253] text-white py-3 rounded-lg">Enrégistrer</button>
                                                    </div>



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
                                </a>

                                <a href="#" data-modal-target="popup-modal-{{ $user->id }}" data-modal-toggle="popup-modal-{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-red-500 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                    <div id="popup-modal-{{ $user->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Suppression d'un profil
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal('popup-modal-{{ $user->id }}')">
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

                                                    <form action="{{ route('delete.user', ['id' => $user->id]) }}" method="POST" onclick="event.stopPropagation();">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="button" class="text-white bg-[#53ABDC] hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2" onclick="closeModal('popup-modal-{{ $user->id }}')">
                                                            Annuler
                                                        </button>
                                                        <button type="submit" class="text-gray-500 bg-[#DCB253] hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            Oui, je suis sûr
                                                        </button>
                                                    </form>

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
            @if ($users->previousPageUrl())
                <a href="{{ $users->previousPageUrl() }}" class="h-11 flex items-center px-4">Previous</a>
            @else
                <button class="h-11 flex items-center px-4" disabled>Previous</button>
            @endif
        </div>

        <div class="flex space-x-2">
            @for ($i = 1; $i <= $users->lastPage(); $i++)
                <div class="border-l h-14 mx-2 border-[#7D7272] opacity-20"></div>
                <div class="relative px-1 py-1">
                    <!-- Bouton de numéro de page -->
                    <button class="h-11 rounded-md flex items-center {{ $users->currentPage() == $i ? 'bg-gray-500 text-white' : '' }}">
                        {{ $i }}
                    </button>
                </div>
            @endfor
        </div>

        <div class="border-l h-14 mx-2 border-[#7D7272] opacity-20"></div>

        <div class="relative px-2 py-1 ml-2">
            <!-- Bouton "Suivant" -->
            @if ($users->nextPageUrl())
                <a href="{{ $users->nextPageUrl() }}" class="h-11 rounded-md flex items-center">Next</a>
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

    function resetForm() {
        // Récupérer tous les éléments du formulaire
        var formElements = document.getElementById("formulaire").elements;

        // Parcourir tous les éléments du formulaire
        for (var i = 0; i < formElements.length; i++) {
            var element = formElements[i];

            // Réinitialiser la valeur de chaque élément du formulaire
            if (element.type !== "submit") {
                element.value = "";
            }
        }
    }
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        }
    }
</script>



@endsection
