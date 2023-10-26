<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Permit Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
                    @if (is_null($propertySetting) || is_null($propertySetting->name))
                        <p class="property-name">{{ $property_name }}</p>
                    @else
                        @if ($propertySetting->name === '1')
                            <p class="property-name">{{ $property_name }}</p>
                        @elseif ($propertySetting->name === 0)
                            <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                        @endif
                    @endif

                    <div class="mb-2">
                        @if (is_null($propertySetting) || is_null($propertySetting->type))
                            <p class="permit-type">{{ $permit_type }}</p>
                        @else
                            @if ($propertySetting->type === '1')
                                <p class="permit-type">{{ $permit_type }}</p>
                            @elseif ($propertySetting->type === 0)
                                <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                            @endif
                        @endif


                        <div class="flex-container">
                            @if (is_null($propertySetting) || is_null($propertySetting->logo))
                                <img src="https://amartineztowingop.com/images/logo/UvTKfVgTtJbgRcIgA4L9VO6R8vZUD3QUIf5f8zN8.png"
                                    class="logo" />
                            @else
                                @if ($propertySetting->logo === '1')
                                    <img src="https://amartineztowingop.com/images/logo/UvTKfVgTtJbgRcIgA4L9VO6R8vZUD3QUIf5f8zN8.png"
                                        class="logo" />
                                @elseif ($propertySetting->logo === 0)
                                    <!-- No se muestra nada cuando $propertySetting->logo es igual a "0" -->
                                @endif
                            @endif

                            @if (is_null($propertySetting) || is_null($propertySetting->license))
                                <span class="license-plate">{{ $license_plate }}</span>
                            @else
                                @if ($propertySetting->license === '1')
                                    <span class="license-plate">{{ $license_plate }}</span>
                                @elseif ($propertySetting->license === 0)
                                    <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                                @endif
                            @endif

                        </div>
                    </div>
                    <?php
                    $start_date = date_create($start_date); // Convierte la cadena en un objeto DateTime
                    $end_date = date_create($end_date); // Convierte la cadena en un objeto DateTime
                    ?>

                    <p class="date">From: {{ $start_date->format('d-m-Y') }} To: {{ $end_date->format('d-m-Y') }}</p>

                </div>
            </td>
            <!-- Segunda columna -->
            <td class="column2">
                <div class="instructions">
                    <h2>Instructions</h2>
                    <ol>
                        <li>Clean area where sticker is to be placed.</li>
                        <li>Separate sticker from document at perforations.</li>
                        <li>Peel off liner covering the blue border of the sticker.</li>
                        <li>Place sticker on window above registration/inspection sticker and gently smooth sticker
                            against glass.</li>
                    </ol>
                </div>
            </td>
        </tr>
    </table>

    <!-- Continúa con el resto de tu documento aquí -->
    <!-- Acuerdo de permiso -->
    <div class="agreement">
        <h2>Permit Agreement</h2>
        <p>This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between
            1011 th
            W10 th, and Resident(s) as listed below:</p>
        <p>By signing this addendum, I/We agree to the following:</p>
        <ul>
            <li>I understand that a parking permit will be issued for each leaseholder. Parking permits will not be
                issued to
                occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.
            </li>
            <li>I understand that each permit is designated to a specific vehicle and may not be exchanged to another
                vehicle. I
                understand that the permit assigned is based on the vehicle license plate information. I also agree that
                if I
                obtain a new vehicle I agree to return the old permit.</li>
            <li>The parking permit will expire the last day of the current lease. I understand I must renew my parking
                permit when
                my current lease agreement expires. I also understand that proof of vehicle registration and proof of
                valid vehicle
                insurance are required before permit(s) will be issued and/or renewed.</li>
            <li>I understand that visitors may not park inside of the access gates at anytime. All visitor parking is
                designated
                outside the gates at all times. I understand that any vehicle parked in the designated Future Resident
                Parking
                outside of the access gates must be moved during office hours each day.</li>
            <li>I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the
                property, anywhere or
                at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at
                time.</li>
            <li>I understand that if a vehicle is towed, I may contact A. Martinez Towing Company LLC, 24 hours a day,
                at 832-374-7703.</li>
            <li>If a vehicle is park inside the gates without permit, I may contact the towing service directly to have
                the vehicle removed.
                All vehicles toward will be at vehicle owner/operator's expense.</li>
        </ul>
    </div>

    <div style="padding-top: 3em">
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
                        <span class="center_txt">Resident's Printed Name</span>
                    </td>
                    <td width="60" class="center_txt border-t border-gray-800">Unit #</td>
                    <td width="25">&nbsp;</td>
                    <td width="210" class="border-t border-gray-800">
                        <span class="center_txt">Signature</span>
                    </td>
                    <td width="95" class="border-t border-gray-800">
                        <span class="center_txt">Date</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</body>

</html>
