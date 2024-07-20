<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toy;

class CartController extends Controller
{
    public function buyNow(Toy $toys)
    {
        // Backup the current cart
        session()->put('old_cart', session()->get('cart', []));

        // Clear the cart to ensure only the selected item is added
        session()->forget('cart');

        // Add the selected toys item to the cart
        $cart = session()->get('cart', []);
        $cart[$toys->id] = [
            "id" => $toys->id,
            "name" => $toys->name,
            "price" => $toys->price,
            "quantity" => 1,
            "image" => $toys->image,
            "category" => $toys->category->name,
        ];
        session()->put('cart', $cart);

        // Redirect to the checkout page
        return redirect()->route('checkout.index');
    }

    public function restore()
    {
        // Restore the old cart
        session()->put('cart', session()->get('old_cart', []));
        session()->forget('old_cart');

        // Redirect to the checkout page
        return redirect()->route('checkout.index');
    }
    
}
