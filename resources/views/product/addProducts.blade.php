<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axios CDN -->


<x-app-layout>
    <div class="container mx-auto px-4 min-h-screen pt-20 pb-20 flex items-center justify-center">
        <div class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg">
            <div class="border p-5 sm:p-7 rounded-lg bg-gray-200 shadow-lg">
                <div class="border p-3 sm:p-4 rounded-lg bg-white">
                    <div class="m-2 text-center text-lg sm:text-xl font-semibold">Admin Dashboard</div>
                    <h2 class="mb-4 text-center text-xl sm:text-2xl md:text-3xl font-bold">Add Product</h2>
                    <hr class="border-gray-300">
                </div>

                <div class="grid gap-4 mt-6">
                    <form id="addProductForm" class="grid gap-6 bg-white p-4 sm:p-6 rounded-lg shadow-md">
                        @csrf
                        <!-- Product Name -->
                        <div class="flex flex-col items-center">
                            <label for="product_name" class="mb-2 font-medium text-sm sm:text-base">Product Name:</label>
                            <input type="text" name="product_name" id="product_name" class="border border-gray-300 rounded w-full sm:w-72 md:w-80 lg:w-96 p-2 text-sm sm:text-base text-center focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Product Price -->
                        <div class="flex flex-col items-center">
                            <label for="product_price" class="mb-2 font-medium text-sm sm:text-base">Product Price:</label>
                            <input type="number" name="product_price" id="product_price" min="10000" max="1000000" step="1" class="border border-gray-300 rounded w-full sm:w-72 md:w-80 lg:w-96 p-2 text-sm sm:text-base text-center focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Product Detail -->
                        <div class="flex flex-col items-center">
                            <label for="product_detail" class="mb-2 font-medium text-sm sm:text-base">Product Detail:</label>
                            <textarea name="product_detail" id="product_detail" rows="4" class="border border-gray-300 rounded w-full sm:w-72 md:w-80 lg:w-96 p-2 text-sm sm:text-base text-center focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                        </div>

                        <!-- Product Quantity -->
                        <div class="flex flex-col items-center">
                            <label for="product_quantity" class="mb-2 font-medium text-sm sm:text-base">Quantity:</label>
                            <input type="number" name="product_quantity" id="product_quantity" min="1" max="5" step="1" class="border border-gray-300 rounded w-full sm:w-72 md:w-80 lg:w-96 p-2 text-sm sm:text-base text-center focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- File Upload - Picture -->
                        <div class="flex flex-col items-center">
                            <label for="product_image" class="mb-2 font-medium text-sm sm:text-base">File Upload:</label>
                            <input type="file" name="product_image" accept="image/*" id="product_image" class="border border-gray-300 rounded w-full sm:w-72 md:w-80 lg:w-96 p-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit" class="border border-gray-300 rounded py-2 px-4 bg-green-400 hover:bg-green-500 hover:shadow-md transition duration-300 cursor-pointer text-sm sm:text-base">
                                Save Product
                            </button>
                        </div>
                    </form>

                    <div id="errorMessages" class="mt-4 text-red-600 font-semibold"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('addProductForm').addEventListener('submit', function (e) {
        e.preventDefault(); // default form submission

        const form = e.target;
        const formData = new FormData(form); //  Form Data object
        const errorMessages = document.getElementById('errorMessages');

        // validation checks
            const productName = document.getElementById('product_name').value.trim();
            const productPrice = document.getElementById('product_price').value;
            const productQuantity = document.getElementById('product_quantity').value;
            const productImage = document.getElementById('product_image').files[0];

            if (!productName || !productPrice || !productQuantity || !productImage) {
                errorMessages.innerHTML = 'Please fill in all required fields';
                return;
            }

            if (!productImage.type.startsWith('image/')) {
                errorMessages.innerHTML = 'Please upload a valid image file';
                return;
            }

        // Clear error messages
        errorMessages.innerHTML = '';


        // Submit form data using Axios
        axios.post('/api/products', formData)
            .then(response => {
                // success
                 // Display success message in green
                 errorMessages.innerHTML = '<div class="text-green-600 font-semibold">Product added successfully!</div>';
                 
                form.reset(); // Reset  form

                // Redirect to Admin Dashboard after 1.5 seconds
                setTimeout(() => {
                    window.location.href = '/admin/dashboard'; // Redirect to admin dashboard
                }, 1500);
            })
            .catch(error => {
                //  validation errors
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;

                    Object.keys(errors).forEach(field => {
                        // Highlight field error
                        const inputField = document.querySelector([name="${field}"]);
                        if (inputField) {
                            inputField.classList.add('border-red-600');
                        }

                        // Display error 
                        const errorText = errors[field].join(', ');
                        const errorElement = document.createElement('p');
                        errorElement.textContent = errorText;
                        errorMessages.appendChild(errorElement);
                    });
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            });
    });
</script>

