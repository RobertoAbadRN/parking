<x-app-layout title="Edit Document" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                DASHBOARD
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">Document edit</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            </ul>
        </div>

        <template x-if="$store.breakpoints.isXs">
            <div x-data="{ isStuck: false }" class="pb-6" x-intersect:enter.full.margin.-60px.0.0.0="isStuck = false"
                x-intersect:leave.full.margin.-60px.0.0.0="isStuck = true">
                <div :class="isStuck && 'fixed right-0 top-[60px] w-full z-10'">
                    <div class="transition-all duration-200"
                        :class="isStuck && 'py-2.5 px-4 bg-white dark:bg-navy-700 shadow-lg relative'">
                        <ol class="steps with-space-line">
                            <li class="step before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Create Account
                                </h3>
                            </li>
                            <li class="step before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Select Service
                                </h3>
                            </li>
                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    3
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Address
                                </h3>
                            </li>
                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">
                                <div
                                    class="step-header rounded-full bg-slate-200 text-slate-800 dark:bg-navy-500 dark:text-white">
                                    4
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Review
                                </h3>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </template>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-10">
                <div class="card p-4 sm:p-5">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100 pb-5">
                        Edit Documets
                    </p>

                    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <label class="block">
                            <span>File Description:</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                type="text" name="file_description" placeholder="File Description" required
                                value="{{ $document->description }}">
                        </label>
                    
                        @error('file_description')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                    
                        <!-- Agregar el campo de archivo -->
                        <div class="flex space-x-4 mt-6">
                            <label class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <input tabindex="-1" type="file" name="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span>Choose English File</span>
                                </div>
                            </label>
                        </div>
                    
                        <div class="mt-6">
                            <button type="submit" class="btn bg-primary text-white hover:bg-primary-dark">Update</button>
                            <a href="{{ route('documents') }}" class="btn bg-gray-300 text-gray-800 hover:bg-gray-400">Cancel</a>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
