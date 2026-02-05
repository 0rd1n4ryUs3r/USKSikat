<x-guest-layout>    
    <!-- Tombol Kembali -->
    <div class="flex justify-end mb-4">
        <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Container -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">
            Login to Your Account
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />

                <div class="relative">
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full pr-10"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                    >
                        <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                                     -1.274 4.057-5.064 7-9.542 7
                                     -4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <svg id="eyeSlashIcon" class="h-5 w-5 hidden" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember -->
            <div class="flex items-center justify-between mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline"
                       href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <x-primary-button class="w-full justify-center py-2.5">
                Log in
            </x-primary-button>
        </form>
    </div>

    <script>
        document.getElementById('togglePassword')?.addEventListener('click', () => {
            const input = document.getElementById('password');
            const eye = document.getElementById('eyeIcon');
            const eyeSlash = document.getElementById('eyeSlashIcon');

            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            eye.classList.toggle('hidden');
            eyeSlash.classList.toggle('hidden');
        });
    </script>
</x-guest-layout>
