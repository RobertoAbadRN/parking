<x-app-layout title="Settings" is-sidebar-open="true" is-header-blur="true">
<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="grid grid-cols-1 mt-5 gap-4 sm:gap-5 lg:gap-6">
        <!-- From HTML Table -->
        <div class="card p-4" x-data="{
            openTab: 1,
            activeClasses: 'bg-blue-500 text-white',
            inactiveClasses: 'dark:border-gray-200',}
        ">
            <div>
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Permit Settings for: <strong class="font-medium text-gray-800 dark:text-white">{{$property->address}}</strong></p>
                </div>
            </div>
            <div class="mb-4 border-b">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="w-80" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Permit Text  (Agreement & Instructions)</button>
                    </li>
                    <li class="w-80" @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Permit Layout & Paper Format</button>
                    </li>
                    <li class="w-80" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Print Preview</button>
                    </li>
                </ul>
            </div>
            <div>
                <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-center mb-6 mt-2 text-blue-500">Here We have the language selection. The selection will allow to create new language as define in the system </p>
                    <label class="relative flex">
                        Select Language:
                        <select class="form-select ml-2 peer w-60 rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            name="languaje">
                            <option value="">Select languaje</option>
                                <option value="es">ES (Spanish)</option>
                                <option value="es">EN (English)</option>
                        </select>
                    </label>
                    <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                        <div>When Printed the Permit Sticker content will be here. </div>
                        <div>
                            <p class="mb-2 text-gray-900">Instructions</p>
                            <textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500"></textarea>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                        <div>Formatted as defined in the "Permit Layout" tab. </div>
                        <div><textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500"></textarea></div>
                    </div>

                    <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                        <div>On the right you have the option to give some basic instructions to the permit holder to insure the sticker is placed appropriately in the vehicle. </div>
                        <div>
                            <textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500"></textarea>
                            <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500"></textarea>
                            <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500"></textarea>
                            <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500"></textarea>
                        </div>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <div class="text-gray-900">Permit Agreement <br> <span class="text-blue-500"> Permit agreement Header printed above the rules </span></div>
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <div class="text-gray-900">Permit Agreement Rules</div>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <div class="text-gray-900">Permit Agreement Footer</div>
                    </div>
                    <div class=" text-center grid grid-cols-1 mt-2 sm:gap-5 lg:gap-6">
                        <textarea name="" id="" cols="30" rows="3" class="border border-gray-500"></textarea>
                    </div>

                    <div class=" mt-3 text-center">
                        <button type="submit"
                            class="btn bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                            Submit
                        </button>
                        <button type="button"
                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                            onclick="window.location.href='{{ route('settings') }}'">
                            Cancel
                        </button>
                    </div>
               </div>
                <div x-show="openTab ===  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong class="font-medium text-gray-800 dark:text-white">En desarrollo</strong>.</p>
                </div>
                <div x-show="openTab ===  3" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong class="font-medium text-gray-800 dark:text-white">En desarrollo</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>
