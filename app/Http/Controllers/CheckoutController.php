<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $toys = session()->get('cart', []);
        return view('checkout.index', compact('toys'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        
        // Create an invoice
        $invoice = Invoice::create([
            "user_id" => auth()->user()->id,
            "total_price" => $request->input('total_price'),
        ]);

        // Add items to invoice details
        foreach ($cart as $item) {
            InvoiceDetail::create([
                "invoice_header_id" => $invoice->id,
                "toy_id" => $item["id"],
                "quantity" => $item['quantity'],
                "subTotal" => $item["quantity"] * $item["price"]
            ]);
        }

        // Clear the cart after checkout
        session()->forget('cart');

        // Restore old cart if needed
        if (session()->has('old_cart')) {
            session()->put('cart', session()->get('old_cart', []));
            session()->forget('old_cart');
        }

        return redirect()->route('home');
    }
}
