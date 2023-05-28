<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    //
    //display listing product
    public function index(): View {
        $products = Product::latest()->paginate(5);
        return view('product.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //show form for create product
    public function create(): View {
        return view('product.create');
    }

    //store new resource in storage
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
            'product_stock' => 'required',
            'price' => 'required'
        ]);

        $input = $request->all();

        if($image = $request->file('image')) {
            $imagePath = 'foto_produk/';
            $productImage = time()."_".$image->getClientOriginalName();
            $image->move($imagePath, $productImage);
            $input['image'] = $productImage;
        }

        Product::create($input);
        return redirect()->route('product.index')->with('success', 'Produk berhasil dibuat');
    }

    //display specified product
    public function show(Product $product): View {
        return view('product.show', compact('product'));
    }

    //show products's edit form
    public function edit(Product $product): View {
        return view('product.edit', compact('product'));
    }

    //update specified product
    public function update(Request $request, Product $product): RedirectResponse {
        $request->validate([
            'product_name' => 'required',
        ]);

        $input = $request->all();
        
        if($image = $request->file('image')) {
            $imagePath = 'foto_produk/';
            $productImage = time()."_".$image->getClientOriginalName();
            $image->move($imagePath, $productImage);
            $input['image'] = $productImage;
        } else {
            unset($input['image']);
        }
        
        $product->update($input);
        return redirect()->route('product.index')->with('product', 'Produk berhasil diupdate');
    }

    //delete specified product
    public function destroy(Product $product): RedirectResponse {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
