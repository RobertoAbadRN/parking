<x-app-layout title="List of vehicles" is-sidebar-open="true" is-header-blur="true">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .dz-image img {
            width: 100%;
            height: 100%;
        }
        .dropzone.dz-started .dz-message {
            display: block !important;
        }
        .dropzone {
            border: 2px dashed #028AF4 !important;;
        }
        .dropzone .dz-preview.dz-complete .dz-success-mark {
            opacity: 1;
        }
        .dropzone .dz-preview.dz-error .dz-success-mark {
            opacity: 0;
        }
        .dropzone .dz-preview .dz-error-message{
            top: 144px;
        }
    </style>

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h4 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Residents
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

            <!-- Basic Table -->
            <div class="card px-4 pb-4 sm:px-5">
                <div class="container mx-auto pt-5 pb-5">
                    <h4 class="text-center mb-4 text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">
                            Select resident file to be uploaded
                        </a>
                    </h4>

                    <form action="import/upload" class="dropzone" id="import-xlsx">
                        @csrf
                    </form>

                    <div class="text-center mt-4">
                        <button id="submit-dropzone" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90" style="width: auto; height: 40px;">
                            <i class="fa-solid fa-upload"></i>
                            &nbsp; Upload
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.importXlsx = {
            paramName: "file",
            // acceptedFiles: "xlsx",
            autoProcessQueue: false,
            uploadMultiple: false,
            maxFilezise: 12,
            init: function() {
                const submit_dropzone = document.querySelector("#submit-dropzone");
                const dropzone_this = this;
                submit_dropzone.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone_this.processQueue();
                });
                // this.on("addedfile", function(file) {
                //     window.location.href = "{{ route('recidents') }}";
                // });
                this.on("complete", function(file) {
                    dropzone_this.removeFile(file);
                    window.location.href = "{{ route('residents.import.uploaded') }}";
                });
                this.on("success", dropzone_this.processQueue.bind(dropzone_this));
            }
        };
    </script>
</x-app-layout>
