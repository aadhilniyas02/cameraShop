<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-2xl bg-white shadow-md rounded-lg p-6">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <h2 class="text-xl font-semibold mt-2">Manage Products</h2>
                <hr class="my-4">
            </div>

            <!-- Product Management Section -->
            <div class="space-y-6" id="product-container">
                <!-- Products will dynamically added here -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productContainer = document.getElementById('product-container');
            // Fetching products using Axios
            //const token = localStorage.getItem('token'); // Retrieve the token from localStorage
            
            // Fetching products using Axios
            axios.get('/api/products') 

                .then(response => {
                    const products = @json($products);; // API returns an array of products
                    productContainer.innerHTML = '';
                    if (Array.isArray(products)) {
                        products.forEach(product => {
                            productContainer.innerHTML += `
                                <div class="border p-4 rounded-lg bg-gray-50 flex flex-col sm:flex-row items-center sm:justify-between space-y-4 sm:space-y-0">
                                    <div class="flex-shrink-0">
                                        <img src="${product.product_image}" alt="${product.product_name}" class="h-16 w-16 sm:h-24 sm:w-24 object-cover rounded-md">
                                    </div>
                                    <div class="flex-grow sm:ml-4 text-center sm:text-left">
                                        <h3 class="text-sm sm:text-lg font-semibold">${product.product_name}</h3>
                                        <p class="text-xs sm:text-base text-gray-600 mt-1">Price: ${product.product_price} LKR</p>
                                        <p class="text-xs sm:text-base text-gray-600 mt-1">Detail: ${product.product_detail}</p>
                                        <p class="text-xs sm:text-base text-gray-600">Quantity: ${product.product_quantity}</p>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2 mt-4 sm:mt-0">
                                        <a href="/products/${product.id}/edit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm transition-colors">
                                            Edit
                                        </a>
                                        <button onclick="deleteProduct(${product.id}, this)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm transition-colors">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        productContainer.innerHTML = '<p class="text-center text-red-500">Invalid product data.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    productContainer.innerHTML = '<p class="text-center text-red-500">Failed to fetch products.</p>';
                });
        });

        function deleteProduct(productId, buttonElement) {
            if (confirm('Are you sure you want to delete this product?')) {
                axios.delete(`/api/products/${productId}`)
                    .then(response => {
                        // Remove- product element from the DOM
                        buttonElement.closest('div.border').remove();
                    })
                    .catch(error => {
                        console.error('Error deleting product:', error);
                        alert('Failed to delete product.');
                    });
            }
        }
    </script>
</body>
</html>