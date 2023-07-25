<x-app-layout title="Documents" is-sidebar-open="true" is-header-blur="true">
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
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('documents.addfile') }}"
                            class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
                            style="width: auto; height: 40px;">
                            <i class="fa fa-file" aria-hidden="true"></i> &nbsp; Add Files
                        </a>
                    </div>
                </div>
            </div>


            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5">
                <div class="container mx-auto pt-5 pb-5">
                    <table id="documents" class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">File Description</th>
                                <th class="px-4 py-2">Last Update</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td class="px-4 py-2">{{ $document->description }}</td>
                                    {{-- Suponiendo que $document contiene la información del archivo --}}
                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($document->updated_at)->format('F d, Y') }}</td>

                                    <td class="px-4 py-2">
                                        <a href="{{ route('documents.edit', $document->id) }}"
                                            class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ asset($document->file_path) }}"
                                            class="text-green-500 hover:text-green-700 mr-2" download>
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <!-- Delete button -->
                                        <a href="#" class="text-red-500 hover:text-red-700 mr-2"
                                            onclick="event.preventDefault();
        document.getElementById('delete-form-{{ $document->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $document->id }}"
                                            action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
                $('#documents').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
</x-app-layout>
