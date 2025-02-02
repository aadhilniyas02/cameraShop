<script src="https://cdn.tailwindcss.com"></script>


<div class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-red-600 py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-white text-2xl font-bold">CameraZone</h1>
        </div>
    </header>

    <div class="flex flex-grow justify-center items-center">
        <div class="bg-gray-100 shadow-lg rounded-lg w-full max-w-sm p-6">
            
            <!-- Title -->
            <h2 class="text-center text-xl font-bold mb-6">User Login</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="text-gray-700"> Email </label>
                    <input 
                        id="email" 
                        class="w-full px-4 py-2 border rounded-full bg-gray-200 focus:ring focus:ring-gray-400 focus:outline-none" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="email"
                    />
                </div>

                <!-- Password Input -->
                <div class="mt-6">
                    <label for="password" class="text-gray-700"> Password </label>
                    <input 
                        id="password" 
                        class="w-full px-4 py-2 border rounded-full bg-gray-200 focus:ring focus:ring-gray-400 focus:outline-none" 
                        type="password" 
                        name="password"
                        required autocomplete="current-password"
                    />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="mt-6">
                    <button 
                        type="submit"
                        class="w-full bg-white text-black font-semibold py-2 px-4 rounded-full border border-gray-300 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <!-- Back to Home -->
            <div class="mt-4 text-center">
                <a href="/" class="text-blue-600 hover:underline">Back to Home</a>
            </div>
        </div>
    </div>

</div>
