<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subcategory;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        $admin = Auth::user();

        $order = Order::get();
        foreach ($order as $item) {
            $notif = $admin->notifications()->where('data->id',$item->id)->first();
            if(!$notif){
                $save = new OrderNotification($item);
                $admin->notify($save);
            }
        }
        return view('admin.allproducts', compact('products','admin'));
    }
    public function AddProduct(){
        $categories = Category::latest()->get();
        $admin = Auth::user();

        $order = Order::get();
        foreach ($order as $item) {
            $notif = $admin->notifications()->where('data->id',$item->id)->first();
            if(!$notif){
                $save = new OrderNotification($item);
                $admin->notify($save);
            }
        }
        return view('admin.addproduct',compact('categories','admin'));
    }
      public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_tipe' => '',
            'product_deskripsi' => 'required',
            'product_category_id' => 'required|exists:categories,id',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
        ]);


        $image = $request->file('product_img');
        $image_name =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;

        $category_id = $request->product_category_id;

        $category_name = Category::where('id',$category_id)->value('category_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_deskripsi' => $request->product_deskripsi,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_category_id' => $request->product_category_id,
            'product_img' => $image_url,
            'quantity' => $request->quantity,
            'tipe' => $request->product_tipe,
        ]);


        return redirect()->route('allproduct')->with('message','Tambah Produk Berhasil!');

    }
    public function EditProductImg($id){
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg',compact('productinfo'));
    }
    public function UpdateProductImg(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/' . $image_name;

        Product::findOrFail($id)->update([
            'product_img' => $image_url,
        ]);

        return redirect()->route('allproduct')->with('message','Gambar Produk Berhasil Di Update');
    }
    public function EditProduct($id){
        $categories = Category::latest()->get();
        $product = Product::findOrFail($id);

        return view('admin.editproduct', compact('product','categories'));
    }
    public function updateproduct(Request $request){
        $id = $request->id;

        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'tipe' => '',
            'quantity' => 'required',
            'product_deskripsi' => 'required',
            // 'product_category_id' => 'required|exists:categories,id',
        ]);

        $category_id = $request->product_category_id;

        $category_name = Category::where('id',$category_id)->value('category_name');

        Product::findOrFail($id)->update([
            'product_name' => $request->product_name,
            'product_deskripsi' => $request->product_deskripsi,
            'price' => $request->price,
            'tipe' => $request->tipe,
            'quantity' => $request->quantity,
            // 'product_category_name' => $category_name,
        ]);
        return redirect()->route('allproduct')->with('message','Produk Berhasil Di Update');


    }
    public function DeleteProduct($id){
        Product::findOrFail($id)->delete();

        return redirect()->route('allproduct')->with('message','Produk Berhasil Di Hapus');
    }

}
