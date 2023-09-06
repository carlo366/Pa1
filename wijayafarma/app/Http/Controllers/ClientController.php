<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
        public function index(){
        $allproduct = Product::latest()->get();
    return view('users.home',compact('allproduct'));
    }
     public function Dasboard(){
    $allproduct = Product::latest()->get();
    return view('users.home',compact('allproduct'));
    }
    public function Penyakit(){
        return view('users.penyakit');
    }

    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
    return view('users.category',compact('category','products'));
    }
        public function Product(){
    return view('users.allproduct');
    }
    public function PeddingOrdersDetil($id){
        $pedding = Order::findOrFail($id);

        return view('users.peddingorderdetil',compact('pedding'));
    }
    public function orderdelete($id)
    {
        $order = Order::findOrFail($id);

        // Menambahkan quantity produk yang tersedia
        $productIds = json_decode($order->product_id);
        $quantities = json_decode($order->quantity);

        foreach ($productIds as $index => $productId) {
            $product = Product::findOrFail($productId);
            $product->quantity += $quantities[$index];
            $product->save();
        }

        // Hapus pesanan
        $order->delete();

        // Redirect ke halaman yang tepat atau tampilkan pesan sukses
        return redirect()->route('peddingorders')->with('message', 'Pesanan berhasil dihapus.');
    }

    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_category_id');
        $related_products = Product::where('product_category_id', $subcat_id)->latest()->get();
//Mengambil semua pesanan (order) yang memiliki ID produk seperti yang diberikan dalam parameter $id,
// dan memiliki kolom ulasan yang tidak null. Hasilnya disimpan dalam variabel $orders.
        $orders = Order::where('product_id', 'LIKE', '%' . $id . '%')->whereNotNull('ulasan')->get();


        $comments = [];
        $userIds = [];
        $userNames = [];
        $createdDates = [];
        foreach ($orders as $order) {
            $productIds = json_decode($order->product_id);
//Memeriksa apakah ID produk yang diberikan ada dalam array $productIds menggunakan fungsi in_array.
//Jika iya, artinya pesanan tersebut terkait dengan produk yang sedang diproses dalam metode ini.
            if (in_array($id, $productIds)) {
                $comments[] = $order->ulasan;
                $userIds[] = $order->user_id;
                $userNames[] = User::where('id', $order->user_id)->value('name');
                $createdDates[] = $order->created_at;
            }

        }

        return view('users.productdetail', compact('product', 'related_products', 'comments', 'userIds', 'userNames', 'createdDates'));
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        return view('users.addtocart',compact('cart_items'));
    }


    public function deletecart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->back()->with('message','Keranjang berhasil Dihapus');
    }

    public function AddProductToCart(Request $request)
{
    $product = Product::find($request->product_id);

    $userid = Auth::id();
    $totalQuantityInCart = Cart::where('user_id', $userid)
        ->where('product_id', $request->product_id)
        ->sum('quantity');

    $totalQuantityRequested = $totalQuantityInCart + $request->quantity;

    if ($totalQuantityRequested <= $product->quantity) {
        Cart::Insert([
            'product_id' => $request->product_id,
            'product_nama' => $request->product_name,
            'product_img' => $request->product_img,
            'user_id' => $userid,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('product')->with('message', 'Barang Berhasil Ditambahkan ke Keranjang');
    } else {
        return redirect()->route('product')->with('error', 'Stok tidak cukup. Jumlah yang diminta: ' . $request->quantity . ', Stok tersedia: ' . $product->quantity . ', Jumlah di keranjang: ' . $totalQuantityInCart);
    }
}


    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity = $request->input('quantity');
        $cart->save();

        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }

    public function about(){
        return view('users.about');
    }
    public function GetShippingaddress(){
        return view('users.shipping');
    }
    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message','Barang Berhasil Dihapus dari keranjang');
    }

    public function CheckOut(Request $request)
    {
        $userid = Auth::id();
        $checkedItems = $request->input('ids', []);

        if (empty($checkedItems)) {
            return redirect()->back()->with('error', 'Pilih produk sebelum melanjutkan ke checkout.');
        }

        // Dapatkan hanya item yang dicentang dari keranjang
        $cart_items = Cart::whereIn('id', $checkedItems)->where('user_id', $userid)->get();

        // Kirim data checkbox yang dipilih ke halaman checkout
        return view('users.checkout', compact('cart_items', 'checkedItems'));

        }


        public function PlaceOrder(Request $request)
{
    $userid = Auth::id();
    $checkedItems = $request->input('ids', []);

    if (empty($checkedItems)) {
        return redirect()->back()->with('error', 'Pilih produk sebelum melanjutkan ke checkout.');
    }

    // Dapatkan hanya item yang dicentang dari keranjang
    $cart_items = Cart::whereIn('id', $checkedItems)->where('user_id', $userid)->get();
//Mengambil item-item dari keranjang dengan mengkombinasikan dua kriteria: hanya item dengan ID yang ada dalam $checkedItems dan hanya item-item yang milik pengguna dengan ID $userid. Hasilnya disimpan dalam variabel $cart_items.
    $shipping_phonenumber = $request->input('shipping_phonenumber');
    $shipping_city = $request->input('shipping_city');
    $nama = $request->input('nama');
    $address = $request->input('address');
    $shipping_postalcode = $request->input('shipping_postalcode');

    // Periksa validitas data pengiriman
    if (!$shipping_phonenumber || !$shipping_city || !$address || !$shipping_postalcode) {
        // Tangani situasi di mana nilai-nilai tersebut tidak valid
        // Misalnya, tampilkan pesan kesalahan kepada pengguna atau lakukan tindakan lain sesuai kebutuhan Anda.
        // Kemudian kembalikan respons atau lakukan pengalihan ke halaman yang sesuai.
    }

    $productIds = [];
    $productimgs = [];
    $productnames = [];
    $quantities = [];
    $prices = [];

    foreach ($cart_items as $item) {
        $productIds[] = $item->product_id;
        $productimgs[] = $item->product_img;
        $productnames[] = $item->product_nama;
        $quantities[] = $item->quantity;
        $prices[] = $item->price;

        // Mengurangi jumlah produk yang tersedia
        $product = Product::findOrFail($item->product_id);
        $product->quantity -= $item->quantity;
        $product->save();


        //Menghapus item keranjang yang telah diproses dalam perulangan sebelumnya. Menggunakan model Cart dan menghapus item berdasarkan ID item dan ID pengguna yang terautentikasi.
        Cart::where('id', $item->id)->where('user_id', $userid)->delete();
    }

    Order::insert([
        'user_id' => $userid,
        'shipping_phonenumber' => $shipping_phonenumber,
        'shipping_city' => $shipping_city,
        'address' => $address,
        'nama' => $nama,
        'shipping_postalcode' => $shipping_postalcode,
        'product_id' => json_encode($productIds),
        'product_nama' => json_encode($productnames),
        'product_img' => json_encode($productimgs),
        'quantity' => json_encode($quantities),
        'totalprice' => json_encode($prices)
    ]);

    return redirect()->route('peddingorders')->with('message', 'Berhasil Memesan');
}




        public function UserProfile(){
            return view('users.profile');
        }
        public function PeddingOrders(){
            $user = Auth::user();
    $pending_orders = Order::where('user_id', $user->id)
        ->whereIn('status', ['pending', 'in progress'])
        ->latest()
        ->get();

            return view('users.peddingorders',compact('pending_orders'));
    }

    public function uploadBayar(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        if ($request->hasFile('img_bayar')) {
            $image = $request->file('img_bayar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);

            // Update the order record with the image path
            $order->img_bayar = 'upload/' . $imageName;
            $order->save();

            return redirect()->back()->with('message', 'Bukti Pembayaran Berhasil Dikirim');
        }

        return redirect()->back()->with('error', 'kirim bukti pembayaran');
    }
    public function komentar(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $ulasan = $request->input('ulasan');
        // Set nilai ulasan pada order

        $order->ulasan = $ulasan;

        // Simpan perubahan pada order
        $order->save();


        return redirect()->back()->with('message', 'Terimakasi atas Ulasannya');
    }


    public function History(){
        $user = Auth::user();
    $completed_orders = Order::where('user_id', $user->id)
        ->whereIn('status', ['status', 'selesai'])
        ->latest()
        ->get();

        return view('users.history', compact('completed_orders'));
    }
        public function NewRelease(){
        return view('users.newrelease');
    }
    public function TodayDeal(){
        return view('users.todaydeal');
    }
    public function CustomerService(){
        return view('users.customerservice');
    }

    public function incrementQuantity($id)
    {
        $cartItem = Cart::find($id);
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $product = Product::find($cartItem->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $totalQuantityInCart = Cart::where('product_id', $cartItem->product_id)
            ->where('user_id', $cartItem->user_id)
            ->sum('quantity');

        $availableQuantity = $product->quantity - $totalQuantityInCart;
        if ($totalQuantityInCart >= $product->quantity) {
            return redirect()->back()->with('error', 'Jumlah produk melebihi stok '.$totalQuantityInCart);
        }

        $cartItem->quantity++;
        $cartItem->save();

        return redirect()->back()->with('success', 'Quantity berhasil diincrement.');
    }



    public function decrementQuantity($id)
    {
        $product = Cart::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($product->quantity > 1) {
            $product->quantity--;
            $product->save();
        }
        else{
            return redirect()->back()->with('error', 'Pemesanan Tidak Boleh 0.');
        }

        return redirect()->back();
    }
    public function orderDelivered($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'selesai';
    $order->save();

    // Redirect ke halaman yang tepat atau tampilkan pesan sukses
    return redirect()->route('history')->with('message', 'Pesanan Sudah Sampai');
}
public function HistoryDetil($id){
    $pedding = Order::findOrFail($id);
    return view('users.historydetil',compact('pedding'));
}
public function webdelete($id)
{
        Order::findOrFail($id)->delete();
        return redirect()->route('peddingorders')->with('message','order berhasil Dihapus');
}
public function delete($id)
{
    // Find the order record
    $order = Order::findOrFail($id);

    // Delete the image from storage
    Storage::delete($order->img_bayar);

    // Update the order record with a null value for the image
    $order->img_bayar = null;
    $order->save();

    // Redirect or return a response as needed
    return redirect()->back()->with('message', 'Berhasil Menghapus Bukti Pembayaran');
}
public function updateProfile(Request $request)
{
    $user = Auth::user(); // Mengambil data user yang sedang login

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $date = $request->input('birth');
    $phone = $request->input('phone');
    $address = $request->input('address');

    // Menerapkan validasi pada inputan phone
    $validatedData = $request->validate([
        'phone' => 'numeric', // Mengharuskan inputan berupa angka
    ]);

    if ($validatedData) {
        $user->birthdate = $date;
        $user->address = $address;
        $user->phone = $phone;

        $user->save();

        return redirect()->back()->with('message', 'Berhasil Ditambah');
    } else {
        return redirect()->back()->with('error', 'Inputan phone harus berupa angka');
    }
}

public function editprofile(Request $request)
{
    $user = Auth::user(); // Mengambil data user yang sedang login

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }
    $name = $request->input('name');
    $email = $request->input('email');
    $date = $request->input('birth');
    $phone = $request->input('phone');
    $address = $request->input('address');

    // Menerapkan validasi pada inputan phone
    $validatedData = $request->validate([
        'phone' => 'numeric', // Mengharuskan inputan berupa angka
    ]);

    if ($validatedData) {
        $user->name = $name;
        $user->email = $email;
        $user->birthdate = $date;
        $user->address = $address;
        $user->phone = $phone;

        $user->save();

        return redirect()->back()->with('message', 'Profile Berhasil diubah');
    } else {
        return redirect()->back()->with('error', 'Inputan phone harus berupa angka');
    }
}

 public function editprofil(){
    return view('users.editprofile');
 }
 public function updategambar(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    // Menerapkan validasi pada inputan user_img
    $request->validate([
        'user_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('user_img')) {
        $image = $request->file('user_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $imageName);

        // Menghapus gambar lama jika ada
        if ($user->user_img) {
            $oldImagePath = public_path($user->user_img);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Update the user's image path
        $user->user_img = 'upload/' . $imageName;
        $user->save();

        return redirect()->route('userprofile')->with('message', 'Berhasil Diupdate');
    } else {
        return redirect()->back()->with('error', 'Inputan foto harus berupa file gambar');
    }
}

public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $categories = Category::latest()->get();
    $products = Product::where('product_name', 'like', '%'.$keyword.'%')->latest()->paginate(20);

    return view('users.search', compact('categories', 'products'));
}



}
