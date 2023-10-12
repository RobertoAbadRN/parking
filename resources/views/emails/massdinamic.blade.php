<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encabezado del correo -->
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6; margin: 0; padding: 20px;">
    <div style="background-color: #f4f4f4; padding: 10px;">
        <p>Dear Resident of <strong>{{ $resident->name }}</strong>,</p>
        {!! nl2br($emailSetting->email_content) !!}
    </div>
</body>
</html>

