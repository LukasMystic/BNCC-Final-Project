<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.toys.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Toy::create([
            'image' => $imgName,
            'name' => $request->input('name'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('admin.home');
    }

    public function detail(Toy $toys)
    {
        return view('admin.toys.detail', compact('toys'));
    }

    public function delete(Toy $toys)
    {
        $toys->delete();
        return redirect()->route('admin.home');
    }

    public function edit(Toy $toys)
    {
        $categories = Category::all();
        return view('admin.toys.edit', compact(['toys', 'categories']));
    }

    public function update(Request $request, Toy $toys)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Get the image
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            // Update the toy with the new image
            $toys->update([
                "image" => $imgName,
                "name" => $request->input('name'),
                "category_id" => $request->input('category'), // Corrected key
                "description" => $request->input('description'),
                "price" => $request->input('price'),
            ]);
        } else {
            // Update the toy without changing the image
            $toys->update([
                "name" => $request->input('name'),
                "category_id" => $request->input('category'), // Corrected key
                "description" => $request->input('description'),
                "price" => $request->input('price'),
            ]);
        }

        return redirect()->route('admin.home')->with('success', 'Toy updated successfully.');
    }


    public function order(Toy $toys){
        $food_id = $toys->id;
        $cart = session()->get('cart', []);
        if (isset($cart[$food_id])) {
            $cart[$food_id]["quantity"]++;
        } else {
            $cart[$food_id] = [
                "id" => $food_id,
                "name" => $toys->name,
                "image" => $toys->image,
                "category" => $toys->category->name,
                "price" => $toys->price,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function deleteOrder($id) {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('checkout.index');
    }

    public function adminSearch(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::all(); // Assuming you need categories for the navbar
        $toys = Toy::where('name', 'like', "%$query%")->get();

        return view('admin.toys.search-results', compact('toys', 'categories', 'query'));
    }

}
