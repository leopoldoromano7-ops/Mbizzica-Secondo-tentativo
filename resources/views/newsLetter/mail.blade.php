<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Benvenuto!</title>
</head>
<body>
    <h1>Hey {{ $username }}!</h1>

    <p>Benvenuto nella nostra newsletter.</p>
    <p>Siamo felici di averti con noi! 🎉</p>

    <hr>

    <p>Se vuoi, puoi rispondere a questa mail o scriverci per qualsiasi domanda.</p>

    <p><strong>Il tuo indirizzo email con cui ti sei iscritt:</strong> {{ $email }}</p>
</body>
</html>
