<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('products.list', ['products' => $products]);
    }

    public function detail($id)
    {
       // als de image niet getoond wordt:
       //   Create a symbolic link from public/storage to storage/app/public
       //   Using the method we have taken above, images are going to be stored in 
       //   the storage directory, or more specifically in storage/app/public/images. 
       //   This location is not accessible using web requests. In order to enable this, 
       //   we need to create a symlink from public/storage to storage/app/public. 
       //   There is an easy command you can run to do this for you: 
       //       php artisan storage:link
       //   You can run this in the terminal right from the root directory of your project. 

        // de 2 lijnen hieronder kunnen vervangen worden door direct model binding
        $product = Product::find($id);
        return view('products.detail', ['product' => $product]);

        //return view('products.detail', ['product' => $id]); // werkt niet!
    }
 
     public function new()
    {
        return view('products.new');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->naam = $request->input('naam');
        $product->categorie = $request->input('categorie');
        $product->omschrijving = $request->input('omschrijving');
        if ($request->hasFile('filename')) {
            $product->image = $request->input('filename')->store('public/images'); }
        $product->prijs = $request->input('prijs');
        $product->user = $request->input('user');
        $product->save();
        //return redirect()->back()->with('status','Product Updated Successfully');
        return redirect('/products');
    } 
    public function store()
    {
        var_dump(request('naam'));
        var_dump(request('categorie'));
        var_dump(request('omschrijving'));
        var_dump(request('image'));

        $this->validate(request(), [
            'naam' => 'required:products',
            'categorie' => 'required',
            'omschrijving' => 'required',
            'prijs' => 'required',
            'user' => 'required',
        ]);
    
        $product = new Product;
        
        $product->naam = request('naam');
        $product->categorie = request('categorie');
        $product->omschrijving = request('omschrijving');
        $temp = request()->file('image')->store('public/images');
        $product->image = substr($temp, 7);
        $product->prijs = request('prijs');
        $product->user = request('user');
        $product->save();

        return redirect('/products');
    }
}
