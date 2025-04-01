
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Citas</title>
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
                        <li><a href="/" class="text-gray-700 hover:text-blue-600 transition duration-300">Inicio</a></li>
                        <li><a href="/logout" class="text-gray-700 hover:text-blue-600 transition duration-300">Cerrar sesion</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-col items-center justify-center min-h-[calc(100vh-12rem)] p-4">
        <div class="bg-white/80 backdrop-blur-sm p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Mis Citas</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Día</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Centro</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($citas as $cita)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $cita->Dia }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $cita->Hora }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">   
                                {{ DB::table('centros')->where('id', $cita->centros_id)->value('Centro') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $cita->estado == 'Pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($cita->estado == 'Confirmada' ? 'bg-green-100 text-green-800' : 
                                       'bg-red-100 text-red-800') }}">
                                    {{ $cita->estado ?? 'Pendiente' }}
                                </span> --}}                                
                                HAMILTON
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white p-4 fixed bottom-0 w-full">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-xl font-bold">FOOTER</h1>
        </div>
    </footer>
</body>
</html>