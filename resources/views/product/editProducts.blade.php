<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <div class="container mx-auto px-4 min-h-screen pt-20 flex items-center justify-center">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
            <div class="border p-7 rounded-lg bg-gray-200 shadow-lg">
                <div class="border p-3 rounded-lg bg-white">
                    <div class="m-2 text-center text-xl font-semibold">Admin Dashboard</div>
                    <h2 class="mb-4 text-center text-2xl sm:text-3xl font-bold">Edit Product</h2>
                    <hr class="border-gray-300">
                </div>

                <div class="grid gap-4 mt-6">
                    <form id="editProductForm"  method="POST" enctype="multipart/form-data" class="grid gap-6"  data-product-id="{{ $product->id }}">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="flex flex-col items-center">
                            <label for="product_name" class="mb-2 font-medium">Product Name:</label>
                            <input 
                                type="text" 
                                name="product_name" 
                                id="product_name" 
                                value="{{ old('product_name', $product->product_name) }}" 
                                class="border border-gray-300 rounded w-full sm:w-80 p-2 text-center focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            >
                            @error('product_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Price -->
                        <div class="flex flex-col items-center">
                            <label for="product_price" class="mb-2 font-medium">Product Price:</label>
                            <input 
                                type="number" 
                                name="product_price" 
                                id="product_price"  
                                value="{{ old('product_price', $product->product_price) }}" 
                                class="border border-gray-300 rounded w-full sm:w-80 p-2 text-center focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            >
                            @error('product_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Details -->
                        <div class="flex flex-col items-center">
                            <label for="product_detail" class="mb-2 font-medium">Product Details:</label>
                            <textarea 
                                name="product_detail" 
                                id="product_detail" 
                                rows="4" 
                                class="border border-gray-300 rounded w-full sm:w-80 p-2 text-center focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            >{{ old('product_detail', $product->product_detail) }}</textarea>
                            @error('product_detail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Product Quantity -->
                        <div class="flex flex-col items-center">
                            <label for="product_quantity" class="mb-2 font-medium">Quantity:</label>
                            <input 
                                type="number" 
                                name="product_quantity" 
                                id="product_quantity" 
                                step="1" 
                                value="{{ old('product_quantity', $product->product_quantity) }}" 
                                class="border border-gray-300 rounded w-full sm:w-80 p-2 text-center focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            >
                            @error('product_quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="flex flex-col items-center">
                            <label for="product_image" class="mb-2 font-medium">Current Image:</label>
                            <img 
                                src="{{ asset($product->product_image) }}" 
                                alt="Current Image" 
                                class="h-20 w-20 object-cover rounded-lg mb-2"
                            > 
                            <label for="product_image" class="mb-2 font-medium">Upload New Image:</label>
                            <input 
                                type="file" 
                                name="product_image" 
                                id="product_image" 
                                accept="image/*"
                                class= "border  border-gray-300 rounded w-full sm:w-80 p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            >
                        </div> 

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button 
                                type="submit" 
                                class="border border-gray-300 rounded py-2 px-4 bg-green-400 hover:bg-green-500 hover:shadow-md transition duration-300 cursor-pointer"
                            >
                                Update Product
                            </button>
                        </div>
                    </form>

                    <div id="errorMessages"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // Store original values when  form  loaded
    const originalValues = {};
    const form = document.getElementById('editProductForm');

    // Populate originalValues with  initial form data
    document.querySelectorAll('#editProductForm input, #editProductForm textarea').forEach(field => {
        if (field.name !== 'image') { // Exclude image field
            originalValues[field.name] = field.value;
        }
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);
        const productId = form.dataset.productId; // Retrieve productId from form's data attribute

        // Convert FormData to a plain object
        const formObject = {};
        for (let [key, value] of formData.entries()) {
            formObject[key] = value;
        }

        // Check if any changes  made (excluding  image field)
        let hasChanges = false;
        for (const key in originalValues) {
            if (formObject[key] !== originalValues[key]) {
                hasChanges = true;
                break;
            }
        }

        // If no changes  made, display  error message and stop  execution
        if (!hasChanges) {
            const errorMessages = document.getElementById('errorMessages');
            errorMessages.innerHTML = '<div class="text-red-600 font-semibold">No changes were made to the product details.</div>';
            return; // Stop the function execution
        }

        // Clear previous error messages and styles
        const errorMessages = document.getElementById('errorMessages');
        errorMessages.innerHTML = ''; // Clear all error messages
        document.querySelectorAll('.border-red-600').forEach(field => {
            field.classList.remove('border-red-600'); // Remove red borders from fields
        });

        // Submit form data using Axios for updating a product
        axios.put(`/api/products/${productId}`, formObject)
            .then(response => {
                // Display success message in green
                errorMessages.innerHTML = '<div class="text-green-600 font-semibold">Product updated successfully!</div>';

                // Redirect to Admin Dashboard after 1.5 seconds
                setTimeout(() => {
                    window.location.href = '/admin/dashboard'; // Redirect to admin dashboard
                }, 1500);
            })
            .catch(error => {
    

                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;

                    // Clear previous errors
                    errorMessages.innerHTML = '';

                    Object.keys(errors).forEach(field => {
                        // Highlight field error
                        const inputField = document.querySelector(`[name="${field}"]`);
                        if (inputField) {
                            inputField.classList.add('border-red-600'); // Add red border to invalid fields
                        }

                        // Display error message
                        const errorText = errors[field].join(', ');
                        const errorElement = document.createElement('p');
                        errorElement.textContent = errorText;
                        errorElement.classList.add('text-red-600', 'font-semibold', 'mt-2');
                        errorMessages.appendChild(errorElement);
                    });
                } else {
                    // Handle unexpected errors
                    errorMessages.innerHTML = '<div class="text-red-600 font-semibold">An unexpected error occurred. Please try again.</div>';
                }
            });
    });
</script>

