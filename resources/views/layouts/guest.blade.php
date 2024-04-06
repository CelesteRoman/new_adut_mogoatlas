<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Iniciar sesion ADUT </title>

        <!-- Fonts {{ config('app.name', 'Registrarse') }} -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Styles -->
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts -->
    </head>
    <body class="font-sans text-gray-900 antialiased">
   <!-- min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-50 dark:bg-gray-100-->
     <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-8 sm:pt-0 bg-blue-700 dark:bg-blue-700 ">
            <div>
               <!-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />

                    // imagen  RUTA
                      class="h-32 w-32 max-w-ful   
                </a> -->
               
                <img src="images/logo.jpeg"
                class="w-full sm:max-w-md mt-4 px-4 py-2 sm:pt-0  "
                 alt="No" />
                  </div>
                  

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div> <!--  <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mb-4">
  <img
    src="../public/images/amarillo_img.jpeg"
    class="h-auto max-w-full rounded-full"
    alt="No" />
</div>
                </div>-->
        </div>
    </body>
</html>
