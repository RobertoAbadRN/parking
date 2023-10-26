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
<x-app-layout title="Invoice 2" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Permit Agreement
            </h2>

            <div class="flex">
                <!-- Tu contenido HTML existente -->
                <form action="{{ route('vehicles.printPDF') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <button type="submit" id="print-pdf-button"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                    </button>
                </form>

                <a href="{{ route('properties.vehicles', ['property_code' => $vehicle->property_code]) }}"
                    class="btn ml-5 bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                    Cancel
                </a>
            </div>

        </div>



        <div class="grid grid-cols-1" id="document">
            <div class="card px-5 py-12 sm:px-18">
                <div class="container mx-auto">
                    <div class="grid grid-cols-2 gap-4">

                        <div class="p-4 bg-neutral-300">
                            <div class="card px-5 py-8 sm:px-8 bg-white rounded-lg shadow-md w-80 h-48 mx-auto">
                                @if (is_null($propertySetting) || is_null($propertySetting->name))
                                    <p class="text-lg text-center font-semibold">{{ $property_name }}</p>
                                @else
                                    @if ($propertySetting->name === '1')
                                        <p class="text-lg text-center font-semibold">{{ $property_name }}</p>
                                    @elseif ($propertySetting->name === 0)
                                        <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                                    @endif
                                @endif


                                <div class="mb-2">
                                    @if (is_null($propertySetting) || is_null($propertySetting->type))
                                        <p class="text-sm text-center text-gray-500">{{ $permit_type }}</p>
                                    @else
                                        @if ($propertySetting->type === '1')
                                            <p class="text-sm text-center text-gray-500">{{ $permit_type }}</p>
                                        @elseif ($propertySetting->type === 0)
                                            <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                                        @endif
                                    @endif
                                </div>

                                <div class="flex items-center justify-center mb-2">
                                    @if (is_null($propertySetting) || is_null($propertySetting->logo))
                                        @if ($logo)
                                            <img src="{{ asset($logo) }}" alt="Logo Resident" class="w-12 h-12 mr-2">
                                        @else
                                            <img src="{{ asset('favicon.png') }}" alt="Logo por defecto"
                                                class="w-12 h-12 mr-2">
                                        @endif
                                    @else
                                        @if ($propertySetting->logo === '1')
                                            @if ($logo)
                                                <img src="{{ asset($logo) }}" alt="Logo Resident"
                                                    class="w-12 h-12 mr-2">
                                            @else
                                                <img src="{{ asset('favicon.png') }}" alt="Logo por defecto"
                                                    class="w-12 h-12 mr-2">
                                            @endif
                                        @elseif ($propertySetting->logo === 0)
                                            <!-- No se muestra nada cuando $propertySetting->logo es igual a "0" -->
                                        @endif
                                    @endif

                                    @if (is_null($propertySetting) || is_null($propertySetting->license))
                                        <span
                                            class="border border-black text-black px-2 py-1 rounded">{{ $license_plate }}</span>
                                    @else
                                        @if ($propertySetting->license === '1')
                                            <span
                                                class="border border-black text-black px-2 py-1 rounded">{{ $license_plate }}</span>
                                        @elseif ($propertySetting->license === 0)
                                            <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                                        @endif
                                    @endif
                                </div>


                                <div class="text-center">
                                    @if (is_null($propertySetting) || is_null($propertySetting->start_date))
                                        <p class="mb-2 text-xs font-semibold">
                                            From: {{ $start_date->format('d/m/Y') }} To:
                                            {{ Carbon\Carbon::parse($end_date)->format('d/m/Y') }}
                                        </p>
                                    @else
                                        @if ($propertySetting->start_date === '1')
                                            <p class="mb-2 text-xs font-semibold">
                                                From: {{ $start_date->format('d/m/Y') }} To:
                                                {{ Carbon\Carbon::parse($end_date)->format('d/m/Y') }}
                                            </p>
                                        @elseif ($propertySetting->license === 0)
                                            <!-- No se muestra nada cuando $propertySetting->name es igual a "0" -->
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="p-4">
                            <div class="">
                                <h2 class="text-lg font-bold text-center mb-4">Instructions</h2>
                                <ol class="list-decimal pl-4">
                                    <li class="mb-2">Clean area where sticker is to be placed.</li>
                                    <li class="mb-2">Separate sticker from document at perforations.</li>
                                    <li class="mb-2">Peel off liner covering the blue border of the sticker.</li>
                                    <li class="mb-2">Place sticker on window above registration/inspection sticker and
                                        gently smooth sticker against glass.</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>

                <div class=" p-6">
                    <h2 class="text-2xl font-semibold mb-6">Permit Agreement</h2>
                    <p>This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered
                        into between 3rd. Street Apartments, and Resident(s) as listed below:</p>
                    <p>By signing this addendum, I/We agree to the following:</p>

                    <ul class="list-disc ml-6 mb-6">
                        <li>I understand that a parking permit will be issued for each apartment. Parking permits will
                            not be issued to occupants. I agree to place the parking permit just above my vehicle
                            Inspection/Registration stickers.</li>
                        <li>I understand that each permit is designated to a specific vehicle and may not be exchanged
                            to another vehicle. I understand that the permit assigned is based on the vehicle license
                            plate information. I also agree that if I obtain a new vehicle I agree to return the old
                            permit.</li>
                        <li>The parking permit will expire the last day of the current lease. I understand I must renew
                            my parking permit when my current lease agreement expires. I also understand that proof of
                            vehicle registration and proof of valid vehicle insurance are required before permit(s) will
                            be issued and/or renewed.</li>
                        <li>I understand that visitors may not park inside of the access gates at anytime. All visitor
                            parking is designated outside the gates at all times. I understand that any vehicle parked
                            in the designated Future Resident Parking outside of the access gates must be moved during
                            office hours each day.</li>
                        <li>I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at
                            the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot
                            be left abandoned or inoperable at time.</li>
                        <li>I understand that if a vehicle is towed, I may contact A. Martinez Towing Company LLC, 24
                            hours a day, at 832-374-7703.</li>
                        <li>If a vehicle is park inside the gates without permit, I may contact the towing service
                            directly to have the vehicle removed. All vehicles toward will be at vehicle
                            owner/operator's expense.</li>
                    </ul>


                    <div style="padding-top: 5em">
                        <table width="99%" cellpadding="5" cellspacing="2">
                            <tbody>
                                <tr>
                                    <td width="205"><span class="center_txt">{{ $name }}</span></td>
                                    <td width="60" class="center_txt">{{ $unit_number }}</td>
                                    <td width="25">&nbsp;</td>
                                    <td width="210"></td>
                                    <td width="95">{{ now()->format('d/m/Y') }}</td>

                                </tr>
                                <tr>
                                    <td width="205" class="border-t border-gray-800">
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
                </div>
            </div>
        </div>

    </main>
    <script>
        // Escucha el evento submit del formulario
        document.getElementById('print-pdf-form').addEventListener('submit', function(event) {
            // Evita que el formulario se envíe de manera predeterminada
            event.preventDefault();

            // Realiza una solicitud POST al servidor
            axios.post(this.action, new FormData(this), {
                    responseType: 'blob', // Indica que esperas una respuesta binaria (archivo)
                })
                .then(response => {
                    // Crea una URL a partir de los datos binarios
                    const blob = new Blob([response.data], {
                        type: 'application/pdf'
                    });
                    const url = window.URL.createObjectURL(blob);

                    // Abre la URL en una nueva ventana o pestaña
                    window.open(url);

                    // Liberar la URL cuando no se necesite más (opcional)
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Error al imprimir PDF:', error);
                });
        });
    </script>
</x-app-layout>
