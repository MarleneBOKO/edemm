<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
         <div class="min-w-screen min-h-screen bg-white flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500  shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
              <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                     <div class="text-center mb-5">
                        <img src="{{ asset('images/LOGO-ONL 1 (1).png') }}" alt="">
                    </div>
                    <div class="text-center mb-5">
                        <h1 class="font-bold text-3xl text-gray-900 mr-20">Bienvenue !</h1>
                    </div>
                    <div class="ml-20">

                        <div class="flex -mx-3">
                            <div class="w- px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1" :value="__('Email')">E-mail</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="email" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="E-mail" name="email" :value="old('email')" required autofocus autocomplete="username">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w- px-3  mb-5">
                                <label for="" class="text-xs font-semibold px-1" :value="__('Password')">Mot de passe</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-[#DCB253] text-lg"></i></div>
                                    <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2  border-2 border-gray-200 outline-none focus:border-[#DCB253]" placeholder="************"  name="password"
                                    required autocomplete="current-password" >
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-start mr-9">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 mr text-sm">
                                  <label for="remember" class="text-black dark:text-black">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button class="block w-full max-w-xs mx-auto bg-[#DCB253] hover:bg-[#DCB253] focus:bg-[#DCB253] text-white rounded-lg px-3 py-3 font-semibold">S'INSCRIRE</button>
                            </div>
                        </div>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous n'avez pas de compte? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Créer</a>
                        </p>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/image-signature-du-contrat_907293-1142 1 (1).png') }}" alt="" class="w-[500px] h-[700px] object-cover">
                    <p class="absolute bottom-0 left-0 right-0 flex items-center justify-center text-white text-opacity-50 py-2">Copyright © 2023 Tous les droits réservés.</p>
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


</body>
</html>
