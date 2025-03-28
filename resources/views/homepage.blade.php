<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @php
        $id = Auth::id();
        $credentials = DB::table('credentials')->where('user_id', $id)->first();    
    @endphp
 
    <style>
        @media (min-width: 640px) {
            .bg-custom {
            background-image: url('/FONDOAYUNTAMIENTO.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        }
        @media (max-width: 640px) {
            .bg-custom {
            background-image: url('/FONDOAYUNTAMIENTO_Movil.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        }
        
    </style>
</head>
<body class="min-h-screen bg-custom">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="logo">
                </div>
                <div class="menu">
                    <ul class="flex space-x-8">
                        @auth
                        <li><a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Hola {{$credentials->name}}!</a></li>
                        <li><a href="/logout" class="text-gray-700 hover:text-blue-600 transition duration-300">Cerrar sesion</a></li>
                        
                        @endauth                        
                        <li><a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @guest
        <div class="flex flex-col items-center justify-center min-h-[calc(100vh-12rem)] space-y-6">
            <div class="buttons-container flex flex-col space-y-4">
                <div class="login">
                    <a href="/login" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 text-center w-64">
                        Login
                    </a>
                </div>
                <div class="first_login">
                    <a href="/firstlogin" class="inline-block px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition duration-300 text-center w-64">
                        Es mi primera vez
                    </a>
                </div>
            </div>      
        </div>
    @endguest
    @auth
    <div class="flex flex-col items-center justify-center min-h-[calc(100vh-12rem)] space-y-6">
        <div class="buttons-container flex flex-col space-y-4">
            <div class="login">
                <a href="/pedir_cita" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 text-center w-64">
                    Realizar cita
                </a>
            </div>
            <div class="ver_citas">
                <a href="/ver_citas" class="inline-block px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition duration-300 text-center w-64">
                    Ver Citas
                </a>
            </div>
        </div>      
    </div>
        
    @endauth
    <footer class="bg-gray-800 text-white p-4 fixed bottom-0 w-full">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-xl font-bold">FOOTER</h1>
        </div>
    </footer>
</body>
</html>