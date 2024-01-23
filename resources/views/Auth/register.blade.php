<form method="POST" action="{{ route('register') }}">
    @csrf
   <div>
        <div class=" bg-gray-900 min-w-screen min-h-screen flex items-center justify-center px-5 py-5 ">
        <div class="bg-gray-100  text-gray-500 w-full shadow-xl overflow-hidden h-[702px]" style="max-width:1000px">
            <div class="md:flex w-full">
              <div class=" w-full md:w-1/2 py-10 px-5 md:px-10">
                     <div class="text-center mb-5">
                        <img src="{{ asset('images/LOGO-ONL 1 (1).png') }}" alt="Example Image">

                    </div>
                    <div class="text-center mb-6">
                        <h1 class="font-bold text-3xl text-gray-900">Etes vous nouveau ?</h1>
                        <p class="mr-10">Rejoignez-nous dès maintenant!</p>
                    </div>
                    <div class="ml-16">
                        <div class="flex -mx-3">
                            <div class="w-1/ px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Nom d'utilisateur</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="Nom d'utilisateur" name="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                            </div>

                        </div>
                        <div class="flex -mx-3">
                            <div class="w- px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">E-mail</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="email" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="E-mail" name="email" :value="old('email')" required autocomplete="username">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w- px-3  mb-5">
                                <label for="" class="text-xs font-semibold px-1">Mot de passe</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="************" name="password"
                                    required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                         <div class="flex -mx-3">
                            <div class="w- px-3  mb-5">
                                <label for="" class="text-xs font-semibold px-1">Confirmer votre mot de passe</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="************"  type="password"
                                    name="password_confirmation" required autocomplete="new-password" >
                                </div>
                            </div>
                        </div>
                        <div class="flex items-start mb-5">
                          <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-black focus:ring-3 focus:ring-primary-300 dark:bg-black dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-black dark:text-black">J'accepte toutes les conditions générales </label>
                          </div>
                      </div>
                        <div class="flex ">
                            <div class="w-full px-3 mb-5 mr-20">
                                <button class="block w-full max-w-xs mx-auto bg-[#DCB253] hover:bg-[#DCB253] focus:bg-[#DCB253] text-white rounded-lg px-3 py-3 font-semibold">S'INSCRIRE</button>
                            </div>
                        </div>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                          Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                      </p>
                    </div>
                </div>
                <div class="relative">

                    <img src="{{ asset('images/image-signature-du-contrat_907293-1142 1 (1).png') }}" alt="" class="w-[500px] h-[800px] object-cover">
                    <p class="absolute inset-0   ml-36 flex items-center mt-[550px] text-white text-opacity-50">Copyright © 2023 Tous les droits réservés.</p>
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

            </div>
        </div>
    </div>
    </div>


</form>

