<x-app-layout title="Invoice 2" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Permit Agreement
            </h2>

            <div class="flex">
                <button onclick="window.print()" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
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
                                <div class="mb-2">
                                    <p class="text-lg text-center font-semibold">{{ $property_name }}</p>
                                </div>

                                <div class="flex items-center justify-center mb-2">
                                    <img src="{{ $logo ? asset('storage/' . $logo) : asset('favicon.png') }}" alt="Logo Resident" class="w-12 h-12 mr-2">
                                    <span>{{ $vehicle->license_plate }}</span>
                                </div>

                                <div class="text-center">
                                    <p class="mb-2 text-xs font-semibold">From: {{$vehicle->start_date->format('Y-m-d')}} To: {{ $vehicle->end_date->format('Y-m-d') }}</p>
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
                    <p>This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between 3rd. Street Apartments, and Resident(s) as listed below:</p>
                    <p>By signing this addendum, I/We agree to the following:</p>
                
                    <ul class="list-disc ml-6 mb-6">
                        <li>I understand that a parking permit will be issued for each apartment. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.</li>
                        <li>I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.</li>
                        <li>The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.</li>
                        <li>I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must be moved during office hours each day.</li>
                        <li>I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.</li>
                        <li>I understand that if a vehicle is towed, I may contact A. Martinez Towing Company LLC, 24 hours a day, at 832-374-7703.</li>
                        <li>If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator's expense.</li>
                    </ul>


                    <footer>
                        <div class="flex justify-between">
                            <div>
                                <p>Resident's Printed Name</p>
                                <p>Unit #</p>
                                <p>Signature</p>
                                <p>Date</p>
                            </div>
                            <div>
                                <p>Oscar De Los Santos</p>
                                <p>102</p>
                                <p></p>
                                <p>07/06/2023</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
