<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="bg-gray-100 min-h-screen">
        <!-- Navbar -->
        <header class="bg-red-600 text-white py-4">
            <div class="container mx-auto flex justify-between items-center px-4">
                <div class="text-2xl font-bold">CameraZone</div>
                <nav class="hidden lg:flex space-x-6">
                    <a href="#" class="hover:text-gray-200">Home</a>
                    <a href="#" class="hover:text-gray-200">Shop</a>
                    <a href="#" class="hover:text-gray-200">Contact</a>
                </nav>
                <div class="lg:hidden">
                    <button id="menu-toggle" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Product List -->
        <main class="container mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold text-center mb-8">Our Products</h1>
            <div id="product-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Products will be dynamically added here -->
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-6 w-full mt-10">
            <div class="container mx-auto text-center">
                &copy; 2025 CameraZone. All Rights Reserved.
            </div>
        </footer>
    </div>

    <script>
        // Fetch products from the database using Axios
        document.addEventListener("DOMContentLoaded", function () {
            axios.get('/api/products') // Change to your actual API endpoint
                .then(response => {
                    const products = response.data;
                    const productContainer = document.getElementById('product-container');

                    products.forEach(product => {
                        const productCard = document.createElement('div');
                        productCard.classList.add("bg-white", "rounded-lg", "shadow-md", "p-4", "text-center");

                        productCard.innerHTML = `
                            <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h2 class="text-lg font-bold">${product.name}</h2>
                            <p class="text-gray-700 text-sm my-2">$${product.price.toFixed(2)}</p>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition">
                                Add to Cart
                            </button>
                        `;

                        productContainer.appendChild(productCard);
                    });
                })
                .catch(error => {
                    console.error("Error fetching products:", error);
                });
        });
    </script>
</body>
</html>
