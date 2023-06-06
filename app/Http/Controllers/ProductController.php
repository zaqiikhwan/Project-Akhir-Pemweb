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
            ['images' => 'file|image|mimes:jpeg,png,jpg,gif,svg'],
            'product_stock' => 'required',
            'price' => 'required'
        ]);

        $input = $request->all();
        $images = array();
        if($files = $request->file('images')) {
            foreach($files as $file){
                $imagePath = 'foto_produk/';
                $productImage = time()."_".$file->getClientOriginalName();
                $file->move($imagePath, $productImage);
                $images[] = $productImage;
            }
        }

        $input['images'] = implode("|", $images);
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
        $existingImages = [];
    
        // Hapus gambar lama yang akan dihapus dari database
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            $deletedImages = explode("|", $deletedImages);

            // Hapus gambar dari array images
            $existingImages = explode("|", $product->images); // link1|link2|link3
            $existingImages = array_diff($existingImages, $deletedImages);

            // Hapus gambar dari penyimpanan
            foreach ($deletedImages as $deletedImage) {
                $imagePath = public_path('foto_produk/') . $deletedImage;
                if (is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $input['images'] = implode("|", $existingImages);
        }
    

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            // Upload dan simpan gambar baru
            $images = [];
            foreach ($files as $file) {
                $imagePath = 'foto_produk/';
                $productImage = time() . "_" . $file->getClientOriginalName();
                $file->move($imagePath, $productImage);
                $images[] = $productImage;
            }

            // Menggabungkan gambar baru dengan gambar lama
            $images = array_merge($existingImages, $images);
            $input['images'] = implode("|", $images);
        }

        $product->update($input);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    //delete specified product
    public function destroy(Product $product): RedirectResponse {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
