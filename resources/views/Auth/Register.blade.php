<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" class="input-field" placeholder="Nombre" required>
        <input type="text" name="surname" class="input-field" placeholder="Apellidos" required>
        <input type="date" name="Fecha_Nacimiento" class="input-field" required>

        <input type="text" name="SIP" class="input-field" placeholder="SIP" required>
        <input type="password" name="password" class="input-field" placeholder="Contraseña" required>

        <input type="submit" class="submit-btn" value="Registrarse">
    </form>
    
</body>
</html>