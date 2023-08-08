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
                        <button class="inline-block p-4 rounded-t-lg">Permit Types</button>
                    </li>
                </ul>
            </div>
            <div>
                <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="inline-block p-4 rounded-t-lg text-gray-900">
                            <p class="mb-2"> YOUR SELECTED PERMIT TYPE </p>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Resident</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Visitor</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Sub-contractor</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Carport</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Temporary</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Reserved</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">V.I.P.</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Contractor</div>
                            <div class="w-80 p-2 border-2 rounded-lg bg-orange-400 text-white px-2">Employee</div>
                        </div>
                        <div class="inline-block p-4 rounded-t-lg text-gray-900">
                            <p class="mb-2"> YAVAILABLE PERMIT TYPE </p>
                        </div>
                    </div>
                    <div class=" mt-3 text-center">
                        <button type="submit"
                            class="btn btn-submit bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                            Submit
                        </button>
                        <button type="button"
                            class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                            onclick="window.location.href='{{ route('settings') }}'">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>
