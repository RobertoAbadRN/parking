<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            color: #ff0000;
        }
        p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Towing Notice</h1>
        <p>A suspended permit has been detected for the vehicle with license plate: {{ $licensePlate }}. Please take the necessary actions.</p>
    </div>

    <hr>

    <div class="container">
        <h1>Aviso de Remolque</h1>
        <p>Se ha detectado un permiso suspendido para el vehículo con placa: {{ $licensePlate }}. Por favor, tome las medidas necesarias.</p>
    </div>
</body>
</html>
