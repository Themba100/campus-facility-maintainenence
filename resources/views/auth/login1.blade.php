
<div class="bg-gray-700">
  <x-guest-layout>
    <x-auth-card>

      <x-slot name="logo">
        <img src="{{url('/images/UnimaLogo.png')}}" className ="w-18 h-12"  />
        <a href="/">

        </a>
      </x-slot>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('loginstaff') }}">
        @csrf
        <label for="staff_portal" class="flex justify-center font-bold text-gray-800"> Staff Portal</label>

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
            {{ __('Forgot your password?') }}
          </a>
          @endif

          <x-button class="ml-3 bg-blue-800 hover:bg-blue-900">
            {{ __('Log in') }}
          </x-button>
        </div>
      </form>
    </x-auth-card>
  </x-guest-layout>


</div>
