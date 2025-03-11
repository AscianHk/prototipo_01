<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach($credentials as $credential)
        <h1>{{$credential->name}}</h1>


    
    @endforeach
    <h1>CESPED</h1>
</body>
</html>