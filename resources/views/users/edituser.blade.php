<x-app-layout title="edit user" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Edit User
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-10">
                <div class="card p-4 sm:p-5">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="user" class="block text-sm font-medium text-gray-700">User Name</label>
                            <input id="user"
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="User Name" type="text" name="user" value="{{ $user->user }}" />
                            @error('username')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input id="name"
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Full Name" type="text" name="name" value="{{ $user->name }}" />
                            @error('name')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input id="phone"
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Phone" type="text" name="phone" value="{{ $user->phone }}" />
                            @error('phone')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email"
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Email" type="email" name="email" value="{{ $user->email }}" />
                            @error('email')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select id="role"
                                class="form-select peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                name="role">
                                <option value="" disabled selected>Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ in_array($role->id, $userRole) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4" id="multiplePropertySelect">
                            <label for="multiple_properties" class="block text-sm font-medium text-gray-700">Select
                                Property</label>
                            <select id="multiple_properties"
                                class="form-select peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                name="properties[]" multiple="multiple">
                                <option value="" disabled>Select property</option>
                                @foreach ($properties as $propertyId => $name)
                                    <option value="{{ $propertyId }}"
                                        {{ in_array($propertyId, $userProperties) ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('properties')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="button"
                                class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                                onclick="window.location.href='{{ route('users') }}'">
                                Cancel
                            </button>
                            <button type="submit"
                                class="btn bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#single_property').select2({
                    tags: true,
                    placeholder: "Select property",
                    allowClear: true,
                    width: '100%', // Ajusta el ancho al 100%
                });

                $('#multiple_properties').select2({
                    tags: true,
                    placeholder: "Select properties",
                    allowClear: true,
                    width: '100%', // Ajusta el ancho al 100%
                });

                $('#access_level').on('change', function() {
                    if ($(this).val() === 'property_manager') {
                        $('#single_property').prop('disabled', true).select2('destroy');
                        $('#multiple_properties').prop('disabled', false).select2();

                    } else {
                        $('#multiple_properties').prop('disabled', true).select2('destroy');
                        $('#single_property').prop('disabled', false).select2();
                    }
                });
            });
        </script>

    </main>
</x-app-layout>
