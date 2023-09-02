<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Notice: Towing Enforcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f5f5f5;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .message {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: justify;
        }
        .contact {
            font-size: 14px;
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Official Notice: Towing Enforcement</div>
        <div class="message">
            <p>Dear Resident of <strong>{{ $resident->name }}</strong>,</p>
            <p>This is to inform you that effective <strong>August 24, 2023</strong>, towing enforcement will be strictly enforced within the premises. It is crucial that you have completed the vehicle registration process on the system and obtained a valid resident parking permit. Please note that all visitors' vehicles must also be registered online.</p>
            <p>If you have any inquiries or concerns, please do not hesitate to contact us at <strong>832-374-7703</strong>.</p>
            <p>Thank you for your cooperation.</p>
        </div>
        <div class="message">
            <p>Estimado Residente de <strong>{{ $resident->name }}</strong>,</p>
            <p>Le informamos que a partir del <strong>24 de Agosto de 2023</strong>, la aplicación de remolque será estrictamente cumplida en las instalaciones. Es esencial que haya completado el proceso de registro de su vehículo en el sistema y obtenido un permiso de estacionamiento válido para residentes. Por favor, tome en cuenta que los vehículos de visitantes también deben ser registrados en línea.</p>
            <p>Si tiene alguna pregunta o inquietud, no dude en contactarnos al <strong>832-374-7703</strong>.</p>
            <p>Gracias por su cooperación.</p>
        </div>
        <div class="contact">
            <p>Contacto: 832-374-7703</p>
        </div>
    </div>
</body>
</html>
