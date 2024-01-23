<svg xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 bg-blue-500 text-white  ">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
</svg>

<div id="edit{{ $user->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
            <form class="p-4 md:p-5">
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
                    <button type="button" class=" bg-[#53ABDC] text-white py-3 mr-2 rounded-lg">Annuler</button>
                    <button type="submit" class=" bg-[#DCB253] text-white py-3 rounded-lg">Enrégistrer</button>
                </div>



            </form>
        </div>
    </div>
</div>
