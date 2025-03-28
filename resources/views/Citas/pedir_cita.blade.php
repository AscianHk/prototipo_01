
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedir Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        .bg-custom {
            background-image: url('/FONDOAYUNTAMIENTO.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        @media (max-width: 640px) {
            .bg-custom {
                background-image: url('/FONDOAYUNTAMIENTO_Movil.jpg');
            }
        }

        
    </style>
</head>
@php
    $i = 1;
@endphp         
<body class="min-h-screen bg-custom">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/80 backdrop-blur-sm p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Solicitar Cita</h2>
            
            <form method="POST" action="/pedir_cita" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="centro" class="block text-sm font-medium text-gray-700">Centro</label>
                    <select name="centro_id" id="centro" class="form-select">
                        @foreach ($citas as $cita)
                            <option value="{{$i}}">{{$cita->Centro}}</option>  
                            @php
                                $i++;
                            @endphp  
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                    <input type="date" 
                           name="fecha" 
                           id="fecha" 
                           class="form-input"
                           required>
                </div>

                <div class="space-y-2">
                    <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                    <input type="time" 
                           name="hora" 
                           id="hora" 
                           class="form-input"
                           required>
                </div>

                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300">
                    Solicitar Cita
                </button>
                
            </form>
        </div>
    </div>


    <div class="fixed top-4 left-4">
        <a href="/" class="bg-white/80 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg hover:bg-white/90 transition duration-300">
            ← Volver
        </a>
    </div>
</body>
</html>