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
                    <div id="message" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                    <p class="text-center mb-6 mt-2 text-blue-500">Here We have the language selection. The selection will allow to create new language as define in the system </p>
                    <label class="relative flex">
                        Select Language:
                        <select class="form-select ml-2 peer w-60 rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            name="language" id="language">
                            <option value="en">EN (English)</option>
                            <option value="es">ES (Spanish)</option>
                        </select>
                    </label>
                    <small class="text-green-500">please create or edit the language</small>
                    <form method="POST" action="{{ route('settings.language.store') }}" name="form-language" id="form-language">
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        @csrf
                        <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div>When Printed the Permit Sticker content will be here. </div>
                            <div>
                                <p class="mb-2 text-gray-900">Instructions</p>
                                <textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500 focus-visible:outline-none field1"  required></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div>Formatted as defined in the "Permit Layout" tab. </div>
                            <div><textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500 focus-visible:outline-none field2"  required></textarea></div>
                        </div>

                        <div class="grid grid-cols-2 mt-2 gap-4 sm:gap-5 lg:gap-6">
                            <div>On the right you have the option to give some basic instructions to the permit holder to insure the sticker is placed appropriately in the vehicle. </div>
                            <div>
                                <textarea name="" id="" cols="30" rows="3" class="w-full border border-gray-500 focus-visible:outline-none field3"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field4"  required></textarea>
                            </div>
                        </div>
                        <div class="text-center grid grid-cols-1 mt-2 mb-2 sm:gap-5 lg:gap-6">
                            <div class="text-gray-900">Permit Agreement <br> <span class="text-blue-500"> Permit agreement Header printed above the rules </span></div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <textarea name="" id="" cols="30" rows="5" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field5"  required></textarea>
                                <div class="text-gray-900 text-center mt-2">Permit Agreement Rules</div>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field6"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field7"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field8"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field9"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field10"  required></textarea>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field11"  required></textarea>
                                <div class="text-gray-900 text-center mt-2">Permit Agreement Footer</div>
                                <textarea name="" id="" cols="30" rows="3" class="mt-2 w-full border border-gray-500 focus-visible:outline-none field12"  required></textarea>
                            </div>
                            <div class="mt-2 border border-blue-500 bg-blue-500 text-gray-50 text-justify" style="padding: 20px;">
                                For your convenience you can use variables in the text.
                                <br>
                                All recognised variables will be automatically replace by the proper text before printing.
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
                <div x-show="openTab ===  2" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong class="font-medium text-gray-800 dark:text-white">En desarrollo</strong>.</p>
                </div>
                <div x-show="openTab ===  3" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong class="font-medium text-gray-800 dark:text-white">En desarrollo</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
         languageSetting('en');
        $('body').on('change', '#language', function () {
             languageSetting($(this).val());
        });

        $("#form-language").validate({
            errorClass:'border-red-500 text-red-500',
            validClass:'border-green-500 text-green-500'
        });

        $("#form-language").submit(function( event ) {
            event.preventDefault();
            $('.btn-submit').prop("disabled", true);
            axios.post('{{ route('settings.language.store') }}', $(this).serialize(),{
            }).then(response => {
                if(response.data.success) {
                    var language = $('#language').val();
                     languageSetting(language);
                    $('#message').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message').addClass('hidden').text('');
                    }, 5000);
                }

                if(!response.data.success) {
                    $('#message').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
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
    });

    function  languageSetting(lan) {
        axios.post('{{ route('settings.language') }}',{
                property:   '{{$property->id}}',
                language:   lan
            }).then(response => {
                if(response.data.success) {
                   for (let index = 1; index <= 12; index++) {
                    if(lan == 'en') {
                        $('.field'+index).attr('name', 'camp_en_'+index).val();
                    }
                    if(lan == 'es') {
                        $('.field'+index).attr('name', 'camp_es_'+index).val();
                    }
                   }
                   if(response.data.propertySetting){
                    if(lan == 'en') {
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
                    if(lan == 'es') {
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
                   }
                }
            }).catch(error => {
                console.log(error.response);
            });
    }
</script>
</x-app-layout>
