<x-app-layout title="visitor pass" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-lg font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                <h2 class="text-lg font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                    Add Vehicle For:
                </h2>

                <p class="text-lg font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                    @if ($visitorPasses->isNotEmpty())
                        {{ $visitorPasses[0]->address }}
                    @endif
                </p>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 lg:col-span-8">
                <div class="card">
                    <div class="tabs flex flex-col">
                        <div class="tab-content p-4 sm:p-5">

                            <form action="{{ route('visitors.add') }}" method="POST" class="form">
                                <h2 class="text-center mb-4 pt-4">Register your vehicle for a temporary Visitor's Pass
                                </h2>
                                @csrf

                                <input type="hidden" name="property_code" value="{{ request('property_code') }}">

                                <div class="mb-3">
                                    <label for="visitor_name" class="form-label">Visitor's Name / Nombre del
                                        Visitante</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="visitor_name" name="visitor_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="visitor_phone" class="form-label">Visitor's Phone / Teléfono del
                                        Visitante</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="visitor_phone" name="visitor_phone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="license_plate" class="form-label">License Plate / Placa del
                                        Vehículo</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="license_plate" name="license_plate" required>
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label">Year / Año</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="year" name="year" required>
                                </div>

                                <div class="mb-3">
                                    <label for="make" class="form-label">Make / Marca</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="make" name="make" required>
                                </div>

                                <div class="mb-3">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="model" name="model" required>
                                </div>

                                <div class="mb-3">
                                    <label for="color" class="form-label">Color / Color</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="color" name="color" required>
                                </div>

                                <div class="mb-3">
                                    <label for="vehicle_type" class="form-label">Vehicle Type / Tipo de Vehículo</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="vehicle_type" name="vehicle_type" required>
                                </div>

                                <div class="mb-3">
                                    <label for="resident_name" class="form-label">Resident's Name / Nombre del
                                        Residente</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="resident_name" name="resident_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="unit_number" class="form-label">Resident's Unit Number / Número de
                                        Unidad del Residente</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="unit_number" name="unit_number" required>
                                </div>

                                <div class="mb-3">
                                    <label for="resident_phone" class="form-label">Resident's Phone / Teléfono del
                                        Residente</label>
                                    <input type="text"
                                        class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="resident_phone" name="resident_phone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="valid_from" class="form-label">Valid From / Válido Desde</label>
                                    <div class="flex space-x-2">
                                        <input type="date"
                                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            id="valid_from_date" name="valid_from_date" required>
                                        <input type="time"
                                            class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            id="valid_from_time" name="valid_from_time" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                        <button type="submit" 
                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 mr-2">
                            Save Vehicle
                        </button>
                        @php
                            $property_code = request()->segment(2);
                        @endphp
                        <a href="{{ route('properties.vehicles', ['property_code' => $property_code]) }}"
                            class="px-4 py-2 bg-red-500 text-white rounded-md">Cancel</a>

                    </div>
             </form>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
