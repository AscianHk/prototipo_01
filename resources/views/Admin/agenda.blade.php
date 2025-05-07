<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
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
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Agenda</h1>
        <div class="grid grid-cols-7 gap-4">

            <div class="text-center font-semibold">Sun</div>
            <div class="text-center font-semibold">Mon</div>
            <div class="text-center font-semibold">Tue</div>
            <div class="text-center font-semibold">Wed</div>
            <div class="text-center font-semibold">Thu</div>
            <div class="text-center font-semibold">Fri</div>
            <div class="text-center font-semibold">Sat</div>


            @for ($i = 1; $i <= 30; $i++)
                <div class="p-4 bg-white rounded shadow text-center">
                    {{ $i }}
                </div>
            @endfor
        </div>
    </div>
</body>
</html>