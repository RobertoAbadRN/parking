<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encabezado del correo -->
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6; margin: 0; padding: 20px;">
    <div style="background-color: #f4f4f4; padding: 10px;">
        <p>Dear Resident of <strong>{{ $user->name }}</strong>,</p>
        <p>Your parking permit for the property "<strong>{{ $property_name }}</strong>" has been suspended until further notice.</p>
        <p>Please contact the property management for any inquiries regarding the suspension of your parking permit.</p>
        <!-- Otros contenidos relacionados con la suspensión del permiso -->
    </div>
</body>
</html>
