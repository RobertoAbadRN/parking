<x-base-layout title="Registro">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Permit Agreement
            </h2>

            <div class="flex">
                <button onclick="window.print()"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mostrar los términos y condiciones aquí -->

        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Permit Agreement</h2>
            <p>Este Acuerdo es un anexo y forma parte del Contrato de Arrendamiento del Apartamento, realizado y
                suscrito entre los Apartamentos de la Calle 3 y el(los) Residente(s) mencionados a continuación:</p>
            <p>Al firmar este anexo, Yo/Nosotros aceptamos lo siguiente:</p>

            <ul class="list-disc ml-6 mb-6">
                <li>Entiendo que se emitirá un permiso de estacionamiento para cada apartamento. Los permisos de
                    estacionamiento no se emitirán a los ocupantes. Acepto colocar el permiso de estacionamiento justo
                    encima de las calcomanías de Inspección/Registro de mi vehículo.</li>
                <li>Entiendo que cada permiso está designado para un vehículo específico y no se puede intercambiar
                    por otro vehículo. Comprendo que el permiso asignado se basa en la información de la matrícula del
                    vehículo. También acepto que si obtengo un vehículo nuevo, acepto devolver el antiguo permiso.</li>
                <li>El permiso de estacionamiento expirará el último día del contrato de arrendamiento actual.
                    Entiendo que debo renovar mi permiso de estacionamiento cuando venza mi contrato de arrendamiento
                    actual. También entiendo que se requiere evidencia de registro del vehículo y prueba de un seguro
                    de vehículo válido antes de que se emitan y/o renueven los permisos.</li>
                <li>Entiendo que los visitantes no pueden estacionar dentro de las puertas de acceso en ningún
                    momento. Todo estacionamiento para visitantes está designado fuera de las puertas en todo momento.
                    Entiendo que cualquier vehículo estacionado en el estacionamiento designado para Futuros
                    Residentes fuera de las puertas de acceso debe ser movido durante el horario de oficina todos los
                    días.</li>
                <li>Entiendo que no se me permite estacionar barcos, remolques, vehículos recreativos o vehículos
                    comerciales en la propiedad, en ninguna parte ni en ningún momento. Los vehículos deben ser
                    conducidos regularmente y no pueden quedar abandonados o inoperables en ningún momento.</li>
                <li>Entiendo que si se remolca un vehículo, puedo ponerme en contacto con la Compañía de Remolque A.
                    Martinez LLC, las 24 horas del día, al 832-374-7703.</li>
                <li>Si un vehículo se estaciona dentro de las puertas sin permiso, puedo ponerme en contacto con el
                    servicio de remolque directamente para que retiren el vehículo. Todos los costos de remolque
                    correrán a cargo del propietario/operador del vehículo.</li>
            </ul>
        </div>

        <form method="POST" action="{{ route('accept-terms', ['token' => $user->department->agreement_token]) }}" class="mt-4">
            @csrf
            <button type="submit" class="btn rounded-full bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                Aceptar Términos y Condiciones
            </button>
        </form>
    </main>
</x-app-layout>
