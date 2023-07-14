<x-base-layout title="reset">
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
            <div class="text-center">
                <img class="mx-auto h-auto w-56" src="{{ asset('images/logo_icon.png') }}" alt="logo" />
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        Reset Password
                    </h2>
                    @if (session('status'))
                    <div class="text-green-500 mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                </div>
            </div>
            <div class="card mt-5 rounded-lg p-5 lg:p-7">
                <form method="POST" action="{{ route('password.email') }}" class="mt-4">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block font-medium text-sm text-gray-700">Enter your email address</label>
                        <input id="email" type="email" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn mt-5 w-full bg-primary text-white font-medium hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:text-white dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-base-layout>
