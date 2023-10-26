<x-app-layout title="List of vehicles" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">
                    Residents
                </a>
            </h4>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
        @if (session('success_message'))
            <div id="success-message" class="alert flex rounded-lg border border-success px-4 py-4 text-success sm:px-5">
                {{ session('success_message') }}
            </div>
        @endif

        <script>
            // Ocultar el mensaje de éxito después de 5 segundos
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 5000);
        </script>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-10">
                <div class="card p-4 sm:p-5">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Edit Resident
                    </p>
                    <form>
                        @csrf
                        @php
                            $file_data = json_decode($resident_upload_file->file_data);
                        @endphp

                        <div class="mb-4 mt-3">
                            <label for="email" class="block text-sm text-gray-600">Resident Name</label>
                                <input
                                    disabled
                                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    placeholder="Resident Name"
                                    type="text"
                                    name="resident_name"
                                    value="{{ $file_data->resident_name }}"
                                />
                            </label>
                            @error('username')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <span>Apart/unit:</span>
                                <input
                                    disabled
                                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    placeholder="Apartment"
                                    type="text"
                                    name="apartment"
                                    value="{{ $file_data->apartment }}"
                                />
                            </label>
                            @error('apartment')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <span>Email:</span>
                            <label class="relative flex">
                                <input
                                    disabled
                                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    placeholder="Email"
                                    type="email"
                                    name="email"
                                    value="{{ $file_data->email }}"
                                />
                            </label>
                            @error('phone')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label>
                            <span>Phone:</span>
                                <input
                                    disabled
                                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    placeholder="Phone"
                                    type="text"
                                    name="phone"
                                    value="{{ $file_data->phone }}"
                                />
                            </label>
                            @error('email')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <span>Lease Expiration:</span>
                            <label class="relative flex">
                                <input
                                    disabled
                                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    placeholder="Lease Expiration"
                                    type="text"
                                    name="lease_expiration"
                                    value="{{ $file_data->lease_expiration }}"
                                />
                            </label>
                            @error('email')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="button" class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90" onclick="window.location.href='{{ route('residents.import.uploaded') }}'">
                                Cancel
                            </button>
                            <button type="submit" class="btn bg-primary ml-3 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
