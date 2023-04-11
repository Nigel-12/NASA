<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $data = DB::table("products")->get();
        return view('product.index',['products'=>$data]);
    } 

    public function delete($id) {
        $product = product::find($id);
        $product->delete();

        return redirect('/')->with('success_del', 'Item deleted successfully');
    }

    public function edit($id){
        $data=Product::findOrFail($id);
        return view('product.edit',['product'=>$data]);
    }

    public function updateProduct(Request $req){
        $req->validate([
            "productName"=>['required','min:3'],
            "productPrice"=>['required','min:3'],
            "productQuantity"=>['required','min:3'],
        ]);

        $data=Product::find($req->id);
        $data->productName=$req->productName;
        $data->productPrice=$req->productPrice;
        $data->productQuantity=$req->productQuantity;

        $data->save();
        return redirect("/")->with('success', 'Product updated successfully.');
    }


    public function addProduct()
    {
        return view('product.add');
    }
    
    public function saveProduct(Request $req)
    {
        $validated=$req->validate([
            "productName"=>['required','min:2'],
            "productPrice"=>['required','min:1'],
            "productQuantity"=>['required','min:1'],
            
        ]);

        $data=Product::create($validated);
        return redirect("/")->with('success','Product added successfully');
    }


    public function logout(Request $req)
    {
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login');
    }
    
}
