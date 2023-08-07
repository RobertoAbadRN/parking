<x-app-layout title="Add New Property" is-header-blur="true">

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

                        href="properties">Add New Property</a>

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

                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">

                        Add New Property

                    </p>



                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf



                        <div class="mt-4 space-y-4">

                            <label class="block">

                                <span>Area</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="Area" type="text" name="area" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-regular fa-building text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>Name</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="Name" type="text" name="name" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="far fa-user text-base"></i>

                                    </span>

                                </span>

                            </label>
                            <label class="block">
                                <span>Nickname</span>
                                <span class="relative mt-1.5 flex">
                                    <input
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Nickname" type="text" name="nickName" required />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="far fa-user text-base"></i>
                                    </span>
                                </span>
                            </label>


                            <label class="block">

                                <span>Address</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="Address" type="text" name="address" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa fa-map-marker-alt"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>City</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="City" type="text" name="city" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-city text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>State</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="State" type="text" name="state" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-flag"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>Country</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="Country" type="text" name="country" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-globe text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>ZIP Code</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="ZIP Code" type="text" name="zip_code" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-map-pin text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>Location Type</span>

                                <span class="relative mt-1.5 flex">

                                    <select

                                        class="form-multiselect mt-1.5  pl-9 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accentt"

                                        name="location_type" required>

                                        <option value="">Select Location Type</option>

                                        <option value="Apartment Building">Apartment Building</option>

                                        <option value="Apartment Complex">Apartment Complex</option>

                                        <option value="Company Parking">Company Parking</option>

                                        <option value="Parking Lot">Parking Lot</option>

                                        <option value="Private Parking">Private Parking</option>

                                        <option value="Underground Parking">Underground Parking</option>

                                    </select>

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-location-dot text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <label class="block">

                                <span>Num Places</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        placeholder="Places" type="text" name="places" required />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-map-marked-alt text-base"></i>

                                    </span>

                                </span>

                            </label>                            

                            <label class="block">

                                <span>Logo</span>

                                <span class="relative mt-1.5 flex">

                                    <input

                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"

                                        type="file" name="logo"

                                        accept="image/jpeg,image/png,image/jpg,image/gif" />

                                    <span

                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                                        <i class="fa-solid fa-upload text-base"></i>

                                    </span>

                                </span>

                            </label>

                            <div class="flex justify-end space-x-2">

                                <a href="{{ url('/properties') }}"  class="btn bg-primary font-medium text-white hover:bg-danger-focus focus:bg-danger-focus active:bg-danger-focus/90">

                                    Cancel

                                  </a> 

                                <button

                                    class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"

                                    type="submit">

                                    Submit

                                </button>

                            </div>

                        </div>

                    </form>



                </div>

            </div>

        </div>

    </main>

</x-app-layout>

