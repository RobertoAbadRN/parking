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
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div x-show="openTab ===  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div x-show="openTab ===  3" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>
