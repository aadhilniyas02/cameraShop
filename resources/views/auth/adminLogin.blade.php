<script src="https://cdn.tailwindcss.com"></script>


<div class="bg-gray-100 min-h-screen flex flex-col"> 

    <!-- Header -->
    <header class="bg-red-600 py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-white text-2xl font-bold">CameraZone</h1>
            <span class="text-white text-lg">Admin Panel</span>
        </div>
    </header>


        <div class="flex flex-grow justify-center items-center">
            <div class="bg-gray-100 shadow-lg rounded-lg w-full max-w-sm p-6">
                <!-- Title -->
                <h2 class="text-center text-xl font-bold mb-6">Admin Login</h2>

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

                <form method="POST" action="{{ route('admin.login') }}" >
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email"  class="text-gray-700"> Email </label>
                        <input 
                            id="email"
                            type="email"
                            placeholder="email"
                            name="email" 
                            class="w-full px-4 py-2 border rounded-full bg-gray-200 focus:ring focus:ring-gray-400 focus:outline-none "  
                            :value="old('email')" 
                            required 
                            autofocus 
                        />
                    </div>

                    <!-- Password Input -->
                    <div class="mt-6">
                        <label for="password" class="text-gray-700"> Password </label>
                        <input 
                            id="password" 
                            type="password"
                            placeholder="password"
                            name="password"
                            class="w-full px-4 py-2 border rounded-full bg-gray-200 focus:ring focus:ring-gray-400 focus:outline-none" 
                            required 
                        />
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

                        <div class="mt-4 text-center">
                            <a href="/" class="text-blue-600 hover:underline">Back to Home</a>
                        </div>
            </div>
        </div>

</div>
