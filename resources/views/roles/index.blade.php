<x-app-layout title="properties" is-sidebar-open="true" is-header-blur="true">
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
                        href="#"> Roles</a>
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
                        <a href="{{ route('roles.create') }}" class="btn btn-xs bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                            <svg width="24" height="24"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill="#FFF" d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                              </svg>
                            &nbsp;Add role
                        </a>
                    </div>
                </div>
            </div>

            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5">
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
                <div class="container mx-auto">
                    <table id="listuser" class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="px-4 py-2">
                                        {{ $role->id }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $role->name }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('user.destroy', $role->id) }}"
                                                class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                                                onclick="event.preventDefault(); showConfirmation('{{ $role->id }}');">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                            <script>
                                                function showConfirmation(userId) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: '¡No podrás deshacer esta acción!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#3085d6',
                                                        confirmButtonText: 'Sí, eliminar',
                                                        cancelButtonText: 'Cancelar'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-user-form-' + userId).submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                            <form id="delete-user-form-{{ $role->id }}"
                                                action="{{ route('user.destroy', $role) }}" method="POST"
                                                style="display: none;">
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
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#listuser').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
</x-app-layout>
