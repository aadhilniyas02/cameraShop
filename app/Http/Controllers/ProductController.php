<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{

    // Display a listing of all PRODUCTS
    public function index()
    {  
        $products = Product::all(); // retrieve all products
        return view('product.manageProducts', ['products' => $products]); // Return view for managing products
        
        //return response()->json($products); // Return products as JSON
        //return ProductResource::collection($products); // Return collection of products as a resource    
    }


    // // Display the SPECIFIED PRODUCT
    // public function show(Product $product)
    // {
    //     return new ProductResource($product); // Return single product as a resource
    // }



    // Show the FORM to create a new PRODUCT
    public function create()
    {
        return view('product.addProducts'); // Return view for creating a new product
    }

    // STORE a newly created PRODUCT
    public function store(Request $request)
    {
                // Validate the request data
                $validated = $request->validate([
                    'product_name' => 'required|string|max:255',
                    'product_detail' => 'required|string',
                    'product_price' => 'required|numeric|min:10000|max:1000000',
                    'product_quantity' => 'required|integer|min:1|max:5',
                    'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ], 
                ); // Validate incoming request

                if($request->hasFile('product_image')) {
                    $path = $request->file('product_image')->store('product_images', 'public');
                    $validated['product_image'] = Storage::url($path);
                }

                    $product = Product::create($validated); // Create new product / Save product to database

                    //return new ProductResource($product); // Return new product as a resource / return newly created product as API resource                
}

    // return Manage Products Page 
    public function manageProducts()
    { 
        return view('product.manageProducts');
    }

    // Show the form for to EDIT an existing PRODUCT
    public function edit(Product $product)
    {
        return view('product.editProducts',['product' => $product]); // Return view for editing an existing product
    }

    // UPDATE the PRODUCT details
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_detail' => 'required|string',
            'product_price' => 'required|numeric|min:10000|max:1000000',
            'product_quantity' => 'required|integer|min:1|max:5',
            'product_image' => 'nullable',
        ]);
    
        // Handle image upload
        if ($request->hasFile('product_image')) {
            // Delete the old image if it exists
            if ($product->product_image) {
                $oldImagePath = str_replace('/storage', 'public', $product->product_image);
                Storage::delete($oldImagePath);
            }
    
            // Store the new image
            $path = $request->file('product_image')->store('product_images', 'public');
            $validated['product_image'] = Storage::url($path); // Generate the correct URL
        } else {
            // Retain the existing image if no new image is uploaded
            $validated['product_image'] = $product->product_image;
        }
    
        // Update the product
        $product->update($validated);
    
        // Return a JSON response
        //return response()->json(['message' => 'Product updated successfully'], 200);
    }




    // DELETE the specified PRODUCT
    public function destroy(Product $product)
    {
        $product->delete(); // Delete product from database
        
        //return response()->json(['message' => 'Product deleted successfully'], 200); // Return success message
    }
}
