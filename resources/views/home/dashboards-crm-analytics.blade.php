<x-app-layout title="Analytics Dashboard" is-header-blur="true">

    <!-- Main Content Wrapper -->

    <main class="main-content w-full pb-8">

        <div

            class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">

            <div class="col-span-12 lg:col-span-8">

                <div class="flex items-center justify-between space-x-2">

                    <h2 class="text-base font-medium tracking-wide text-slate-800 line-clamp-1 dark:text-navy-100">

                        DASHBOARD

                    </h2>

                </div>

            </div>

            <div class="col-span-12 lg:col-span-12">

                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-5 lg:grid-cols-2">



                    <a href="{{ route('vehicles') }}">

                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">

                            <div class="flex justify-between space-x-1">

                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">

                                    {{ number_format($totalVehicles) }}

                                </p>

                                <i class="fas fa-car text-primary dark:text-accent"></i>

                            </div>

                            <p class="mt-1 text-xs+">Autos</p>

                        </div>

                    </a>

                    

                    <a href="{{ route('recidents') }}">

                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">

                            <div class="flex justify-between">

                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">

                                    {{ $recidentsCount }}

                                </p>

                                <i class="fas fa-users text-primary dark:text-accent"></i>

                            </div>

                            <p class="mt-1 text-xs+">Recidents</p>

                        </div>

                    </a>

                  

                    <a href="{{ route('properties') }}">

                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">

                            <div class="flex justify-between">

                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">

                                    {{ $propertiesCount }}

                                </p>

                                <i class="fas fa-home text-primary dark:text-accent"></i>

                            </div>

                            <p class="mt-1 text-xs+">Properties</p>

                        </div>

                    </a>

                    

                    

                    <a href="{{ route('visitors_pass') }}">

                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">

                            <div class="flex justify-between">

                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">

                                    {{ $visitorPassesCount }}

                                </p>

                                <i class="fas fa-users text-primary dark:text-accent"></i>

                            </div>

                            <p class="mt-1 text-xs+">Visitors Pass</p>

                        </div>

                    </a>

                    
                    <a href="{{ route('recidents') }}">

                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">

                            <div class="flex justify-between">

                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">

                                    {{  $usersCount }}

                                </p>

                                <i class="fas fa-users text-primary dark:text-accent"></i>

                            </div>

                            <p class="mt-1 text-xs+">Users</p>

                        </div>

                    </a>                 

                </div>
                <script>

                    document.addEventListener('DOMContentLoaded', function() {

                        // Your Alpine.js expression and ApexCharts initialization code here

                    });

                </script>

    </main>

</x-app-layout>

