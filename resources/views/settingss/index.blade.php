<x-app-layout title="Settings" is-sidebar-open="true" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">

                <a

                    class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Documets

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



        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

            <div class="inline-flex space-x-2">

                <div class="inline-flex space-x-4">


                </div>

            </div>


            <!-- Basic Table -->

            <div class="card px-4 pb-4 sm:px-5">

                <div class="container mx-auto pt-5 pb-5">

                    <table id="settings" class="table-auto min-w-full">

                        <thead>

                            <tr>

                                <th class="px-4 py-2">Property Name</th>

                                <th class="px-4 py-2">Permit Definition</th>

                                <th class="px-4 py-2"> Permit Types</th>

                                <th class="px-4 py-2"> Visitor's Pass</th>

                                <th class="px-4 py-2">Pre-Registration</th>

                                <th class="px-4 py-2">Docusign</th>

                                <th class="px-4 py-2">View</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($properties as $property)

                                <tr>

                                    <td class="px-4 py-2">

                                        {{ $property->address }}

                                    </td>

                                    <td class="px-4 py-2">

                                        <a href="{{ route('settings.permit',['property' => $property->id]) }}"

                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                                            <i class="fas fa-edit mr-2"></i>

                                            2 languages

                                        </a>

                                    </td>

                                    <td class="px-4 py-2">

                                        <a href="{{ route('settings.permit.type',['property' => $property->id]) }}"

                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                                            <i class="fas fa-edit mr-2"></i>

                                            Edit

                                        </a>

                                    </td>

                                    <td class="px-4 py-2">

                                        <a href="{{ route('settings.permit.visitor',['property' => $property->id]) }}"

                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                                            <i class="fas fa-edit mr-2"></i>

                                            Edit

                                        </a>

                                    </td>

                                    <td class="px-4 py-2">

                                        <a href="{{ route('settings.permit.registration',['property' => $property->id]) }}"

                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                                            <i class="fas fa-edit mr-2"></i>

                                            Edit

                                        </a>

                                    </td>

                                    <td class="px-4 py-2">

                                        <a href="{{ route('connect.docusign') }}"

                                            class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">

                                            <i class="fas fa-edit mr-2"></i>

                                            Sign document

                                        </a>

                                    </td>

                                    <td class="px-4 py-2">

                                        <div class="flex space-x-10">

                                            <a href="{{ route('properties.vehicles', $property->property_code) }}"

                                                class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">

                                                <i class="fas fa-car mr-2"></i>

                                            </a>

                                            <a href="{{ route('properties.users', $property->property_code) }}"

                                                class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">

                                                <i class="fas fa-users mr-2"></i>

                                            </a>

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

                $('#settings').DataTable({

                    responsive: true

                });

            });

        </script>

    </main>

</x-app-layout>

