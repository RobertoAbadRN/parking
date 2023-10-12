<x-app-layout title="Edit Resident" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

                Edit Resident

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div> 

        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">

            <div class="col-span-12 sm:col-span-10">

                <div class="card p-4 sm:p-5">

                    <p class="text-base font-medium text-slate-700 dark:text-navy-100 mb-5">
                        Edit Resident
                    </p>

                    <form action="{{ route('residents.update', ['resident' => $resident->id]) }}" method="POST">
                        @csrf <!-- Directiva para generar el token CSRF -->
                    
                        <!-- Campo: Resident Name -->
                        <div class="mb-4 pt-2">
                            <label class="block">
                                <span>Resident Name:</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Resident name" type="text" name="name"
                                    value="{{ old('name', $resident->name) }}" />
                            </label>
                            @error('name')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="property_code" value="{{ $resident->property_code }}">

                    
                        <!-- Campo: Username -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Username:</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Username" type="text" name="user"
                                    value="{{ old('user', $resident->user) }}" />
                            </label>
                            @error('user')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Campo: Apart/unit -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Apart/unit:</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Apart/unit" type="text" name="apart_unit"
                                    value="{{ old('apart_unit', optional($resident->department)->apart_unit) }}" />
                            </label>
                            @error('apart_unit')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Campo: Reserved spaces -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Reserved spaces:</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Reserved spaces" type="text" name="reserved_space"
                                    value="{{ old('reserved_space', optional($resident->department)->reserved) }}" />
                            </label>
                            @error('reserved_space')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Campo: Lease Expiration -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Lease Expiration:</span>
                                <input x-init="$el._x_flatpickr = flatpickr($el, {
                                    dateFormat: 'Y-m-d',
                                    minDate: 'today'
                                })"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Lease Expiration" type="text" name="lease_expiration"
                                    value="{{ old('lease_expiration', $resident->lease_expiration) }}" />
                            </label>
                            @error('lease_expiration')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Campo: Phone -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Phone:</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Phone" type="text" name="phone"
                                    value="{{ old('phone', $resident->phone) }}" />
                            </label>
                            @error('phone')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Campo: Email -->
                        <div class="mb-4">
                            <label class="block">
                                <span>Email:</span>
                                <input id="email"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Email" type="email" name="email"
                                    value="{{ old('email', $resident->email) }}" />
                            </label>
                            @error('email')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div>
                            <button type="submit"
                                class="btn bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                Save
                            </button>
                            <button type="button"
                                class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                                onclick="window.location.href='{{ route('recidents') }}'">
                                Cancel
                            </button>
                        </div>
                    </form>
                    



                </div>

            </div>

        </div>

        <script>
            $(document).ready(function() {

                $('#email').keyup(function() {

                    var email = $(this).val();

                    $.ajax({

                        url: '{{ route('verificar-correo') }}',

                        method: 'GET',

                        data: {

                            email: email

                        },

                        success: function(response) {

                            if (response.existe) {

                                // El correo existe en la base de datos

                                $('#email-error').text('The email is already registered.');

                            } else {

                                // El correo no existe en la base de datos

                                $('#email-error').text('');

                            }

                        },

                        error: function() {

                            // Error en la llamada AJAX

                            $('#email-error').text('Error en la consulta.');

                        }

                    });

                });

            });
        </script>
    </main>

</x-app-layout>
