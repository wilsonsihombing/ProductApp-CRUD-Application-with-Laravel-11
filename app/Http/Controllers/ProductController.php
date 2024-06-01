<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products.index', ['products' => $products]);
    // }

    function add()
    {
        return view('products.add');
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->save();

        return redirect('/')->with('success', 'Product added successfully');
    }

    function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');

        $product->update();

        return redirect('/')->with('success', 'Product updated successfully');
    }

    function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect('/')->with('success', 'Product deleted successfully');
    }

    public function index(Request $request) {
        $query = Product::query();
    
        // Logika pencarian
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        }
    
        // Logika filter kategori
        if ($request->has('category') && $request->input('category') != '') {
            $query->where('category', $request->input('category'));
        }
    
        $products = $query->paginate(10); // Atur pagination sesuai kebutuhan
    
        return view('products.index', compact('products'));
    }
    
}