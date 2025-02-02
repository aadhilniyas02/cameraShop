<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Display the CART items for the authenticated user.
    public function index()
    {
        $carts = Cart::with(['user', 'product'])->where('user_id', auth()->id())->get();
        return CartResource::collection($carts);
    }

    // Add an item to the CART
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::updateOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);

        return new CartResource($cart);
    }

    
    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Update the quantity of the item in CART.
    public function update(Request $request, string $id)
    {
         $this->authorize('update', $cart); // Ensure the user owns the CART

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update([
            'quantity' => $validated['quantity'],
        ]);

        return new CartResource($cart);
    }

    // Remove the item from CART .
    public function destroy(string $id)
    {
        $this->authorize('delete', $cart); // Ensure the user owns the CART

        $cart->delete();

        return response()->json(['message' => 'Item removed from cart.'], 200);
    }
}
