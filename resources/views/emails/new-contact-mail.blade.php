<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ciao admin!</h1>
    <p>
            Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
            Nome: {{ $lead->name }}<br>
            Email: {{ $lead->email }}<br>
            Messaggio:<br>
            {{ $lead->message }}
    </p>
    
</body>
</html>
