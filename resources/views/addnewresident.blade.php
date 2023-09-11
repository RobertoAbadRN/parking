<x-base-layout title="Register Resident">
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
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



                <form method="POST" action="{{ route('registerResidentNew') }}">
                    @csrf

                    <input type="hidden" name="property_code" value="{{ $property_code }}">
                    <input type="hidden" name="property_name" value="{{ $property_name }}">

                    <div class="mb-0 pt-5">
                        <label class="relative flex">

                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Resident name" type="text" name="name" value="{{ old('name') }}" />

                        </label>

                        @error('name')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-4 pt-5">

                        <label class="relative flex">

                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="UserName" type="text" name="user" value="{{ old('user') }}" />

                        </label>

                        @error('user')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="relative flex">

                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Apart/unit" type="text" name="apart_unit"
                                value="{{ old('apart_unit') }}" />

                        </label>

                        @error('apart_unit')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="relative flex">

                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Phone" type="text" name="phone" value="{{ old('phone') }}" />

                        </label>

                        @error('phone')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

                    </div>



                    <div class="mb-4">

                        <label class="relative flex">

                            <input id="email"
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Email" type="email" name="email" value="{{ old('email') }}" />

                        </label>

                        @if ($errors->has('email'))
                            <span class="text-tiny+ text-error">{{ $errors->first('email') }}</span>
                        @endif



                        <span id="email-error" class="text-tiny+ text-error"></span>

                    </div>

                    

                    <div class="mb-4">

                        <label class="relative flex">

                            <input type="hidden" name="access_level" value="Resident">

                        </label>

                        @error('access_level')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>

                        <button type="submit"
                            class="btn bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                            Submit

                        </button>

                    </div>
                </form>

            </div>
        </div>
    </main>
</x-base-layout>
