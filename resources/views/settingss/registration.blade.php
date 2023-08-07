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
                        <p class="text-sm text-gray-500 dark:text-gray-400">Pre Registration Settings For: <strong class="font-medium text-gray-800 dark:text-white">{{$property->address}}</strong></p>
                    </div>
                </div>
                <div class="mb-4 border-b">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                        <li class="w-80" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-4 rounded-t-lg">Form Fields</button>
                        </li>
                        <li class="w-80" @click="openTab = 3" :class="openTab === 2 ? activeClasses : inactiveClasses">
                            <button class="inline-block p-4 rounded-t-lg">Form Preview</button>
                        </li>
                    </ul>
                </div>
                <div>
                    <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-gray-900 text-base">Fields to show on the form <br> <span class="text-gray-500 text-xs"> Selected fields will be shown on the form </span></div>
                            <div class="text-gray-900 text-base">Field is mandatory/required <br> <span class="text-gray-500 text-xs"> Selected field will need to be filled to submit the form  </span></div>
                            <div class="text-gray-900 text-base">Field is use for validation <br> <span class="text-gray-500 text-xs"> Selected field will have to match the resident's record for the visitor's pass to be accepted or be unique </span></div>
                        </div>
                        <form method="POST" action="{{ route('settings.visitor.store') }}" name="form-visitor" id="form-visitor">
                            <input type="hidden" name="property_id" value="{{$property->id}}">
                            @csrf
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_name" name="pre_name"  class="form-control-sm display-me ">
                                            Resident's Name
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_email" name="pre_email"  class="form-control-sm display-me ">
                                           Email
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_phone" name="pre_phone"  class="form-control-sm display-me ">
                                           phone
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_apart_unit" name="pre_apart_unit"  class="form-control-sm display-me ">
                                            Apart/Unit
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_language" name="pre_language"  class="form-control-sm display-me ">
                                            Language
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_license_plate" name="pre_license_plate"  class="form-control-sm display-me ">
                                            License Plate
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_vin" name="pre_vin"  class="form-control-sm display-me ">
                                            VIN
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_make" name="pre_make"  class="form-control-sm display-me ">
                                            Make
                                        </label>
                                    </div>

                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_model" name="pre_model"  class="form-control-sm display-me ">
                                            Model
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_year" name="pre_year"  class="form-control-sm display-me ">
                                            Year
                                        </label>
                                    </div>

                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_color" name="pre_color"  class="form-control-sm display-me ">
                                            Color
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="pre_vehicle_type" name="pre_vehicle_type"  class="form-control-sm display-me ">
                                            Vehicle Type
                                        </label>
                                    </div>
                                </div>

                                <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">

                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_visitor_email" name="required_visitor_email"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_visitor_phone" name="required_visitor_phone"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_visitor_language" name="required_visitor_language"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_vin" name="required_vin"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_license_plate" name="required_license_plate"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_year" name="required_year"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_make" name="required_make"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_model" name="required_model"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_color" name="required_color"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_vehicle_type" name="required_vehicle_type"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_resident_name" name="required_resident_name"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_resident_unit_number" name="required_resident_unit_number"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_resident_email" name="required_resident_email"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_resident_phone" name="required_resident_phone"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_resident_registration" name="required_resident_registration"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="required_valid_form" name="required_valid_form"  class="form-control-sm display-me ">
                                            Field is Required
                                        </label>
                                    </div>
                                </div>
                                <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">

                                    </div>
                                    <div class="grid grid-cols-1 mt-1 gap-4 sm:gap-5 lg:gap-6">
                                        <label onchange="check_checked(this)">
                                            <input type="checkbox" id="validation_resident_email" name="validation_resident_email"  class="form-control-sm display-me ">
                                            Use for Validation
                                        </label>
                                    </div>
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
                    <div x-show="openTab ===  3" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    function check_checked(obj){
        var child_id = $(obj).children(':input').prop('id');
                var is_checked = $(obj).children(':input').prop('checked');
                var div_id = '.div_field_'+ child_id ;
                console.log(child_id);
                console.log(is_checked);
                console.log(div_id);
                if(is_checked === true){
                    $('#required_'+ child_id).prop('checked', true);
                    $('#validation_'+ child_id).prop('checked', true);
                } else {
                    $('#required_'+ child_id).prop('checked', false);
                    $('#validation_'+ child_id).prop('checked', false);
                }

    }
    </script>
    </x-app-layout>

