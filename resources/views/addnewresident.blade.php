<x-base-layout title="Register Resident">
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[36rem] p-4 sm:px-5"> <!-- Aquí se cambió el ancho máximo -->         
            <div class="card mt-5 w-full rounded-lg p-5 lg:p-7">
                <div class="mt-0 flex flex-col items-center space-y-2">
                    <img class="h-auto w-56" src="{{ asset('images/logo_icon.png') }}" alt="logo" />
                    <span class="text-lg font-semibold">{{ $property_name }}</span>
                </div>
                <!-- SweetAlert CDN -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('login') }}';
                            }
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{{ session('error') }}',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>
                @endif

                <form method="POST" action="{{ route('registerResidentNew') }}">
                    @csrf

                    <input type="hidden" name="property_code" value="{{ $property_code }}">
                    <input type="hidden" name="property_name" value="{{ $property_name }}">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Resident name:
                        </label>
                        <input
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder-text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Resident name" type="text" name="name" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-tiny+ text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="user">
                            Choose Username:
                        </label>
                        <input
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder-text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Username" type="text" name="user" value="{{ old('user') }}" />
                        @error('user')
                            <p class="text-tiny+ text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="apart_unit">
                            Apart/unit:
                        </label>
                        <input
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder-text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Apart/unit" type="text" name="apart_unit"
                            value="{{ old('apart_unit') }}" />
                        @error('apart_unit')
                            <p class="text-tiny+ text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                            Phone:
                        </label>
                        <input
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder-text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Phone" type="text" name="phone" value="{{ old('phone') }}" />
                        @error('phone')
                            <p class="text-tiny+ text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email:
                        </label>
                        <input id="email"
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder-text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="Email" type="email" name="email" value="{{ old('email') }}"
                            oninput="checkEmailAvailability(this.value)" />
                        <span id="email-error" class="text-tiny+ text-error"></span>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="prefered_language">
                            Preferred Language:
                        </label>
                        <select
                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="prefered_language" name="prefered_language">
                            <option value="english">English</option>
                            <option value="spanish">Spanish</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div class="mb-4">
                        <input type="hidden" name="access_level" value="Resident" />
                    </div>                  

                    <div>
                        <button type="submit"
                            class="btn bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                            Save
                        </button>
                    </div>
                </form>




            </div>
        </div>
        <script>
            function checkEmailAvailability(email) {
                axios.get(`/check-email/${email}`)
                    .then(response => {
                        const emailError = document.getElementById('email-error');
                        if (response.data.exists) {
                            emailError.textContent =
                                'The email is already registered. Please check your email to complete the configuration.';
                        } else {
                            emailError.textContent = '';
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        </script>

    </main>
</x-base-layout>
