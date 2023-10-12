<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>español</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        /* Estilos para la tabla principal */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
        }



        /* Estilos para la primera columna */
        .column1 {
            width: 50%;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .column1 .card-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
        }

        .property-name {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .permit-type {
            font-size: 14px;
            color: #555;
            text-align: center;
        }




        .license-plate {
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #000;
            padding: 5px 10px;
            border-radius: 4px;
            margin-top: -20px;
            /* Ajusta el valor negativo según cuánto quieras subir el span */
        }


        .date {
            font-size: 12px;
            color: #777;
        }

        /* Estilos para la segunda columna */
        .column2 {
            width: 50%;
            padding: 20px;
        }

        .instructions h2 {
            font-size: 18px;
            font-weight: bold;
        }

        .instructions ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        .instructions li {
            font-size: 14px;
            color: #333;
            margin-bottom: 0px;
        }

        .flex {
            display: flex;
            align-items: center;
            /* Centrar verticalmente */
        }

        .flex img {
            margin-right: 0px;
            /* Agregar margen a la derecha de la imagen */
        }

        .flex-container {
            display: flex;
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
            height: 200vh;
            /* Establecer la altura del contenedor (ajusta según tus necesidades) */
        }


        .logo {
            width: 50px;
            /* Ancho de la imagen */
            height: auto;
            /* Altura automática para mantener la proporción */
            margin-right: 20px;
            /* Margen derecho para separar la imagen del texto */
        }

        .signature-line-top {
            border-top: 0px solid #000;
            /* Color y estilo de la línea de separación superior */
            height: 10px;
            /* Altura de la línea de separación superior (ajústala según tus necesidades) */
        }

        .signature-line {
            border-top: 1px solid #000;
            /* Color y estilo de la línea de firma */
            height: 1px;
            /* Altura de la línea de firma (ajústala según tus necesidades) */
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <!-- Primera columna -->
            <td class="column1">
                <div class="card-content">
                    <p class="property-name">{{ $property_name }}</p>
                    <p class="permit-type">{{ $permit_type }}</p>
                    <div class="flex-container">
                        <img src="https://amartineztowingop.com/images/logo/UvTKfVgTtJbgRcIgA4L9VO6R8vZUD3QUIf5f8zN8.png"
                            class="logo" />
                        <span class="license-plate">{{ $license_plate }}</span>
                    </div>
                    <p class="date">From: {{ $start_date }} To: {{ $end_date }}</p>
                </div>
            </td>
            <!-- Segunda columna -->
            <td class="column2">
                <div class="instructions">
                    <h2>Instrucciones</h2>
                    <ol>
                        <li>Limpie el área donde se colocará la calcomanía.</li>
                        <li>Separe la calcomanía del documento en las perforaciones.</li>
                        <li>Despegue el forro que cubre el borde azul de la calcomanía.</li>
                        <li>Coloque la calcomanía en la ventana sobre la calcomanía de registro/inspección y alise suavemente la calcomanía contra el vidrio.</li>
                    </ol>
                </div>
            </td>            
        </tr>
    </table>

    <!-- Continúa con el resto de tu documento aquí -->
    <!-- Acuerdo de permiso -->
    <div class="agreement">
        <h2>Permit Agreement</h2>
        <p>Este acuerdo es un anexo y forma parte del Contrato de Arrendamiento de Apartamento, celebrado entre el número 1011 de la calle W10, y el/los Residente(s) mencionado(s) a continuación:</p>
        <p>Al firmar este anexo, yo/nosotros aceptamos lo siguiente:</p>
        <ul>
            <li>Comprendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no se emitirán a ocupantes. Acepto colocar el permiso de estacionamiento justo encima de las calcomanías de Inspección/Registro de mi vehículo.</li>
            <li>Entiendo que cada permiso está designado para un vehículo específico y no se puede transferir a otro vehículo. Comprendo que el permiso asignado se basa en la información de la placa de matrícula del vehículo. También acepto que si obtengo un nuevo vehículo, estoy de acuerdo en devolver el permiso antiguo.</li>
            <li>El permiso de estacionamiento vencerá el último día del contrato de arrendamiento actual. Comprendo que debo renovar mi permiso de estacionamiento cuando expire mi contrato de arrendamiento actual. También entiendo que se requiere evidencia de registro del vehículo y prueba de seguro de vehículo válido antes de emitir o renovar permisos.</li>
            <li>Comprendo que los visitantes no pueden estacionarse dentro de las puertas de acceso en ningún momento. El estacionamiento para visitantes está designado fuera de las puertas en todo momento. Entiendo que cualquier vehículo estacionado en el área designada de Estacionamiento para Futuros Residentes fuera de las puertas de acceso debe ser movido durante las horas de oficina todos los días.</li>
            <li>Entiendo que no puedo estacionar barcos, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en ningún lugar o en ningún momento. Los vehículos deben ser utilizados de manera regular y no pueden quedar abandonados o inoperables.</li>
            <li>Entiendo que si se remolca un vehículo, puedo contactar a A. Martinez Towing Company LLC las 24 horas del día al 832-374-7703.</li>
            <li>Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que retire el vehículo. Todos los gastos de remolque correrán por cuenta del propietario u operador del vehículo.</li>
        </ul>
        
    </div>

    <div style="padding-top: 0em">
        <table width="99%" cellpadding="5" cellspacing="2">
            <tbody>
                <tr>
                    <td colspan="5" class="signature-line-top"></td>
                </tr>
                <tr>
                    <td width="150"><span class="center_txt">{{ $name }}</span></td>
                    <td width="60" class="center_txt">{{ $unit_number }}</td>
                    <td width="25">&nbsp;</td>
                    <td width="210"></td>
                    <td width="95">{{ now()->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="signature-line"></td>
                </tr>
                <tr>
                    <td width="150" class="border-t border-gray-800">
                        <span class="center_txt">Nombre Impreso del Residente</span>
                    </td>
                    <td width="60" class="center_txt border-t border-gray-800">Núm. de Unidad</td>
                    <td width="25">&nbsp;</td>
                    <td width="210" class="border-t border-gray-800">
                        <span class="center_txt">Firma</span>
                    </td>
                    <td width="95" class="border-t border-gray-800">
                        <span class="center_txt">Fecha</span>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>



</body>

</html>
