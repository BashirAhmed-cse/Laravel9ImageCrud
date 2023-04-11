<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;


class ProductController extends Controller
{
    public function all_products()
    {
        $products = Product::get();
        return view('product', compact('products'));
    }

    public function add_new_product()
    {
        return view('addProduct');
    }


    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('image/products', $imageName);
        }
        Product::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);
        return view('product');
    }


    public function edit_product($id)
    {
        $products = Product::FindOrFail($id);
        return view('editProduct', compact('products'));
    }


    public function update_product(Request $request, $id)
    {
        $product = Product::FindorFail($id);

        $imageName = '';
        $deleteOldImage = 'image/products/' . $product->image;

        if ($image = $request->file('image')) {

            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('image/products', $imageName);
        } else {
            $imageName = $product->image;
        }
        Product::where('id', $id)->update([
            'name' => $request->name,
            'image' => $imageName,
        ]);
        return view('product');
    }
}
