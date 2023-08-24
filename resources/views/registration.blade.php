<x-base-layout title="Register" is-sidebar-open="true" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="bg-white p-6 rounded shadow-md">
                <h1 class="text-2xl font-semibold mb-4">Registration Status</h1>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
                @if (session('success'))
                    <div class="text-green-500 text-lg">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="text-red-500 text-lg">
                        <p>Vehicle Registration Error</p>
                        <p>Vehicle Registration for Permit at {{ session('property_code') }}</p>
                        <p>We are sorry but your vehicle could not be registered.</p>
                        <p>Please visit {{ session('property_code') }} office for further information and resolve this
                            issue.</p>
                    </div>
                @endif

            </div>
        </div>

        <!-- ... (later code) -->
    </main>

</x-base-layout>
