<x-base-layout title="Register" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="container mx-auto">
            @if(session('successMessage'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('successMessage') }}</span>
                </div>
            @endif

            <h2 class="text-2xl font-semibold mb-4">Visitor Pass Registration Completed</h2>
            <div class="overflow-x-auto">
                <div class="flex overflow-x-auto">
                    <table class="min-w-full bg-white border rounded shadow-sm">
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">VP Code</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->vp_code }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Property Code</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->property_code }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Visitor Name</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->visitor_name }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Visitor Phone</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->visitor_phone }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">License Plate</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->license_plate }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Year</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->year }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Make</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->make }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Color</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->color }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Model</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->model }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Vehicle Type</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->vehicle_type }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 font-semibold">Valid From</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $latestVisitorPass->valid_from }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="py-4 px-4 text-sm text-gray-500">
                                    The VP code above WILL ONLY BE SHOWN ONCE. <br>
                                    IT MUST BE VISIBLE in the windshield of your vehicle on the driver's side. <br>
                                    If this code is not visible, your vehicle may be...<br>
                                </td>
                            </tr>
                        </tfoot>
                    </table>                  
                    
                    
                </div>              

                
        </div>
    </main>
</x-base-layout>



