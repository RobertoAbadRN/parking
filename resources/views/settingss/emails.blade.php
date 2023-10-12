<x-app-layout title="Settings" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="grid grid-cols-1 mt-5 gap-4 sm:gap-5 lg:gap-6">
            <!-- From HTML Table -->
            <div class="card p-4" x-data="{
                openTab: 1,
                activeClasses: 'bg-blue-500 text-white',
                inactiveClasses: 'dark:border-gray-200',
            }">
                <div>
                    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">MASSIVE EMAILS: <strong
                                class="font-medium text-gray-800 dark:text-white">{{ $property->name }}</strong>

                    </div>
                </div>
                <div class="mb-4 border-b">
                    <ul class="flex -mb-px text-sm font-medium text-center">
                        <li class="w-32" @click="openTab = 1"
                            :class="openTab === 1 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">MASSIVE EMAILS</button>
                        </li>
                        <li class="w-32" @click="openTab = 2"
                            :class="openTab === 2 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">Approve a vehicle</button>
                        </li>
                        <li class="w-32" @click="openTab = 3"
                            :class="openTab === 3 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">Suspend a vehicle</button>
                        </li>
                        <li class="w-32" @click="openTab = 4"
                            :class="openTab === 4 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs"> Register a vehicle</button>
                        </li>
                        <li class="w-32" @click="openTab = 5"
                            :class="openTab === 5 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">Expired</button>
                        </li>
                        <li class="w-32" @click="openTab = 6"
                            :class="openTab === 6 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">Welcome Email</button>
                        </li>
                        <li class="w-32" @click="openTab = 7"
                            :class="openTab === 7 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-lg text-xs">Welcome for Manager</button>
                        </li>
                        <!-- Agrega más botones aquí -->
                    </ul>
                </div>

                <div>
                    <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div id="message_form" class="hidden text-white px-4 py-2 mb-4 rounded-md">

                        </div>
                        @if (session('success_message'))
                            <div id="success-alert"
                                class="alert flex rounded-lg bg-success px-4 py-4 text-white sm:px-5">
                                {{ session('success_message') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    var successAlert = document.getElementById('success-alert');
                                    successAlert.style.display = 'none';
                                }, 5000); // 5000 milisegundos = 5 segundos
                            </script>
                        @endif


                        <div class="max-w-xl mx-auto mt-5 p-8 bg-white rounded-lg shadow-md">
                            <form method="POST" action="{{ route('email.update') }}">
                                @csrf
                                <div class="mb-6">
                                    <label for="email_content" class="block text-gray-700 font-bold mb-2">Email
                                        Content</label>
                                    <textarea name="email_content" id="email_content"
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" rows="12" required>
                                        @if ($emailSetting)
{{ $emailSetting->email_content }}
@endif
                                    </textarea>
                                </div>
                                <!-- Campo oculto para el property_code -->
                                <input type="hidden" name="property_code" value="{{ $property_code }}">


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

    <!-- tan2-->

                    <div x-show="openTab ===  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div id="message_form" class="hidden text-white px-4 py-2 mb-4 rounded-md">

                        </div>
                        @if (session('success_message'))
                            <div id="success-alert"
                                class="alert flex rounded-lg bg-success px-4 py-4 text-white sm:px-5">
                                {{ session('success_message') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    var successAlert = document.getElementById('success-alert');
                                    successAlert.style.display = 'none';
                                }, 5000); // 5000 milisegundos = 5 segundos
                            </script>
                        @endif


                        <div class="max-w-xl mx-auto mt-5 p-8 bg-white rounded-lg shadow-md">
                            <form method="POST" action="{{ route('email.update') }}">
                                @csrf
                                <div class="mb-6"> tab 2
                                    <label for="email_content" class="block text-gray-700 font-bold mb-2">Email
                                        Content</label>
                                    <textarea name="email_content" id="email_content"
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" rows="12" required>
                                        @if ($emailSetting)
{{ $emailSetting->email_content }}
@endif
                                    </textarea>
                                </div>
                                <!-- Campo oculto para el property_code -->
                                <input type="hidden" name="property_code" value="{{ $property_code }}">


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
   <!-- fintan2-->


                </div>
            </div>
        </div>
    </main>
    <script></script>
</x-app-layout>
