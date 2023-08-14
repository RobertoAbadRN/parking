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
                    <p class="text-sm text-white dark:text-gray-400">Permit Settings for: <strong class="font-medium text-gray-800 dark:text-white">{{$property->address}}</strong></p>
                </div>
            </div>
            <div class="mb-4 border-b">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="w-80" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses">
                        <button class="inline-block p-4 rounded-t-lg">Permit Types</button>
                    </li>
                </ul>
            </div>
            <div>
                <div x-show="openTab ===  1" class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <div id="message" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                    <form method="POST" action="{{ route('settings.permit.type.store') }}" name="form-permit-type" id="form-permit-type">
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="inline-block p-4 rounded-t-lg text-gray-900">
                                <p class="mb-2"> YOUR SELECTED PERMIT TYPE </p>
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    @foreach ($types as $key => $type)
                                        <li>
                                            <label onchange="check_checked(this)" class=" {{$type}} inline-flex items-center justify-between w-full p-5 text-white bg-gray-300 border-2 border-gray-200 rounded-lg cursor-pointer">
                                                <input type="checkbox" id="{{$type}}" name="{{$type}}" class="hidden">
                                                <div class="block">
                                                    <div class="w-full text-sm font-semibold ">{{$key}}</div>
                                                </div>
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="inline-block p-4 rounded-t-lg text-gray-900">
                                <p class="mb-2"> YAVAILABLE PERMIT TYPE </p>
                                <div id="permitCheck"></div>
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
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        permitSetting();
        $("#form-permit-type").submit(function( event ) {
            event.preventDefault();
            $('.btn-submit').prop("disabled", true);
            axios.post('{{ route('settings.permit.type.store') }}', $(this).serialize(),{
            }).then(response => {
                if(response.data.success) {
                    permitSetting();
                    $('#message').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        location.reload();
                        $('#message').addClass('hidden').text('');
                    }, 1500);
                }

                if(!response.data.success) {
                    permitSetting();
                    $('#message').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
                    setTimeout(function() {
                        $('#message').addClass('hidden').removeClass('bg-red-500').text('');
                    }, 5000);
                }
                $('.btn-submit').prop("disabled", false);

            }).catch(error => {
                permitSetting();
                console.log(error.response);
                $('.btn-submit').prop("disabled", false);
            });
        });
    });

    function check_checked(obj){
        var child_id = $(obj).children(':input').prop('id');
        var is_checked = $(obj).children(':input').prop('checked');
        var label = $(obj).text();
        if(is_checked === true){
            $('.'+child_id).removeClass('border-gray-200').addClass('bg-gray-700 border-gray-800 text-gray-600');
            $('#permitCheck').append(function(){
                var html = `<div class="w-80 p-2 border-2 rounded-lg bg-blue-500 text-white px-2 ${child_id}">${label}</div>`;
                return html;
            });
        } else {
            $('#permitCheck .'+child_id).remove();
            $('.'+child_id).addClass('border-gray-200').removeClass('bg-gray-700 border-gray-800 text-gray-600');
        }
    }

    function  permitSetting(lan) {
        $('#permitCheck').html('');
        axios.post('{{ route('settings.permit.type.store') }}',{
                property_id:   '{{$property->id}}',
                type:   'get'
            }).then(response => {
                if(response.data.success) {

                    $.each(response.data.form, function (index, field) {
                        $('.'+field.name).prop('checked', field.valor == 1 ? true : false).addClass(field.valor == 1 ? 'bg-gray-700 border-gray-800 text-gray-600' : '').removeClass(field.valor == 1 ? 'border-gray-200' : '');
                        if(field.valor) {
                            var label = $('#'+field.name).parent().text();
                            $('#permitCheck').append(function(){
                                var html = `<div class="w-80 p-2 border-2 rounded-lg bg-blue-500 text-white px-2 ${field.name}">${label}</div>`;
                                return html;
                            });
                        }
                    });
                }
            }).catch(error => {
                console.log(error.response);
            });
    }
</script>
</x-app-layout>
