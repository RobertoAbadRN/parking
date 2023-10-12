<x-app-layout title="Add New Resident" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

               Add Resident

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div>
        </div>      

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">

            <div class="col-span-12 sm:col-span-10">

                <div class="card p-4 sm:p-5">

                    <p class="text-base font-medium text-slate-700 dark:text-navy-100 mb-5">
                        Add New Resident
                    </p>

                    <form action="{{ route('resident.store') }}" method="POST">
                        @csrf

                        <label class="block">
                            <span>Name:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Resident name" type="text" name="name"
                                value="{{ old('name') }}" />
                        </label>

                        @error('name')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Username:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Username" type="text" name="user" value="{{ old('user') }}" />
                        </label>

                        @error('user')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Apart/Unit:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Apart/unit" type="text" name="apart_unit"
                                value="{{ old('apart_unit') }}" />
                        </label>

                        @error('apart_unit')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Reserved Spaces:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Reserved spaces" type="number" name="reserved_space"
                                value="{{ old('reserved_space', 3) }}" />
                        </label>
                        

                        @error('reserved_space')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Lease Expiration:</span>
                            <input x-init="$el._x_flatpickr = flatpickr($el, {
                                dateFormat: 'Y-m-d',
                                minDate: 'today'
                            })"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Lease expiration" type="text" name="lease_expiration" />
                        </label>

                        @error('lease_expiration')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Phone:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Phone" type="text" name="phone" value="{{ old('phone') }}" />
                        </label>

                        @error('phone')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <span>Email:</span>
                            <input 
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Email" type="email" name="email" value="{{ old('email') }}" />
                        </label>

                        @if ($errors->has('email'))
                            <span class="text-tiny+ text-error">{{ $errors->first('email') }}</span>
                        @endif

                        <span id="email-error" class="text-tiny+ text-error"></span>

                        <label class="block">
                            <span>Preferred Language:</span>
                            <select
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                id="prefered_language" name="prefered_language">
                                <option value="english">English</option>
                                <option value="spanish">Spanish</option>
                                <!-- Add more options as needed -->
                            </select>
                        </label>

                        <label class="block">
                            <span>Password:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Password" type="password" name="password" />
                        </label>

                        @error('password')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <label class="block">
                            <input type="hidden" name="access_level" value="Resident">
                        </label>                      

                        <input type="hidden" id="hiddenPropertyCode" name="property_code" value="{{$property_code}}">
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        @error('property_id')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const propertySelect = document.getElementById('propertySelect');
                                const hiddenPropertyCode = document.getElementById('hiddenPropertyCode');
                                propertySelect.addEventListener('change', function() {
                                    const selectedOption = propertySelect.options[propertySelect.selectedIndex];
                                    const propertyCode = selectedOption.getAttribute('data-property-code');
                                    hiddenPropertyCode.value = propertyCode;
                                });
                            });
                        </script>

                        <button type="submit"
                            class="btn bg-warning mt-4 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                            Save
                        </button>

                        <button type="button"
                            class="btn bg-error mt-2 font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                            onclick="window.location.href='{{ route('users') }}'">
                            Cancel
                        </button>
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



            document.addEventListener('DOMContentLoaded', function() {
                const leaseExpirationInput = document.getElementById('lease_expiration');

                leaseExpirationInput.addEventListener('input', function() {
                    const selectedDate = new Date(this.value);
                    const currentDate = new Date();

                    // Compara las fechas
                    if (selectedDate < currentDate) {
                        const currentYear = currentDate.getFullYear();
                        const currentMonth = currentDate.getMonth() + 1; // Los meses van de 0 a 11
                        this.value = `${currentYear}-${currentMonth.toString().padStart(2, '0')}`;
                    }
                });
            });
        </script>

    </main>

</x-app-layout>
