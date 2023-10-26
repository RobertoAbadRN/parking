<x-app-layout title="Add New Property" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="flex items-center space-x-4 py-5 lg:py-6">

            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">

                Add New Property

            </h2>

            <div class="hidden h-full py-1 sm:flex">

                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>

            </div>

        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">

            <div class="col-span-12 sm:col-span-10">

                <div class="card p-4 sm:p-5">

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

