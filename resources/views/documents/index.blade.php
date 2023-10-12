<x-app-layout title="Documents" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a
                    class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Documents
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

        @if (session('error_message'))
            <div id="error-message" class="alert flex rounded-lg border border-error px-4 py-4 text-error sm:px-5">
                {{ session('error_message') }}
            </div>
        @endif

        <script>
            // Ocultar el mensaje de éxito después de 5 segundos
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
                var errorMessage = document.getElementById('error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 5000);
        </script>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <div class="inline-flex space-x-2">
                <div class="inline-flex space-x-4">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('documents.create') }}"
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

                                <th class="px-4 py-2">Properties</th>

                                <th class="px-4 py-2">Languages</th>

                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td class="px-4 py-2">{{ $document->description }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($document->updated_at)->format('F d, Y') }}</td>
                                    <td class="px-4 py-2">
                                        <label class="relative flex">
                                            <select class="property form-select ml-2 peer w-60 rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                                name="property" id="property_{{$document->id}}">
                                                @foreach ($properties as $property)
                                                    <option value="{{$property->id}}">{{$property->name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </td>
                                    <td class="px-4 py-2">
                                        <label class="relative flex">
                                            <select class="language form-select ml-2 peer w-60 rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                                name="language" id="language_{{$document->id}}">
                                                <option value="en">EN (English)</option>
                                                <option value="es">ES (Spanish)</option>
                                            </select>
                                        </label>
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('documents.edit', $document->id) }}"
                                            class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            class="text-green-500 hover:text-green-700 mr-2 download" data-id="{{$document->id}}" download>
                                            <i class="fas fa-download"></i>
                                        </button>
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

                $('body').on('click', '.download', function () {
                    doc_id =  $(this).data('id');
                    var lang  = $('#language_'+doc_id).val();
                    var property = $('#property_'+doc_id).val();
                    window.location.href = '{{ route('documents.property') }}'+'?doc_id='+doc_id+'&language='+lang+'&property_id='+property
                });
            });

        </script>
    </main>
</x-app-layout>

