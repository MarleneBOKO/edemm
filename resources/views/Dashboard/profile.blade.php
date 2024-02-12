@extends('welcome')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h1 class="text-xl font-bold mb-2">Profil de {{ $user->username }}</h1>
                <p class="text-gray-700 mb-4">Email: {{ $user->email }}</p>
                <!-- Autres informations de profil à afficher -->
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center gap-1">
        <a href="#" data-modal-target="crud-modale-{{ $user->id }}" data-modal-toggle="crud-modale-{{ $user->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-blue-500 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
        </a>

        <a href="#" data-modal-target="popup-modal-{{ $user->id }}" data-modal-toggle="popup-modal-{{ $user->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-red-500 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </a>
    </div>

    <div id="crud-modale-{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" onclick="event.stopPropagation();">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Modification d'un profil
                    </h3>
                    <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modale">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('update.user', ['id' => $user->id]) }}" method="POST" onclick="event.stopPropagation();">
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
                        <button type="button" class=" bg-[#53ABDC] text-white py-3 mr-2 rounded-lg" onclick="window.history.back(); ">Annuler</button>
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

    <div id="popup-modal-{{ $user->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Suppression d'un profil
                    </h3>
                    <button type="button" class="text-gray-400 bg-[#EF2549] hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes-vous sûr de supprimer cet utilisateur ?</h3>

                    <form action="{{ route('delete.user', ['id' => $user->id]) }}" method="POST" onclick="event.stopPropagation();">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="text-white bg-[#53ABDC] hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2" data-modal-hide="popup-modal-{{ $user->id }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalToggles = document.querySelectorAll('[data-modal-toggle]');
            const modalHides = document.querySelectorAll('[data-modal-hide]');

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
