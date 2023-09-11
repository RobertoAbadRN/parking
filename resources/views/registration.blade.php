<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <style>
        /* Estilos CSS para la tabla */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Estilos CSS para el botón de impresión */
        .print-button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Registration Status</h1>
        
        <!-- Tabla con estilo y completamente responsive -->
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>License Plate:</strong></td>
                        <td>{{ $license_plate }}</td>
                    </tr>
                    <tr>
                        <td><strong>VIN:</strong></td>
                        <td>{{ $vin }}</td>
                    </tr>
                    <tr>
                        <td><strong>Make:</strong></td>
                        <td>{{ $make }}</td>
                    </tr>
                    <tr>
                        <td><strong>Model:</strong></td>
                        <td>{{ $model }}</td>
                    </tr>
                    <tr>
                        <td><strong>Year:</strong></td>
                        <td>{{ $year }}</td>
                    </tr>
                    <tr>
                        <td><strong>Color:</strong></td>
                        <td>{{ $color }}</td>
                    </tr>
                    <tr>
                        <td><strong>Vehicle Type:</strong></td>
                        <td>{{ $vehicle_type }}</td>
                    </tr>
                    <!-- Agrega más filas de datos aquí si es necesario -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            Your vehicle has been pre-registered for a parking permit.<br>
                            Please visit Village at Piney Point office at your earliest convenience.<br>
                            They will issue your permit.<br>
                            Thank you.
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        
        <!-- Botón de impresión -->
        <a href="javascript:window.print()" class="print-button">Print</a>
    </div>
</body>
</html>
