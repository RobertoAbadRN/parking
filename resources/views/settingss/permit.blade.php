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
                        <p class="text-sm text-gray-500 dark:text-gray-400">Permit Settings for: <strong
                                class="font-medium text-gray-800 dark:text-white">{{ $property->name }}</strong></p>
                    </div>
                </div>
                <div class="mb-4 border-b">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                        <li class="w-60" @click="openTab = 1" :class="openTab == 1 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-t-lg text-xs">Permit Text (Agreement &
                                Instructions)</button>
                        </li>
                        <li class="w-60" @click="openTab = 2" :class="openTab == 2 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-t-lg text-xs">Permit Layout & Paper Format</button>
                        </li>
                        <li class="w-60" @click="openTab = 3" :class="openTab == 3 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-t-lg text-xs">Print Preview</button>
                        </li>
                        <li class="w-60" @click="openTab = 4" :class="openTab == 4 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-2 rounded-t-lg text-xs">Residents limit Settings</button>
                        </li>
                    </ul>
                </div>

                <div>
                    <div x-show="openTab ==  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div id="message" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                        <p class="text-center mb-6 mt-2 text-blue-500">Here We have the language selection. The
                            selection will allow to create new language as define in the system </p>
                        <label class="relative flex">
                            Select Language:
                            <select
                                class="form-select ml-2 peer w-60 rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                name="language" id="language">
                                <option value="en">EN (English)</option>
                                <option value="es">ES (Spanish)</option>
                            </select>
                        </label>
                        <small class="text-green-500">please create or edit the language</small>
                        <form method="POST" action="{{ route('settings.language.store') }}" name="form-language"
                            id="form-language">
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            @csrf
                            <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                                <div>When Printed the Permit Sticker content will be here. </div>
                                <div>
                                    <p class="mb-2 text-gray-900">Instructions</p>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="w-full border border-gray-500 focus-visible:outline-none field1" required></textarea>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                                <div>Formatted as defined in the "Permit Layout" tab. </div>
                                <div>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="w-full border border-gray-500 focus-visible:outline-none field2" required></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                                <div>On the right you have the option to give some basic instructions to the permit
                                    holder to insure the sticker is placed appropriately in the vehicle. </div>
                                <div>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="w-full border border-gray-500 focus-visible:outline-none field3" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field4" required></textarea>
                                </div>
                            </div>
                            <div class="text-center grid grid-cols-1 mt-2 mb-2 sm:gap-5 lg:gap-6">
                                <div class="text-gray-900">Permit Agreement <br> <span class="text-blue-500"> Permit
                                        agreement Header printed above the rules </span></div>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-2">
                                    <textarea name="" id="" cols="30" rows="5"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field5" required></textarea>
                                    <div class="text-gray-900 text-center mt-2">Permit Agreement Rules</div>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field6" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field7" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field8" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field9" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field10" required></textarea>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field11" required></textarea>
                                    <div class="text-gray-900 text-center mt-2">Permit Agreement Footer</div>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="mt-2 w-full border border-gray-500 focus-visible:outline-none field12" required></textarea>
                                </div>
                                <div class="mt-2 border border-blue-500 bg-blue-500 text-gray-50 text-justify"
                                    style="padding: 20px;">
                                    For your convenience you can use variables in the text.
                                    <br>
                                    All recognised variables will be automatically replace by the proper text before
                                    printing.
                                    <br>
                                    The variable are surrounded with curly braces without space like: {variable_name}
                                    <br>
                                    Variables prefixed "property" refers to your property
                                    <br>
                                    Variables starting with "company" refers to your service provider.
                                    <br>
                                    <strong>AVAILABLE VARIABLES:</strong>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_name}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900 gap-6">{property_address}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_city}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_state}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_country}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_zip}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{property_phone}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_name}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_address}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_city}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_state}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_zip}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_country}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_website}</span>
                                    <br>
                                    <span class="bg-gray-50 text-gray-900">{company_phone}</span>
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
                        </form>
                    </div>
                    <div x-show="openTab ==  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div id="message_print" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                        <form method="POST" action="{{ route('settings.permit.print.store') }}"
                            name="form-permit-print" id="form-permit-print">
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <input type="hidden" name="src" id="src"
                                value="{{ asset('images/imgSetting/') }}">

                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="border-4 border-dashed border-gray-900">
                                        <table style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center text-base text-gray-900">
                                                        <div class="name">
                                                            Property name
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td class="type" colspan="2" class="text-center">
                                                        permit type
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td class="nick" colspan="2" class="text-center">
                                                        Nickname:
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="logo" rowspan="2" class="text-center p-5">
                                                        <img src="{{ asset('images/imgSetting/service.png') }}"
                                                            class="ml-4 img" width="40px" style="margin-top: 1px">
                                                    </td>
                                                    <td class="space" colspan="2"
                                                        class="text-center text-base text-gray-900">
                                                        Space or RSVD: ##
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <table cellpadding="5" cellspacing="10" border="0"
                                                            class="registration">
                                                            <tbody>
                                                                <tr class="border-2 border-gray-900">
                                                                    <td class="license" class="registration">
                                                                        license
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="number" colspan="2">
                                                        <span class="ml-4"> Unit # </span>
                                                    </td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <span class="start_date">From
                                                            <span class="underline decoration-solid">start date</span>
                                                        </span>
                                                        <span class="end_date">To
                                                            <span class="underline decoration-solid">end date</span>
                                                        </span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="name" name="name" class="hidden">
                                                <div
                                                    class="check_1 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Property name</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="type" name="type" class="hidden">
                                                <div
                                                    class="check_2 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Permit Type</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="space" name="space" class="hidden">
                                                <div
                                                    class=" check_3 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Reserved Space</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="nick" name="nick" class="hidden">
                                                <div
                                                    class=" check_3 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Nickname</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="license" name="license" class="hidden">
                                                <div
                                                    class="check_4 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    License/Plate</div>
                                            </label>
                                        </div>
                                        <div>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="number" name="number" class="hidden">
                                                <div
                                                    class="check_5 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Unit Number</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="start_date" name="start_date"
                                                    class="hidden">
                                                <div
                                                    class="check_6 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Start Date</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="end_date" name="end_date"
                                                    class="hidden">
                                                <div
                                                    class="check_7 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    End Date</div>
                                            </label>
                                            <label onchange="check_checked(this)">
                                                <input type="checkbox" id="logo" name="logo" class="hidden">
                                                <div
                                                    class="check_8 p-2 px-2 text-xs bg-red-400 text-white border-b cursor-pointer hover:bg-red-500">
                                                    Logo</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 text-blue-500 text-xs">The layout may differs
                                        from the actual print.</div>
                                    <div class="grid grid-cols-1 gap-4">
                                        <span class="text-xs">
                                            These <span class="bg-blue-400 text-white">ITEMS</span> will be printed on
                                            the permit.
                                            <br>
                                            These <span class="bg-red-400 text-white">ITEMS</span> will NOT be printed
                                            on the permit.
                                        </span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="flex items-center pl-4 dark:border-gray-700">
                                        <label for="bordered-radio"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            <img src="{{ asset('images/imgSetting/property.png') }}" width="50px"
                                                height="50px">
                                        </label>
                                        <input id="bordered-radio-1" type="radio" value="property" name="img"
                                            class="w-4 h-4"
                                            onclick="changeImg('{{ asset('images/imgSetting/property.png') }}')">
                                        <label for="bordered-radio-1"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Property</label>
                                    </div>
                                    <div class="flex items-center pl-4 dark:border-gray-700">
                                        <label for="bordered-radio"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            <img src="{{ asset('images/imgSetting/service.png') }}" width="50px"
                                                height="50px">
                                        </label>
                                        <input id="bordered-radio-2" type="radio" value="service" name="img"
                                            class="w-4 h-4"
                                            onclick="changeImg('{{ asset('images/imgSetting/service.png') }}')">
                                        <label for="bordered-radio-2"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Service
                                            provider</label>
                                    </div>
                                    <div class="flex items-center pl-4 dark:border-gray-700">
                                        <label for="bordered-radio"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            <img src="{{ asset('images/imgSetting/default.png') }}" width="50px"
                                                height="50px">
                                        </label>
                                        <input id="bordered-radio-3" type="radio" value="default" name="img"
                                            class="w-4 h-4"
                                            onclick="changeImg('{{ asset('images/imgSetting/default.png') }}')">
                                        <label for="bordered-radio-3"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default</label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 text-gray-900 text-lg">
                                <p class="text-center">Permit Paper format</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <div
                                        class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="mt-2 mb-2">
                                                <img src="{{ asset('images/ppm-1-tl.jpg') }}" width="100"
                                                    class="border-4 border-double border-gray-800">
                                            </div>
                                            <div>
                                                <input id="bordered-radio-ppm1" type="radio" value="ppm1"
                                                    name="ppm" class="w-4 h-4">
                                                <label for="bordered-radio-ppm1"
                                                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                    PPM-1
                                                </label>
                                                <br>
                                                <small class="text-xs">Paper sheet with Permit on the top left. The
                                                    permit is removed from the paper at the perforations and peel the
                                                    liner to reveal the glue. </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="mt-2 mb-2">
                                                <img src="{{ asset('images/ppm-2-bl.jpg') }}" width="100"
                                                    class="border-4 border-double border-gray-800">
                                            </div>
                                            <div>
                                                <input id="bordered-radio-ppm2" type="radio" value="ppm2"
                                                    name="ppm" class="w-4 h-4">
                                                <label for="bordered-radio-ppm2"
                                                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                    PPM-2
                                                </label>
                                                <br>
                                                <small class="text-xs">Paper sheet with Permit on the top left. The
                                                    permit is removed from the paper at the perforations and peel the
                                                    liner to reveal the glue. </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3 text-center">
                                <button type="submit"
                                    class="btn btn-submit bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                                    {{ $setting ? '' : 'disabled' }}>
                                    Save Permit
                                </button>
                                <button type="button"
                                    class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                                    onclick="window.location.href='{{ route('settings') }}'">
                                    Cancel
                                </button>
                            </div>
                        </form>

                    </div>

                    <div x-show="openTab ==  3"
                        class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-lg shadow-indigo-500/40">
                        <div class="grid grid-cols-1 p-5">
                            <div id="message_margin" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                            <form method="POST" action="{{ route('settings.permit.margin.store') }}"
                                name="form-permit-margin" id="form-permit-margin">
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                @csrf
                                <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                                    <div>
                                        Left margin:
                                        <input type="number" name="margin_left" id="margin_left" min="-10"
                                            max="10" value="0"
                                            class="btn btn-submit bg-gray-200 ml-3 font-medium text-gray-900">
                                        <br>
                                        <small class="text-blue-500">reduce to move LEFT or increase to move
                                            RIGHT</small>
                                    </div>
                                    <div>
                                        Top margin:
                                        <input type="number" name="margin_top" id="margin_top" min="-10"
                                            max="10" value="0"
                                            class="btn btn-submit bg-gray-200 ml-3 font-medium text-gray-900">
                                        <br>
                                        <small class="text-blue-500">reduce to move UP or increase to move DOWN</small>
                                    </div>
                                </div>
                                <div class=" mt-3 text-center">
                                    <button type="submit"
                                        class="btn btn-submit bg-warning ml-3 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"
                                        {{ !$setting ? 'disabled' : '' }}>
                                        Save Margnis
                                    </button>
                                    <button type="button"
                                        class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90"
                                        onclick="print()" {{ $setting ? '' : 'disabled' }}>
                                        Print Permit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="print_content_permit">
                            <div class="grid grid-cols-2">
                                <div class="border-4 border-gray-900 bg-gray-400 p-10">
                                    <div class="bg-white w-60" style="left: 0em; top: 0em;">
                                        <table style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center text-base text-gray-900">
                                                        <div class="name">
                                                            Property name
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td class="type" colspan="2" class="text-center">
                                                        permit type
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td class="nick" colspan="2" class="text-center">
                                                        Nick name:
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                
                                                <tr>
                                                    <td class="logo" rowspan="2" class="text-center p-5">
                                                        <img src="{{ asset('images/imgSetting/service.png') }}"
                                                            width="40px" class="ml-4 img" style="margin-top: 1px">
                                                    </td>

                                                    <td class="space" colspan="2"
                                                        class="text-center text-base text-gray-900">
                                                        Space or RSVD: ##
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <table cellpadding="5" cellspacing="10" border="0"
                                                            class="registration">
                                                            <tbody>
                                                                <tr class="border-2 border-gray-900">
                                                                    <td class="license" class="registration">
                                                                        license
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="number" colspan="2">
                                                        <span class="ml-4"> Unit # </span>
                                                    </td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <span class="start_date">From
                                                            <span class="underline decoration-solid">start date</span>
                                                        </span>
                                                        <span class="end_date">To
                                                            <span class="underline decoration-solid">end date</span>
                                                        </span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="border-4 border-red-500 bg-blue-300">
                                    <div class="grid grid-cols-1 text-xs">
                                        <div id="instructions">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 p-5">
                                <p class="text-center text-gray-900 text-2xl mt-1 mb-2">Permit Agreement</p>
                                <div class="grid grid-cols-1 border-2 border-orange-500">
                                    <div class="bg-white text-xs">
                                        <div id="preview_permit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div x-show="openTab == 4" class="tabs flex flex-col">
                        <div
                            class="w-full max-w-screen-md p-4 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-lg shadow-indigo-500/40">
                            <div id="message_margin" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                            @if (Session::has('success'))
                                <div class="alert alert-success mt-4">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('resident.settings.store') }}">
                                <input type="hidden" name="property_code" value="{{ $property->id }}">
                                @csrf

                                <div class="mb-4 flex">
                                    <label for="vehicles_per_apartment"
                                        class="block font-medium text-gray-500 mr-4">Vehicles per apartment</label>
                                    <input type="number" name="vehicles_per_apartment"
                                        class="mt-0 p-2 border rounded-md"
                                        value="{{ old('vehicles_per_apartment', $formValues['vehicles_per_apartment']) }}">

                                </div>

                                <!-- Agrega más campos de formulario aquí según sea necesario -->

                                <div class="mb-4 flex">
                                    <label class="block font-medium text-gray-500 mr-4">Tenants can change
                                        information?</label>
                                    <select name="tenants_change_info" id="tenants_change_info"
                                        class="mt-0 p-2 border rounded-md">
                                        <option value="YES"
                                            {{ old('tenants_change_info', $formValues['tenants_change_info']) === 'YES' ? 'selected' : '' }}>
                                            YES</option>
                                        <option value="NO"
                                            {{ old('tenants_change_info', $formValues['tenants_change_info']) === 'NO' ? 'selected' : '' }}>
                                            NO</option>
                                    </select>
                                </div>


                                <!-- Agrega más campos de formulario aquí según sea necesario -->

                                <div class="mb-4 flex">
                                    <label for="notify_on_tenants_info"
                                        class="block font-medium text-gray-500 mr-4">Notify on tenants
                                        information?</label>
                                    <select name="notify_on_tenants_info" id="notify_on_tenants_info"
                                        class="mt-0 p-2 border rounded-md">
                                        <option value="YES"
                                            {{ old('notify_on_tenants_info', $formValues['notify_on_tenants_info']) === 'YES' ? 'selected' : '' }}>
                                            YES</option>
                                        <option value="NO"
                                            {{ old('notify_on_tenants_info', $formValues['notify_on_tenants_info']) === 'NO' ? 'selected' : '' }}>
                                            NO</option>
                                    </select>
                                </div>


                                <!-- Agrega más campos de formulario aquí según sea necesario -->

                                <div class="mb-4 flex">
                                    <label for="maximum_of_changes_allowed"
                                        class="block font-medium text-gray-500 mr-4">Maximum of changes allowed</label>
                                    <input type="number" name="maximum_of_changes_allowed"
                                        class="mt-0 p-2 border rounded-md"
                                        value="{{ old('maximum_of_changes_allowed', $formValues['maximum_of_changes_allowed']) }}">
                                </div>


                                <div class="mb-4 flex">
                                    <label for="reserved_spot_allow"
                                        class="block font-medium text-gray-500 mr-4">Allow Reserved spot</label>
                                    <select name="reserved_spot_allow" id="reserved_spot_allow"
                                        class="mt-0 p-2 border rounded-md">
                                        <option value="YES"
                                            {{ old('reserved_spot_allow', $formValues['reserved_spot_allow']) === 'YES' ? 'selected' : '' }}>
                                            YES</option>
                                        <option value="NO"
                                            {{ old('reserved_spot_allow', $formValues['reserved_spot_allow']) === 'NO' ? 'selected' : '' }}>
                                            NO</option>
                                    </select>
                                </div>


                                <div class="mb-4 flex">
                                    <label for="reserved_spot_per_apartment"
                                        class="block font-medium text-gray-500 mr-4"># Reserved spot allow per
                                        apartment</label>
                                    <input type="number" name="reserved_spot_per_apartment"
                                        class="mt-0 p-2 border rounded-md"
                                        value="{{ old('reserved_spot_per_apartment', $formValues['reserved_spot_per_apartment']) }}">
                                </div>

                                <!-- Agrega más campos de formulario aquí según sea necesario -->

                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                            </form>




                        </div>
                    </div>










                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            languageSetting('en');
            $('body').on('change', '#language', function() {
                languageSetting($(this).val());
            });

            $("#form-language").validate({
                errorClass: 'border-red-500 text-red-500',
                validClass: 'border-green-500 text-green-500'
            });

            $("#form-language").submit(function(event) {
                event.preventDefault();
                $('.btn-submit').prop("disabled", true);
                axios.post('{{ route('settings.language.store') }}', $(this).serialize(), {}).then(
                    response => {
                        if (response.data.success) {
                            var language = $('#language').val();
                            languageSetting(language);
                            $('#message').removeClass('hidden').addClass('bg-green-500').text(
                                `${response.data.message}`);
                            setTimeout(function() {
                                $('#message').addClass('hidden').text('');
                            }, 5000);
                        }

                        if (!response.data.success) {
                            $('#message').removeClass('hidden').addClass('bg-red-500').text(
                                `${response.data.message}`);
                            setTimeout(function() {
                                $('#message').addClass('hidden').text('');
                            }, 5000);
                        }
                        $('.btn-submit').prop("disabled", false);

                    }).catch(error => {
                    console.log(error.response);
                    $('.btn-submit').prop("disabled", false);
                });
            });

            $("#form-permit-margin").submit(function(event) {
                event.preventDefault();
                $('.btn-submit').prop("disabled", true);
                axios.post('{{ route('settings.permit.margin.store') }}', {
                    property_id: '{{ $property->id }}',
                    margin_top: $('#margin_top').val(),
                    margin_left: $('#margin_left').val(),
                }).then(response => {
                    if (response.data.success) {
                        languageSetting($('#language').val());
                        $('#message_margin').removeClass('hidden').addClass('bg-green-500').text(
                            `${response.data.message}`);
                        setTimeout(function() {
                            $('#message_margin').addClass('hidden').text('');
                        }, 5000);
                    }

                    if (!response.data.success) {
                        $('#message_margin').removeClass('hidden').addClass('bg-red-500').text(
                            `${response.data.message}`);
                        setTimeout(function() {
                            $('#message_margin').addClass('hidden').text('');
                        }, 5000);
                    }
                    $('.btn-submit').prop("disabled", false);

                }).catch(error => {
                    console.log(error.response);
                    $('.btn-submit').prop("disabled", false);
                });
            });
            $("#form-permit-print").submit(function(event) {
                event.preventDefault();
                $('.btn-submit').prop("disabled", true);
                axios.post('{{ route('settings.permit.print.store') }}', $(this).serialize(), {}).then(
                    response => {
                        if (response.data.success) {
                            languageSetting($('#language').val());
                            $('#message_print').removeClass('hidden').addClass('bg-green-500').text(
                                `${response.data.message}`);
                            setTimeout(function() {
                                $('#message_print').addClass('hidden').text('');
                            }, 5000);
                        }

                        if (!response.data.success) {
                            $('#message_print').removeClass('hidden').addClass('bg-red-500').text(
                                `${response.data.message}`);
                            setTimeout(function() {
                                $('#message_print').addClass('hidden').text('');
                            }, 5000);
                        }
                        $('.btn-submit').prop("disabled", false);

                    }).catch(error => {
                    console.log(error.response);
                    $('.btn-submit').prop("disabled", false);
                });
            });
        });

        function languageSetting(lan) {
            axios.post('{{ route('settings.language') }}', {
                property: '{{ $property->id }}',
                language: lan
            }).then(response => {
                if (response.data.success) {
                    for (let index = 1; index <= 12; index++) {
                        if (lan == 'en') {
                            $('.field' + index).attr('name', 'camp_en_' + index).val();
                        }
                        if (lan == 'es') {
                            $('.field' + index).attr('name', 'camp_es_' + index).val();
                        }
                    }
                    if (response.data.propertySetting) {
                        $('#margin_top').val(response.data.propertySetting.margin_top);
                        $('#margin_left').val(response.data.propertySetting.margin_left);
                        if (response.data.propertySetting.ppm == 'ppm1') {
                            $('#bordered-radio-ppm1').prop('checked', true);
                        }
                        if (response.data.propertySetting.ppm == 'ppm2') {
                            $('#bordered-radio-ppm2').prop('checked', true);
                        }
                        var src = $('#src').val() + '/';
                        if (response.data.propertySetting.img == 'property') {
                            $('#bordered-radio-1').prop('checked', true);
                            var obj = src + response.data.propertySetting.img + '.png';
                            $('.img').attr('src', obj);
                        }
                        if (response.data.propertySetting.img == 'service') {
                            $('#bordered-radio-2').prop('checked', true);
                            var obj = src + response.data.propertySetting.img + '.png';
                            $('.img').attr('src', obj);
                        }

                        if (response.data.propertySetting.img == 'default') {
                            $('#bordered-radio-3').prop('checked', true);
                            var obj = src + response.data.propertySetting.img + '.png';
                            $('.img').attr('src', obj);
                        }

                        $('.name').hide();
                        $('.type').hide();
                        $('.space').hide();
                        $('.nick').hide();
                        $('.license').hide();
                        $('.number').hide();
                        $('.start_date').hide();
                        $('.end_date').hide();
                        $('.logo').hide();
                        if (response.data.propertySetting.name == 1) {
                            $('.check_1').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.name').show();
                            $('#name').prop('checked', true);
                        }
                        if (response.data.propertySetting.type == 1) {
                            $('.check_2').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.type').show();
                            $('#type').prop('checked', true);

                        }
                        if (response.data.propertySetting.space == 1) {
                            $('.check_3').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.space').show();
                            $('#space').prop('checked', true);
                        }
                        if (response.data.propertySetting.license == 1) {
                            $('.check_4').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.license').show();
                            $('#license').prop('checked', true);
                        }
                        if (response.data.propertySetting.number == 1) {
                            $('.check_5').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.number').show();
                            $('#number').prop('checked', true);
                        }
                        if (response.data.propertySetting.start_date == 1) {
                            $('.check_6').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.start_date').show();
                            $('#start_date').prop('checked', true);
                        }
                        if (response.data.propertySetting.end_date == 1) {
                            $('.check_7').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.end_date').show();
                            $('#end_date').prop('checked', true);
                        }
                        if (response.data.propertySetting.logo == 1) {
                            $('.check_8').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.logo').show();
                            $('#logo').prop('checked', true);
                        }
                        if (response.data.propertySetting.logo == 1) {
                            $('.check_9').removeClass('bg-red-400').addClass('bg-blue-400');
                            $('.nick').show();
                            $('#nick').prop('checked', true);
                        }

                        if (lan == 'en') {
                            $('.field1').val(response.data.propertySetting.camp_en_1);
                            $('.field2').val(response.data.propertySetting.camp_en_2);
                            $('.field3').val(response.data.propertySetting.camp_en_3);
                            $('.field4').val(response.data.propertySetting.camp_en_4);
                            $('.field5').val(response.data.propertySetting.camp_en_5);
                            $('.field6').val(response.data.propertySetting.camp_en_6);
                            $('.field7').val(response.data.propertySetting.camp_en_7);
                            $('.field8').val(response.data.propertySetting.camp_en_8);
                            $('.field9').val(response.data.propertySetting.camp_en_9);
                            $('.field10').val(response.data.propertySetting.camp_en_10);
                            $('.field11').val(response.data.propertySetting.camp_en_11);
                            $('.field12').val(response.data.propertySetting.camp_en_12);
                        }
                        if (lan == 'es') {
                            $('.field1').val(response.data.propertySetting.camp_es_1);
                            $('.field2').val(response.data.propertySetting.camp_es_2);
                            $('.field3').val(response.data.propertySetting.camp_es_3);
                            $('.field4').val(response.data.propertySetting.camp_es_4);
                            $('.field5').val(response.data.propertySetting.camp_es_5);
                            $('.field6').val(response.data.propertySetting.camp_es_6);
                            $('.field7').val(response.data.propertySetting.camp_es_7);
                            $('.field8').val(response.data.propertySetting.camp_es_8);
                            $('.field9').val(response.data.propertySetting.camp_es_9);
                            $('.field10').val(response.data.propertySetting.camp_es_10);
                            $('.field11').val(response.data.propertySetting.camp_es_11);
                            $('.field12').val(response.data.propertySetting.camp_es_12);
                        }

                        $('#instructions').html(function() {
                            var htmlt_int = '';

                            if (lan == 'es') {
                                htmlt_int +=
                                    `<p class="text-center text-2xl text-gray-900  mt-5">Instrucciones</p>`;
                                htmlt_int += `<ul class="list-disc ml-5 p-5 text-gray-950">`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_es_1}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_es_2}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_es_3}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_es_4}</li>`;
                                htmlt_int += `</ul>`;
                            }
                            if (lan == 'en') {
                                htmlt_int +=
                                    `<p class="text-center text-2xl text-gray-900  mt-5">Instructions</p>`;
                                htmlt_int += `<ul class="list-disc ml-5 p-5 text-gray-950">`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_en_1}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_en_2}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_en_3}</li>`;
                                htmlt_int += `<li>${response.data.propertySetting.camp_en_4}</li>`;
                                htmlt_int += `</ul>`;
                            }
                            return htmlt_int;
                        });

                        $('#preview_permit').html(function() {
                            var html = '';
                            if (lan == 'es') {
                                html += `<span>${response.data.propertySetting.camp_es_5}</span>`;
                                html += `<br>`;
                                html += `<ul class="list-disc p-5">`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_6}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_7}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_8}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_9}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_10}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_es_11}</li>`;
                                html += `</ul>`;
                                html += `<span>${response.data.propertySetting.camp_es_12}</span>`;
                                html += `<div style="padding-top: 5em">
                                        <table width="99%" cellpadding="5" cellspacing="2">
                                            <tbody>
                                                <tr>
                                                    <td width="205"><span class="center_txt">{owner_name}</span></td>
                                                    <td width="60" class="center_txt">{unit_number}</td>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="210"></td>
                                                    <td width="95">{print_date}</td>
                                                </tr>
                                                <tr>
                                                    <td width="205" class="border-t border-gray-800">
                                                        <span class="center_txt">Resident's Printed Name</span>
                                                    </td>
                                                    <td width="60" class="center_txt border-t border-gray-800">Unit #</td>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="210" class="border-t border-gray-800">
                                                        <span class="center_txt">Signature</span>
                                                    </td>
                                                    <td width="95" class="border-t border-gray-800">
                                                        <span class="center_txt">Date</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>`;
                            }
                            if (lan == 'en') {
                                html += `<span>${response.data.propertySetting.camp_en_5}</span>`;
                                html += `<br>`;
                                html += `<ul class="list-disc p-5">`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_6}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_7}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_8}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_9}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_10}</li>`;
                                html += `<li class="mb-1">${response.data.propertySetting.camp_en_11}</li>`;
                                html += `</ul>`;
                                html += `<span>${response.data.propertySetting.camp_en_12}</span>`;
                                html += `<div style="padding-top: 5em">
                                        <table width="99%" cellpadding="5" cellspacing="2">
                                            <tbody>
                                                <tr>
                                                    <td width="205"><span class="center_txt">{owner_name}</span></td>
                                                    <td width="60" class="center_txt">{unit_number}</td>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="210"></td>
                                                    <td width="95">{print_date}</td>
                                                </tr>
                                                <tr>
                                                    <td width="205" class="border-t border-gray-800">
                                                        <span class="center_txt">Resident's Printed Name</span>
                                                    </td>
                                                    <td width="60" class="center_txt border-t border-gray-800">Unit #</td>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="210" class="border-t border-gray-800">
                                                        <span class="center_txt">Signature</span>
                                                    </td>
                                                    <td width="95" class="border-t border-gray-800">
                                                        <span class="center_txt">Date</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>`;
                            }
                            return html;
                        });
                    }
                }
            }).catch(error => {
                console.log(error.response);
            });
        }

        function print() {
            $("#print_content_permit").printArea();
        }

        function check_checked(obj) {
            var child_id = $(obj).children(':input').prop('id');
            var is_checked = $(obj).children(':input').prop('checked');
            console.log(div);
            var label = $(obj).text();
            if (is_checked == true) {
                $('.' + child_id).show();
                var div = $(obj).children('div').removeClass('bg-red-400').addClass('bg-blue-400');
            } else {
                var div = $(obj).children('div').removeClass('bg-blue-400').addClass('bg-red-400');
                $('.' + child_id).hide();
            }
        }

        function changeImg(obj) {
            $('.img').attr('src', obj);
        }
    </script>
</x-app-layout>
