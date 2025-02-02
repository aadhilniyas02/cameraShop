<script src="https://cdn.tailwindcss.com"> </script>

<x-app-layout>

        <div class="container h-screen flex items-center justify-center px-4">
            <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
                <div class="border p-6 rounded-lg bg-gray-200 text-center shadow-lg">
                    <div class="mb-6 font-extrabold text-2xl sm:text-3xl font-sans">
                        Admin Dashboard
                    </div>

                    <div class="flex flex-col items-center space-y-4">
                        <a href="{{ route('product.manageProducts') }}" class="w-full">
                            <button
                                class="w-full p-3 border border-gray-300 rounded bg-white hover:bg-gray-300 hover:text-white transition duration-300 text-sm sm:text-base">
                                Manage Products
                            </button>
                        </a>
                        <a href="{{ route ('product.addProducts') }}" class="w-full">
                            <button
                                class="w-full p-3 border border-gray-600 rounded bg-white hover:bg-gray-700 hover:text-white transition duration-300 text-sm sm:text-base">
                                Add Products
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
