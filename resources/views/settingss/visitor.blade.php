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
                    <p class="text-sm text-gray-500 dark:text-gray-400">Visitors Pass Settings For: <strong class="font-medium text-gray-800 dark:text-white">{{$property->address}}</strong></p>
                </div>
            </div>
            <div class="mb-4 border-b">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="w-80" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Form Fields</button>
                    </li>
                    <li class="w-80" @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Settings</button>
                    </li>
                    <li class="w-80" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Form Preview</button>
                    </li>
                </ul>
            </div>
            <div>
                <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <div id="message_form" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-gray-900 text-base">Fields to show on the form <br> <span class="text-gray-500 text-xs"> Selected fields will be shown on the form </span></div>
                        <div class="text-gray-900 text-base">Field is mandatory/required <br> <span class="text-gray-500 text-xs"> Selected field will need to be filled to submit the form  </span></div>
                        <div class="text-gray-900 text-base">Field is use for validation <br> <span class="text-gray-500 text-xs"> Selected field will have to match the resident's record for the visitor's pass to be accepted or be unique </span></div>
                    </div>
                    <form method="POST" action="{{ route('settings.visitor.store') }}" name="form-visitor" id="form-visitor">
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <input type="hidden" name="action" value="form">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">
                                <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="visitor_name" name="visitor_name" class="form-control-sm display-me ">
                                        Visitor's Name
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="visitor_email" name="visitor_email"  class="form-control-sm display-me ">
                                        Visitor's Email
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="visitor_phone" name="visitor_phone"  class="form-control-sm display-me ">
                                        Visitor's Phone
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="visitor_language" name="visitor_language"  class="form-control-sm display-me ">
                                        Visitor's Language
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="vin" name="vin"  class="form-control-sm display-me ">
                                        VIN
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="license_plate" name="license_plate"  class="form-control-sm display-me ">
                                        License Plate
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="year" name="year"  class="form-control-sm display-me ">
                                        Year
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="make" name="make"  class="form-control-sm display-me ">
                                        Make
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="model" name="model"  class="form-control-sm display-me ">
                                        Model
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="color" name="color"  class="form-control-sm display-me ">
                                        Color
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="vehicle_type" name="vehicle_type"  class="form-control-sm display-me ">
                                        Vehicle Type
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="resident_name" name="resident_name"  class="form-control-sm display-me ">
                                        Resident's Name
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="resident_unit_number" name="resident_unit_number"  class="form-control-sm display-me ">
                                        Resident's Unit Number
                                    </label>
                                </div>

                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="resident_email" name="resident_email"  class="form-control-sm display-me ">
                                        Resident's Email
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="resident_phone" name="resident_phone"  class="form-control-sm display-me ">
                                        Resident's phone
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="resident_registration" name="resident_registration"  class="form-control-sm display-me ">
                                        Resident's  Registration
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_checked(this)">
                                        <input type="checkbox" id="valid_form" name="valid_form"  class="form-control-sm display-me ">
                                        Valid From
                                    </label>
                                </div>
                            </div>

                            <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">
                                <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_visitor_name" name="required_visitor_name"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_visitor_email" name="required_visitor_email"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_visitor_phone" name="required_visitor_phone"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_visitor_language" name="required_visitor_language"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_vin" name="required_vin"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_license_plate" name="required_license_plate"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_year" name="required_year"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_make" name="required_make"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_model" name="required_model"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_color" name="required_color"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_vehicle_type" name="required_vehicle_type"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_resident_name" name="required_resident_name"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_resident_unit_number" name="required_resident_unit_number"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_resident_email" name="required_resident_email"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_resident_phone" name="required_resident_phone"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_resident_registration" name="required_resident_registration"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_required(this)">
                                        <input type="checkbox" id="required_valid_form" name="required_valid_form"  class="form-control-sm display-me ">
                                        Field is Required
                                    </label>
                                </div>
                            </div>
                            <div class="text-gray-900 text-sm" style="padding: 0px 0px 0px 45px;">
                                <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

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
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_validation(this)">
                                        <input type="checkbox" id="validation_resident_name" name="validation_resident_name"  class="form-control-sm display-me ">
                                        Use for Validation
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_validation(this)">
                                        <input type="checkbox" id="validation_resident_unit_number" name="validation_resident_unit_number"  class="form-control-sm display-me ">
                                        Use for Validation
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_validation(this)">
                                        <input type="checkbox" id="validation_resident_email" name="validation_resident_email"  class="form-control-sm display-me ">
                                        Use for Validation
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_validation(this)">
                                        <input type="checkbox" id="validation_resident_phone" name="validation_resident_phone"  class="form-control-sm display-me ">
                                        Use for Validation
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 mt-8 gap-4 sm:gap-5 lg:gap-6">
                                    <label onchange="check_validation(this)">
                                        <input type="checkbox" id="validation_resident_registration" name="validation_resident_registration"  class="form-control-sm display-me ">
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
                <div x-show="openTab ===  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-center mb-6 mt-2 text-blue-500 text-lg">Visitors Pass Limit Settings</p>
                    <div id="message_setting" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                    <form method="POST" action="{{ route('settings.visitor.store') }}" name="form-visitor-setting" id="form-visitor-setting">
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <input type="hidden" name="action" value="setting">
                        @csrf
                        <div class="grid grid-cols-3 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div colspan="2">Total Visitor's Pass Available:</div>
                            <div><input
                                class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80"
                                placeholder="20" type="text" name="total" id="total" required /></div>
                        </div>
                        <div class="grid grid-cols-3 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div colspan="2">Duration (Hrs):</div>
                            <div><input
                                class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80"
                                placeholder="15" type="text" name="hours" id="hours" required /></div>
                        </div>
                        <div class="grid grid-cols-3 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div colspan="2">Limit per Vehicle:</div>
                            <div><input
                                class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80"
                                placeholder="12" type="text" name="limit" id="limit" required /></div>
                        </div>
                        <div class="grid grid-cols-3 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div colspan="2">Registration limit (days):</div>
                            <div><input
                                class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80"
                                placeholder="10" type="text" name="days" id="days" required /></div>
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
                    <p class="text-center mb-6 mt-2 text-blue-500 text-lg">Visitors Pass <br>Fields<span class="text-red-500 text-lg"> in RED will require to be filled to submit the form</span></p>
                    <div id="form-div">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        settingsVisitor('form');
        settingsVisitor('setting');
        $("#form-visitor-setting").validate({
            errorClass:'border-red-500 text-red-500',
            validClass:'border-green-500 text-green-500'
        });

        $("#form-visitor").submit(function( event ) {
            event.preventDefault();
            $('.btn-submit').prop("disabled", true);
            axios.post('{{ route('settings.visitor.store') }}', $(this).serialize(),{
            }).then(response => {
                if(response.data.success) {
                    settingsVisitor('form')
                    $('#form-div').html('');
                    $('#message_form').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message_form').addClass('hidden').text('');
                    }, 5000);
                }
                if(!response.data.success) {
                    $('#message_form').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message_form').addClass('hidden').text('');
                    }, 5000);
                }
                $('.btn-submit').prop("disabled", false);

            }).catch(error => {
                console.log(error.response);
                $('.btn-submit').prop("disabled", false);
            });
        });
        $("#form-visitor-setting").submit(function( event ) {
            event.preventDefault();
            $('.btn-submit').prop("disabled", true);
            axios.post('{{ route('settings.visitor.store') }}', $(this).serialize(),{
            }).then(response => {
                if(response.data.success) {
                    settingsVisitor('setting')
                    $('#message_setting').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message_setting').addClass('hidden').text('');
                    }, 5000);
                }
                if(!response.data.success) {
                    $('#message_setting').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message_setting').addClass('hidden').text('');
                    }, 5000);
                }
                $('.btn-submit').prop("disabled", false);

            }).catch(error => {
                console.log(error.response);
                $('.btn-submit').prop("disabled", false);
            });
        });
    });

    function  settingsVisitor(type) {
        axios.post('{{ route('settings.visitor.store') }}',{
                property_id:   '{{$property->id}}',
                type:  type
            }).then(response => {
                if(response.data.success) {
                    $.each(response.data.form, function (index, field) {
                        if(field.type == type) {
                            $('#'+field.name).prop('checked', field.valor == 1 ? true : false);
                        }
                        if(field.type == type) {
                            $('#'+field.name).val(field.valor);
                        }
                    });
                    $.each(response.data.view_form, function (index, field) {
                        if(field.type == type) {
                            $('#'+field.name).prop('checked', field.valor == 1 ? true : false);
                            var class_child = '';
                            var message = '';
                            if (field.name == field.name && field.valor == 1){
                                var label = $('#'+field.name).parent().text();
                                var child_id = field.name;
                                var valid = $('#validation_'+ child_id).prop('checked');
                                var req = $('#required_'+ child_id).prop('checked');

                                if(req){
                                    class_child = 'text-red-500 ';
                                    message = 'Field is Required';
                                }
                                if(req && valid) {
                                    class_child +=' validation_'+child_id;
                                    message = 'Field is required and use for validation';
                                }

                                $('#form-div').append(function(){
                                    var html = `<div class="grid grid-cols-3 gap-4 ${child_id}">
                                                    <div class="form-input peer w-full rounded-lg px-3 py-2 text-gray-900">${label}</div>
                                                    <div class="">
                                                        <input class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80" type="text"/>
                                                        <small class="text-left px-1 small_${child_id} ${class_child}">${message}</small>
                                                    </div>
                                                </div>`;
                                    return html;
                                });
                            }
                        }
                    });
                }
            }).catch(error => {
                console.log(error.response);
            });
    }

    function check_checked(obj){
        var child_id = $(obj).children(':input').prop('id');
        var is_checked = $(obj).children(':input').prop('checked');
        var label = $(obj).text();
        if(is_checked === true){
            $('#required_'+ child_id).prop('checked', true);
            $('#validation_'+ child_id).prop('checked', true);

            var class_child = 'text-red-500 ';
            var message = '';
            var valid = $('#validation_'+ child_id).prop('checked');
            var req = $('#required_'+ child_id).prop('checked');

            if(req) {
                class_child +='required_'+child_id;
                message = 'Field is Required';
            }
            if(req && valid) {
                class_child +=' validation_'+child_id;
                message = 'Field is required and use for validation';
            }
            $('#form-div').append(function(){
                var html = `<div class="grid grid-cols-3 gap-4 ${child_id}">
                                <div class="form-input peer w-full rounded-lg px-3 py-2 text-gray-900">${label}</div>
                                <div class="">
                                    <input class="form-input peer w-full rounded-lg px-3 py-2 border border-gray-80" type="text"/>
                                    <small class="text-left px-1 small_${child_id} ${class_child}">${message}</small>
                                </div>
                            </div>`;
                return html;
            });
        } else {
            $('.'+child_id).remove();
            $('#required_'+ child_id).prop('checked', false);
            $('#validation_'+ child_id).prop('checked', false);
        }
    }

    function check_required(obj){
        var child_id = $(obj).children(':input').prop('id');
        var is_checked = $(obj).children(':input').prop('checked');
        class_child = child_id.split('required_').join('.small_');

        if(is_checked === true){
            class_child_check = child_id.split('required_').join('#validation_');
            var valid = $(class_child_check).prop('checked');
            message = 'Field is required';
            if(valid) {
                message = 'Field is required and use for validation';
            }
            $(class_child).addClass('text-red-500').addClass(child_id).removeClass('text-gray-500').text(message);
        } else {
            class_child_check = child_id.split('required_').join('#validation_');
            var valid = $(class_child_check).prop('checked');
            message = 'Field not required';
            if(valid) {
                message = 'Field not required and use for validation';
                $(class_child).removeClass(child_id).text(message);
                return;
            }
            $(class_child).removeClass('text-red-500').removeClass(child_id).addClass('text-gray-500').text(message);
        }
    }

    function check_validation(obj){
        var child_id = $(obj).children(':input').prop('id');
        var is_checked = $(obj).children(':input').prop('checked');
        class_child = child_id.split('validation_').join('.small_');
        if(is_checked === true){
            class_child_check = child_id.split('validation_').join('#required_');
            var req = $(class_child_check).prop('checked');
            message = 'Use for validation';
            if(req) {
                message = 'Field is required and use for validation';
            }
            $(class_child).addClass('text-red-500').addClass(child_id).text(message);
        } else {
            class_child_check = child_id.split('validation_').join('#required_');
            var req = $(class_child_check).prop('checked');
            message = 'Field not required';
            if(req) {
                message = 'Field is required';
            }
            $(class_child).removeClass(child_id).text(message);
        }
    }
    </script>
</x-app-layout>

