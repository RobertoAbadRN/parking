<x-app-layout title="Recidents" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Dashboards
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">Recidents</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <!-- From HTML Table -->
            <div class="inline-flex space-x-2">
                <div class="inline-flex space-x-4">
                    <div class="inline-flex space-x-4">
                        <a href="#"
                            class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-car" aria-hidden="true"></i> &nbsp; Add Vehicle
                        </a>
                        <a href="#"
                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-users" aria-hidden="true"></i> &nbsp; Add Visitors
                        </a>
                        <a href="#"
                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-car" aria-hidden="true"></i> &nbsp; Status Vehicle
                        </a>
                        <a href="#"
                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; Send Documents
                        </a>



                    </div>

                </div>

            </div>

            <div class="card pb-4">
                <div class="mb-3 flex h-3 items-center justify-between px-4 sm:px-5">

                    @if (session('success_message'))
                        <div id="success_message" class="bg-green-500 text-white px-4 py-2 mb-4 rounded-md">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    @if (session('error_message'))
                        <div id="error_message" class="bg-red-500 text-white px-4 py-2 mb-4 rounded-md">
                            {{ session('error_message') }}
                        </div>
                    @endif

                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('success_message');
                            var errorMessage = document.getElementById('error_message');

                            if (successMessage) {
                                successMessage.remove();
                            }

                            if (errorMessage) {
                                errorMessage.remove();
                            }
                        }, 5000);
                    </script>
                </div>
                <div x-data x-init="$el._x_grid = new Gridjs.Grid({
                    from: $refs.table,
                    sort: true,
                    search: true,
                }).render($refs.wrapper);">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table x-ref="table" class="w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Name
                                    </th>

                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Email
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Status
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        login
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $user->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $user->email }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $user->banned }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $user->last_login }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('properties.edit', $user->id) }}"
                                                    class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('properties.destroy', $user->id) }}"
                                                    class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                                                    onclick="event.preventDefault(); showConfirmation('{{ $user->id }}');">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>

                                                <script>
                                                    function showConfirmation(userId) {
                                                        Swal.fire({
                                                            title: 'Are you sure?',
                                                            text: 'You will not be able to recover this property!',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#d33',
                                                            cancelButtonColor: '#3085d6',
                                                            confirmButtonText: 'Yes, delete it!',
                                                            cancelButtonText: 'Cancel'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('delete-form-' + userId).submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('properties.destroy', $user->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div x-ref="wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
