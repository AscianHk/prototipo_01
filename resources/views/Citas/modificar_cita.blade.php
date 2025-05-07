<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $cita[0]->dia }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $cita[0]->hora }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">   
                    {{ DB::table('centros')->where('id', $cita[0]->centros_id)->value('Centro') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">                          
                    {{$cita[0]->estado}}
                </td>
            </tr>
        </tbody>
    </table>

    <form action="{{ url('/modificar_cita/' . $cita[0]->id) }}" method="POST" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="dia" class="block text-sm font-medium text-gray-700">Día</label>
                <input type="date" name="dia" id="dia" value="{{ $cita[0]->dia }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                <input type="time" name="hora" id="hora" value="{{ $cita[0]->hora }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="centro" class="block text-sm font-medium text-gray-700">Centro</label>
                <select name="centro_id" id="centro" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach(DB::table('centros')->get() as $centro)
                        <option value="{{ $centro->id }}" {{ $centro->id == $cita[0]->centros_id ? 'selected' : '' }}>
                            {{ $centro->Centro }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado" id="estado" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Pendiente" {{ $cita[0]->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En curso" {{ $cita[0]->estado == 'En Curso' ? 'selected' : '' }}>En curso</option>
                    <option value="Cancelado" {{ $cita[0]->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full md:w-auto bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Modificar Cita
            </button>
        </div>
    </form>
    
</body>
</html>