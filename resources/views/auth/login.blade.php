<x-guest-layout>
    <x-auth-card >

        <x-slot name="logo">
            <a href="/"> 
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
         <!-- Modified  Logo -->
        <section class="hero container max-w-screen-lg mx-auto mb-7 mt-3 ">
            <img style="width:50% ; height:50%" class="mx-auto" src="{{ asset('argon') }}/img/mbpj.png" alt="screenshot" >
        </section>
        <section>
            <p class="text-lg font-bold md:text-center ...">Sistem Pengurusan Elaun Lebih Masa
. </p>
            <p class="text-lg font-bold md:text-center ...">Majlis Bandaraya Petaling Jaya. </p>

        </section>
         <!-- Form  Register -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{-- {{ __('Forgot your password?') }} --}}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        </div>

        <footer class="footer pt-5">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                  &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun Lebih Masa
</a>
                </div>
              </div>
            </div>
          </footer>
        <div class="mt-4">
                <h1>Best viewed using Internet Explorer 9.0 / Mozilla Firefox 12.0 / Google Chrome 13.0 and above with 1024 x 768 resolution<h1>
        </div>
        
    </x-auth-card>
</x-guest-layout>
