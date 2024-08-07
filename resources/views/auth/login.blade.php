<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-14" :status="session('status')" />
    <div class="flex min-h-[100vh] w-full flex-wrap items-stretch max-md:pb-20 max-md:pt-32">

        <div class="grow md:flex md:w-1/2 md:flex-col md:items-center md:justify-center md:py-20">
            <h1 class="mb-11 font-bold text-4xl   flex justify-center"><x-application-logo  class="h-26 text-primary dark:text-white"/> </h1>
            <div class="w-full px-4 text-2xs lg:w-1/2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-zinc-900 border-gray-300 dark:border-zinc-700 text-primary shadow-sm focus:ring-primary dark:focus:ring-primary dark:focus:ring-offset-zinc-800"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>

                </form>
            </div>
        </div>
    </div>
    <div class="hidden flex-col justify-center overflow-hidden bg-cover bg-center md:flex md:w-1/2"
        style="background-image: url(https://allesservicos.com.br/wp-content/uploads/2023/10/255-scaled.jpg)"></div>

    </div>

</x-guest-layout>
