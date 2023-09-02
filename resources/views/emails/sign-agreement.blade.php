<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        h2 {
            color: #007BFF;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dear Resident: {{ $user->name }},</h2>
        <p>Welcome to the A.Martínez Wrecker Service website! Please review and accept the parking agreement terms and conditions in order to get access to modifications to your vehicle and to register your visitors.</p>
        <p><a href="{{ $englishLink }}">Link in English</a></p>
        <br>
        <h2>Estimado Residente: {{ $user->name }},</h2>
        <p>Bienvenido al sitio web de A.Martínez Wrecker Service. Por favor revise y acepte los términos y condiciones del acuerdo de estacionamiento para obtener acceso a las modificaciones de su vehículo y registrar a sus visitantes.</p>
        <p><a href="{{ $spanishLink }}">Link in Spanish</a></p>
    </div>
</body>
</html>

