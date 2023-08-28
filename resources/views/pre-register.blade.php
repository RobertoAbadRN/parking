<x-base-layout title="Register" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Parking Management Service
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <!-- Boxed Tabs With Icon -->
            <div class="card px-4 pb-4 sm:px-5">
                <div class="my-3 flex h-8 items-center justify-between">
                    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </h2>
                </div>
                <div class="max-w-5xl">
                    <div class="mt-5">
                        <div x-data="{ activeTab: '1' }" class="tabs flex flex-col">
                            <div
                                class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                <div class="tabs-list flex px-1.5 py-1">
                                    <button @click="activeTab = '1'"
                                        :class="activeTab === '1' ?
                                            'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :
                                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span> RESIDENT VEHICLE REGISTRATION</span>
                                    </button>
                                    <button @click="activeTab = '2'"
                                        :class="activeTab === '2' ?
                                            'bg-white shadow dark:bg-navy-500 dark:text-navy-100' :
                                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>VISITORS PASS REGISTRATION</span>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-content pt-4">
                                <div x-show="activeTab === '1'"
                                    x-transition:enter="transition-all duration-500 easy-in-out"
                                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                                    <div class="w-full">
                                        <div id="message_vehicle" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                                        <form action="{{ route('registrations.vehicle') }}" method="POST" class="form" id="form-vehicle">
                                            <h2 class="text-center mb-4 mt-4">
                                                Pre-register your vehicle for a parking
                                                permit / Pre-registra tu vehículo para obtener un permiso de
                                                estacionamiento
                                            </h2>
                                            @csrf

                                            <input type="hidden" name="property_code" value="{{ $propertyCode }}">
                                            <input type="hidden" name="property_id" value="{{ $propertyID }}">
                                            <input type="hidden" name="user_id" value="{{ request('user_id') }}">

                                            @foreach ($registrations as $parent)
                                                @foreach ($registrations_required as $required)
                                                    @if('required_'.$parent->name == $required->name)
                                                        <input type="hidden" name="{{$required->name}}" value="{{$required->valor}}">
                                                    @endif
                                                @endforeach
                                                @if ($parent->name != 'pre_vehicle_type')
                                                    <div class="mb-3">
                                                        <label for="{{$parent->name}}" class="form-label">
                                                            {{$fieldsRegistration[$parent->name]}}:
                                                        </label>
                                                        <input
                                                        type="text"
                                                        name="{{$parent->name}}"
                                                        id="{{$parent->name}}"
                                                        class="
                                                            form-input
                                                            w-full
                                                            rounded-lg
                                                            border
                                                            border-slate-300
                                                            bg-transparent
                                                            px-3
                                                            py-2
                                                            placeholder:text-slate-400/70
                                                            hover:border-slate-400
                                                            focus:border-primary
                                                            dark:border-navy-450
                                                            dark:hover:border-navy-400
                                                        dark:focus:border-accent
                                                        "
                                                        {{-- @foreach ($registrations_required as $required)
                                                            @if('required_'.$parent->name == $required->name)
                                                                required='required'
                                                            @endif
                                                        @endforeach --}}
                                                        >
                                                        <div class="col-form-label has-danger text-red-500 hidden {{$parent->name}}"></div>
                                                    </div>

                                                @endif
                                                @if ($parent->name == 'pre_vehicle_type')
                                                    <label class="block mb-3">
                                                        <span>{{$fieldsRegistration[$parent->name]}}:</span>
                                                        <select name="{{$parent->name}}" id="{{$parent->name}}"
                                                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            {{-- @foreach ($registrations_required as $required)
                                                                @if('required_'.$parent->name == $required->name)
                                                                    required='required'
                                                                @endif
                                                            @endforeach --}}
                                                        >
                                                            <option value="">-- Select vehicle type / Selecciona el tipo

                                                                de vehículo --</option>

                                                            <option value="Car">Car</option>

                                                            <option value="Truck">Truck</option>

                                                            <option value="Motorcycle">Motorcycle</option>

                                                        </select>
                                                        <div class="col-form-label has-danger text-red-500 hidden {{$parent->name}}"></div>
                                                    </label>

                                                @endif
                                            @endforeach
                                            <div class="flex justify-center">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-yellow-500 text-white w-full font-semibold rounded hover:bg-yellow-600">Submit
                                                    / Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div x-show="activeTab === '2'"
                                    x-transition:enter="transition-all duration-500 easy-in-out"
                                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                                    <div>
                                        <div id="message_visitor" class="hidden text-white px-4 py-2 mb-4 rounded-md"></div>
                                        <form action="{{ route('registrations.visitor') }}" method="POST"  class="form" id="form-visitor">
                                            <h2 class="text-center mb-4 pt-4">Register your vehicle for a temporary
                                                Visitor's Pass</h2>
                                            @csrf
                                            <input type="hidden" name="property_code" value="{{ $propertyCode }}">
                                            <input type="hidden" name="property_id" value="{{ $propertyID }}">
                                            <input type="hidden" name="user_id" value="{{ request('user_id') }}">
                                            @foreach ($visitors as $val)
                                                @foreach ($visitors_required as $required)
                                                    @if('required_'.$val->name == $required->name)
                                                        <input type="hidden" name="{{$required->name}}" value="{{$required->valor}}">
                                                    @endif
                                                @endforeach
                                                @if ($val->name != 'vehicle_type' && $val->name != 'valid_from')
                                                    <div class="mb-3">
                                                        <label for="{{$val->name}}" class="form-label">
                                                            {{$fieldsVisitor[$val->name]}}:
                                                        </label>
                                                        <input
                                                        type="text"
                                                        name="{{$val->name}}"
                                                        id="{{$val->name}}"
                                                        class="
                                                            form-input
                                                            w-full
                                                            rounded-lg
                                                            border
                                                            border-slate-300
                                                            bg-transparent
                                                            px-3
                                                            py-2
                                                            placeholder:text-slate-400/70
                                                            hover:border-slate-400
                                                            focus:border-primary
                                                            dark:border-navy-450
                                                            dark:hover:border-navy-400
                                                        dark:focus:border-accent
                                                        "
                                                        {{-- @foreach ($visitors_required as $required)
                                                            @if('required_'.$val->name == $required->name)
                                                                required='required'
                                                            @endif
                                                        @endforeach --}}
                                                        >
                                                        <div class="col-form-label has-danger text-red-500 hidden {{$val->name}}"></div>
                                                    </div>
                                                @endif
                                                @if ($val->name == 'vehicle_type')
                                                    <label class="block mb-3">
                                                        <span>{{$fieldsVisitor[$val->name]}}:</span>
                                                        <select name="{{$val->name}}" id="{{$val->name}}"
                                                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                                           {{--  @foreach ($registrations_required as $required)
                                                                @if('required_'.$val->name == $required->name)
                                                                    required='required'
                                                                @endif
                                                            @endforeach --}}
                                                        >
                                                            <option value="">-- Select vehicle type / Selecciona el tipo

                                                                de vehículo --</option>

                                                            <option value="Car">Car</option>

                                                            <option value="Truck">Truck</option>

                                                            <option value="Motorcycle">Motorcycle</option>

                                                        </select>
                                                        <div class="col-form-label has-danger text-red-500 hidden {{$val->name}}"></div>
                                                    </label>
                                                @endif
                                                @if ($val->name == 'valid_from')
                                                    <label class="relative flex mb-3">
                                                        <input x-init="$el._x_flatpickr = flatpickr($el, { enableTime: true, dateFormat: 'Y-m-d h:i K', time_24hr: false })"
                                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                            placeholder="Choose date and time..." type="text"
                                                            name="{{$val->name}}"
                                                            {{-- @foreach ($registrations_required as $required)
                                                                @if('required_'.$val->name == $required->name)
                                                                    required='required'
                                                                @endif
                                                            @endforeach --}}
                                                        />
                                                        <span
                                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 transition-colors duration-200" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </span>
                                                        <div class="col-form-label has-danger text-red-500 hidden {{$val->name}}"></div>
                                                    </label>
                                                @endif
                                            @endforeach
                                            <button type="submit"
                                                class="px-4 py-2 bg-yellow-500 text-white w-full font-semibold rounded hover:bg-yellow-600">Submit
                                                / Enviar</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            /*$("#form-visitor").validate({
                errorClass:'border-red-500 text-red-500',
                validClass:'border-green-500 text-green-500'
            });
            $("#form-vehicle").validate({
                errorClass:'border-red-500 text-red-500',
                validClass:'border-green-500 text-green-500'
            });*/

            $("#form-visitor").submit(function( event ) {
                event.preventDefault();
                $('.btn-submit').prop("disabled", true);
                axios.post('{{ route('registrations.visitor') }}', $(this).serialize(),{
                }).then(response => {
                    if(response.data.success) {
                        $('#message_visitor').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                        setTimeout(function() {
                            $('#message_visitor').addClass('hidden').text('');
                            $.each(response.data.form, function( key, value) {
                                $('#'+value.name).val('');
                                setTimeout(function() {$('.'+key).addClass('hidden').text('');}, 5000);
                            });
                        }, 1500);
                    }

                    if(!response.data.success) {
                        $('#message_visitor').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
                        setTimeout(function() {
                            $('#message_visitor').addClass('hidden').removeClass('bg-red-500').text('');
                        }, 5000);
                    }
                    $('.btn-submit').prop("disabled", false);

                }).catch(error => {
                    if(error.response.status === 422){
                        var err = error.response.data.errors;
                        $.each(err, function( key, value) {
                            $('.'+key).text('' + value + '').removeClass('hidden');
                            setTimeout(function() {$('.'+key).addClass('hidden').text('');}, 5000);
                        });
                    }
                    console.log(error.response);
                    $('.btn-submit').prop("disabled", false);
                });
            });
            $("#form-vehicle").submit(function( event ) {
                event.preventDefault();
                $('.btn-submit').prop("disabled", true);
                axios.post('{{ route('registrations.vehicle') }}', $(this).serialize(),{
                }).then(response => {
                    if(response.data.success) {
                        $('#message_vehicle').removeClass('hidden').addClass('bg-green-500').text(`${response.data.message}`);
                        setTimeout(function() {
                            $('#message_vehicle').addClass('hidden').text('');
                            $.each(response.data.form, function( key, value) {
                                $('#'+value.name).val('');
                                setTimeout(function() {$('.'+key).addClass('hidden').text('');}, 5000);
                            });
                        }, 1500);
                    }

                    if(!response.data.success) {
                        $('#message_vehicle').removeClass('hidden').addClass('bg-red-500').text(`${response.data.message}`);
                        setTimeout(function() {
                            $('#message_vehicle').addClass('hidden').removeClass('bg-red-500').text('');
                        }, 5000);
                    }
                    $('.btn-submit').prop("disabled", false);

                }).catch(error => {
                    if(error.response.status === 422){
                        var err = error.response.data.errors;
                        $.each(err, function( key, value) {
                            $('.'+key).text('' + value + '').removeClass('hidden');
                            setTimeout(function() {$('.'+key).addClass('hidden').text('');}, 5000);
                        });
                    }
                    console.log(error.response);
                    $('.btn-submit').prop("disabled", false);
                });
            });
        });
    </script>
</x-base-layout>
