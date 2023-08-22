<x-app-layout title="visitors" is-sidebar-open="true" is-header-blur="true">

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
                        href="#"> LIST OF VISITOR'S PASS: {{ $property->address }}</a>

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

                        <a href="{{ route('excel_visitorforid', ['property_code' => request()->route('property_code')]) }}"
                            class="btn custom-btn-lg">

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



                        </a>

                        {{-- <a href="{{ route('temporary.visitors.pass', ['property_code' => request()->route('property_code')]) }}"
    class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90"
    style="width: auto; height: 40px;">
    <i class="fa fa-car" aria-hidden="true"></i> &nbsp; Add Vehicle
</a> --}}




                    </div>



                </div>



            </div>



            <!-- Basic Table -->

            <div class="card px-4 pb-4 sm:px-5">

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

                <div class="container mx-auto py-5">

                    <table id="listvisitors" class="table-auto min-w-full">

                        <thead>

                            <tr>

                                <th class="px-4 py-2"> Visitor's Name</th>

                                <th class="px-4 py-2"> Valid From</th>

                                <th class="px-4 py-2"> License Plate</th>

                                <th class="px-4 py-2"> Make</th>

                                <th class="px-4 py-2"> Model</th>

                                <th class="px-4 py-2">Color</th>

                                <th class="px-4 py-2">Year</th>

                                <th class="px-4 py-2">Unit Number</th>

                                <th class="px-4 py-2">Phone</th>

                                <th class="px-4 py-2">Type</th>

                                <th class="px-4 py-2">Status</th>

                                <th class="px-4 py-2">Actions</th>


                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($visitors as $visitor)
                                <tr>

                                    <td class="px-4 py-2">

                                        {{ $visitor->visitor_name }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->valid_from }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->license_plate }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->make }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->model }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->color }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->year }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->apart_unit ?? 'N/A' }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->resident_phone }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->vehicle_type }}

                                    </td>

                                    <td class="px-4 py-2">

                                        {{ $visitor->status }}

                                    </td>

                                    <td class="px-4 py-2">

                                        <div x-data="{ visitorData: {} }">

                                            <a @click="visitorData = {

                                              validFrom: '{{ $visitor->valid_from }}',

                                              licensePlate: '{{ $visitor->license_plate }}',

                                              make: '{{ $visitor->make }}',

                                              model: '{{ $visitor->model }}',

                                              color: '{{ $visitor->color }}',

                                              year: '{{ $visitor->year }}',

                                              unitNumber: '{{ $visitor->unit_number }}',

                                              visitorName: '{{ $visitor->visitor_name }}',

                                              phone: '{{ $visitor->resident_phone }}',

                                              type: '{{ $visitor->vehicle_type }}',

                                              residentName: '{{ $visitor->resident_name }}',  

                                              status: '{{ $visitor->status }}'

                                          }; printVisitorDetails(visitorData)"
                                                class="btn rounded-full bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">

                                                <i class="fas fa-print"></i>

                                                &nbsp; Print

                                            </a>

                                            <script>
                                                function printVisitorDetails(visitorData) {

                                                    const printContent = `

                                              <div class="header">

                                                  <h2>Address: {{ $property->address }}</h2>

                                              </div>

                                              <div class="body">

                                                  <table>

                                                      <tr>

                                                          <td>Visitor's Name:</td>

                                                          <td>${visitorData.visitorName}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Phone:</td>

                                                          <td>${visitorData.phone}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>License Plate:</td>

                                                          <td>${visitorData.licensePlate}</td>

                                                      </tr>



                                                      <tr>

                                                          <td>Year:</td>

                                                          <td>${visitorData.year}</td>

                                                      </tr>

                                                     

                                                      <tr>

                                                          <td>Make:</td>

                                                          <td>${visitorData.make}</td>

                                                      </tr>

                                                      

                                                      <tr>

                                                          <td>Model:</td>

                                                          <td>${visitorData.model}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Color:</td>

                                                          <td>${visitorData.color}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Type:</td>

                                                          <td>${visitorData.type}</td>

                                                      </tr>

                                                      

                                                      <tr>

                                                          <td>Unit Number:</td>

                                                          <td>${visitorData.unitNumber}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Recident Name:</td>

                                                          <td>${visitorData.residentName}</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Valid From:</td>

                                                          <td>${visitorData.validFrom}</td>

                                                      </tr>

                                                  </table>

                                              </div>

                                              <div class="footer">

            <p>Your vehicle has been Registered for a Visitor's Pass.</p>

            <p>Your visitor's pass is valid for 24 hours.</p>

            <p>If your vehicle is parked on the premises of Demo Property before or after the allowed time, it will be removed at your expense.</p>

            ${visitorData.status === 'Pending' ? '<p>Payment pending</p>' : ''}

        </div>

                                              `;



                                                    const printWindow = window.open('', '_blank');

                                                    printWindow.document.open();

                                                    printWindow.document.write(`

                                              <html>

                                              <head>

                                                  <title>Visitor Details</title>

                                                  <style>

                                                      /* Estilos para el formato de impresión */

                                                      body {

                                                          font-family: Arial, sans-serif;

                                                          font-size: 12px;

                                                          line-height: 1.4;

                                                      }

                                                      .header {

                                                          margin-bottom: 20px;

                                                      }

                                                      .footer {

                                                          margin-top: 20px;

                                                          font-size: 10px;

                                                          color: gray;

                                                      }

                                                      table {

                                                          width: 100%;

                                                          border-collapse: collapse;

                                                      }

                                                      td {

                                                          padding: 8px;

                                                          border: 1px solid #ccc;

                                                      }

                                                      td:first-child {

                                                          font-weight: bold;

                                                      }

                                                  </style>

                                              </head>

                                              <body>

                                                  ${printContent}

                                              </body>

                                              </html>

                                              `);

                                                    printWindow.document.close();

                                                    printWindow.print();

                                                    printWindow.close();

                                                }
                                            </script>

                                        </div>

                                    </td>





                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <script>
            $(document).ready(function() {

                $('#listvisitors').DataTable({

                    responsive: true

                });

            });
        </script>





    </main>



</x-app-layout>
