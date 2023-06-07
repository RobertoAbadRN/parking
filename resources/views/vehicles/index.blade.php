<x-app-layout title="Table Gridjs Component" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Dashboards
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">vehicles</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <!-- From HTML Table -->
            <div class="inline-flex space-x-2">
                <div class="inline-flex space-x-4">
                    <div class="inline-flex space-x-4">
                        <button class="btn custom-btn-lg" onclick="copyTableToClipboard()">
                            <svg width="30" height="30" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 0V3H9L6 0Z" fill="#0ea5e9" fill-opacity="1" />
                                <path d="M9 4H5V0H0V12H9V4Z" fill="#0EA5E9" fill-opacity="1" />
                                <path d="M13 4V7H16L13 4Z" fill="#0EA5E9" fill-opacity="1" />
                                <path d="M12 4H10V13H7V16H16V8H12V4Z" fill="#0EA5E9" fill-opacity="1" />
                            </svg>
                        </button>
                        <button class="btn custom-btn-lg" onclick="printTable()">
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 14V18H6V20H18V18H20V14H4ZM17 19H7V16H17V19Z" fill="#0EA5E9"
                                    fill-opacity="1" />
                                <path
                                    d="M16 10V6L13.3 4H8V10H4V13H20V10H16ZM13 5L14.3 6H13V5ZM15 11H9V5H12V7H15V11ZM19 12H18V11H19V12Z"
                                    fill="#0EA5E9" fill-opacity="1" />
                            </svg>

                        </button>

                        <button class="btn custom-btn-lg" onclick="exportTableToPdf()">
                            <svg width="30" height="30" viewBox="0 0 130 167" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M129.459 25.8618V161.147C129.459 164.353 126.843 166.968 123.636 166.968H16.2887C13.0817 166.968 10.4655 164.353 10.4655 161.147V6.20399C10.4655 2.99799 13.0817 0.382568 16.2887 0.382568H103.93L129.459 25.8618Z"
                                    fill="white" />
                                <path
                                    d="M129.459 25.8618V161.147C129.459 164.353 126.843 166.968 123.636 166.968H115.323C118.53 166.968 121.147 164.353 121.147 161.147V25.8618L95.6599 0.382568H103.973L129.459 25.8618Z"
                                    fill="#E5E5E5" />
                                <path
                                    d="M129.459 25.8618H109.754C106.547 25.8618 103.93 23.2464 103.93 20.0404V0.382568L129.459 25.8618Z"
                                    fill="#0EA5E9" />
                                <path
                                    d="M104.859 79.2671H35.7411C33.4203 79.2671 31.5215 77.3688 31.5215 75.0487C31.5215 72.7285 33.4203 70.8302 35.7411 70.8302H104.859C107.18 70.8302 109.078 72.7285 109.078 75.0487C109.078 77.411 107.222 79.2671 104.859 79.2671Z"
                                    fill="#0EA5E9" />
                                <path
                                    d="M104.859 100.908H35.7411C33.4203 100.908 31.5215 99.0093 31.5215 96.6892C31.5215 94.369 33.4203 92.4707 35.7411 92.4707H104.859C107.18 92.4707 109.078 94.369 109.078 96.6892C109.078 99.0515 107.222 100.908 104.859 100.908Z"
                                    fill="#0EA5E9" />
                                <path
                                    d="M104.859 122.548H35.7411C33.4203 122.548 31.5215 120.65 31.5215 118.33C31.5215 116.01 33.4203 114.111 35.7411 114.111H104.859C107.18 114.111 109.078 116.01 109.078 118.33C109.078 120.692 107.222 122.548 104.859 122.548Z"
                                    fill="#0EA5E9" />
                                <path
                                    d="M59.1179 57.3313H0.676025V33.6659C0.676025 31.8942 2.11068 30.4177 3.92512 30.4177H59.1179C60.8902 30.4177 62.367 31.852 62.367 33.6659V54.0831C62.367 55.8548 60.9324 57.3313 59.1179 57.3313Z"
                                    fill="#F55B4B" />
                                <path
                                    d="M62.367 53.6612V54.0831C62.367 55.8548 60.9324 57.3313 59.1179 57.3313H0.676025V33.6659C0.676025 31.8942 2.11068 30.4177 3.92512 30.4177H5.57079V38.8546C5.57079 47.0383 12.1956 53.7034 20.4239 53.7034H62.367V53.6612Z"
                                    fill="#DD4E43" />
                                <path d="M0.676025 57.3313L10.4656 68.4679V57.3313H0.676025Z" fill="#DB1B1B" />
                                <path
                                    d="M16.4996 48.9788V51.8052H7.6806V48.9788H9.83261V37.8844H7.6806V35.058H16.4996C18.5673 35.058 20.1285 35.522 21.2678 36.4923C22.4071 37.4625 22.9557 38.7702 22.9557 40.3732C22.9557 41.3013 22.7447 42.145 22.3649 42.9043C21.9852 43.6636 21.4788 44.2542 20.8459 44.6338C20.2129 45.0557 19.5378 45.3088 18.736 45.4775C17.9343 45.6463 16.9638 45.6884 15.7823 45.6884H14.1788V48.9366H16.4996V48.9788ZM14.1788 42.9043H14.8118C16.2887 42.9043 17.2592 42.6512 17.6811 42.1871C18.1031 41.7231 18.3141 41.0904 18.3141 40.3732C18.3141 39.7826 18.1453 39.2343 17.8499 38.8124C17.5545 38.3906 17.217 38.1375 16.8372 38.0109C16.4574 37.9265 15.8245 37.8422 14.9384 37.8422H14.1366V42.9043H14.1788Z"
                                    fill="white" />
                                <path
                                    d="M23.9684 51.8052V48.9788H26.5002V37.8844H23.9684V35.058H31.9013C33.5892 35.058 34.8972 35.1424 35.9522 35.3533C36.9649 35.5642 37.9354 36.0282 38.8637 36.7032C39.792 37.4203 40.5516 38.3484 41.1001 39.5295C41.6487 40.7107 41.944 42.0184 41.944 43.4527C41.944 44.6338 41.733 45.7306 41.3533 46.7852C40.9735 47.8398 40.4672 48.6835 39.8764 49.3585C39.2857 49.9912 38.6105 50.5396 37.7666 50.9193C36.9649 51.2989 36.2053 51.552 35.5302 51.6786C34.855 51.8051 33.8001 51.8473 32.3655 51.8473H23.9684V51.8052ZM30.8886 48.9788H31.9435C33.2094 48.9788 34.2221 48.8101 34.9816 48.4726C35.7412 48.1351 36.3319 47.5445 36.7539 46.743C37.2181 45.8994 37.429 44.8448 37.429 43.4949C37.429 42.2293 37.2181 41.1325 36.7539 40.2467C36.2897 39.3608 35.699 38.728 34.8972 38.3906C34.1377 38.0531 33.125 37.8844 31.9435 37.8844H30.8886V48.9788Z"
                                    fill="white" />
                                <path
                                    d="M43.885 51.8052V48.9788H46.2902V37.8844H43.885V35.058H58.9069V40.2467H55.7V37.9265H50.6787V41.8075H54.3075V44.6338H50.6787V48.9788H53.2526V51.8052H43.885Z"
                                    fill="white" />
                                <path
                                    d="M52.7041 65.1775H10.5078V57.3313H59.3289V58.5968C59.2867 62.2246 56.333 65.1775 52.7041 65.1775Z"
                                    fill="#E5E5E5" />
                            </svg>

                        </button>
                        <button class="btn custom-btn-lg">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 2.79365V29.2064C8 30.7492 9.23122 32 10.75 32H29.25C30.7688 32 32 30.7492 32 29.2064V7.35127C32 6.60502 31.7061 5.88979 31.1838 5.36503L26.6478 0.807413C26.133 0.29013 25.4381 0 24.714 0H10.75C9.23122 0 8 1.25076 8 2.79365ZM9.75 29.2064V2.79365C9.75 2.2326 10.1977 1.77778 10.75 1.77778H24.375V7.87302C24.375 8.92499 25.2145 9.77778 26.25 9.77778H30.25V29.2064C30.25 29.7674 29.8023 30.2222 29.25 30.2222H10.75C10.1977 30.2222 9.75 29.7674 9.75 29.2064ZM30.25 8V7.35127C30.25 7.07991 30.1431 6.81982 29.9532 6.629L26.125 2.78254V7.87302C26.125 7.94315 26.181 8 26.25 8H30.25Z"
                                    fill="#0EA5E9" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 13.125C20.5 12.6418 20.8918 12.25 21.375 12.25H27.125C27.6082 12.25 28 12.6418 28 13.125C28 13.6082 27.6082 14 27.125 14H21.375C20.8918 14 20.5 13.6082 20.5 13.125Z"
                                    fill="#69C997" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 17.125C20.5 16.6418 20.8918 16.25 21.375 16.25H27.125C27.6082 16.25 28 16.6418 28 17.125C28 17.6082 27.6082 18 27.125 18H21.375C20.8918 18 20.5 17.6082 20.5 17.125Z"
                                    fill="#54AD7D" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.5 21.125C20.5 20.6418 20.8918 20.25 21.375 20.25H27.125C27.6082 20.25 28 20.6418 28 21.125C28 21.6082 27.6082 22 27.125 22H21.375C20.8918 22 20.5 21.6082 20.5 21.125Z"
                                    fill="#2B593D" />
                                <path
                                    d="M0 9.25C0 8.42157 0.671573 7.75 1.5 7.75H16.5C17.3284 7.75 18 8.42157 18 9.25V24.25C18 25.0784 17.3284 25.75 16.5 25.75H1.5C0.671573 25.75 0 25.0784 0 24.25V9.25Z"
                                    fill="#3D8A58" />
                                <path
                                    d="M5 21.7715L7.80957 16.542L5.25977 11.75H7.20117L8.84863 14.9697L10.4619 11.75H12.3828L9.83301 16.6172L12.6426 21.7715H10.6396L8.81445 18.3057L6.98926 21.7715H5Z"
                                    fill="white" />
                            </svg>

                        </button>

                    </div>

                </div>

            </div>

            <div class="card pb-4">
                <div class="mb-3 flex h-3 items-center justify-between px-4 sm:px-5">

                    @if (session('success_message'))
                        <div id="success_message" class="bg-green-500 text-white px-4 py-2 mb-4 rounded-md">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    @if (session('error_message'))
                        <div id="error_message" class="bg-red-500 text-white px-4 py-2 mb-4 rounded-md">
                            {{ session('error_message') }}
                        </div>
                    @endif

                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('success_message');
                            var errorMessage = document.getElementById('error_message');

                            if (successMessage) {
                                successMessage.remove();
                            }

                            if (errorMessage) {
                                errorMessage.remove();
                            }
                        }, 5000);
                    </script>
                </div>
                <div x-data x-init="$el._x_grid = new Gridjs.Grid({
                    from: $refs.table,
                    sort: true,
                    search: true,
                }).render($refs.wrapper);">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table x-ref="table" class="w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Property
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        # Vehicles
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Pre Registered (No Permit)
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Expired Permit
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Suspended
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Property
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex justify-center space-x-2">


                                        </div>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div x-ref="wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
