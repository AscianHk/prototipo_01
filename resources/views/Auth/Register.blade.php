<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        .bg-custom {
            background-image: url('/FONDOAYUNTAMIENTO.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen bg-custom">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/80 backdrop-blur-sm p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registro</h2>
            
            <form action="/register" method="POST" class="space-y-4">
                @csrf
                
                <div class="space-y-2">
                    <input 
                        type="text" 
                        name="SIP" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="SIP" 
                        required
                        autofocus
                    >
                </div>

                <div class="space-y-2">
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Contraseña" 
                        required
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300"
                >
                    Registrarse
                </button>
            </form>
        </div>
    </div>
</body>
</html>