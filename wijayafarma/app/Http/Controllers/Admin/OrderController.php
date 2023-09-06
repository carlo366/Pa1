<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $pending_orders = Order::whereIn('status', ['pending', 'in progress'])
        ->orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END, created_at DESC")
        ->get();
$pending_selesai = Order::where('status', 'selesai')->latest()->get();

$admin = Auth::user();

$order = Order::get();
foreach ($order as $item) {
    $notif = $admin->notifications()->where('data->id',$item->id)->first();
    if(!$notif){
        $save = new OrderNotification($item);
        $admin->notify($save);
    }
}
        return view('admin.peddingorders',compact('pending_orders','pending_selesai','admin'));
    }
    public function detail($id){
        $pedding = Order::findOrFail($id);
// $peding_orders = Order::where('status', 'pending')->latest()->get();
return view('admin.peddingorderdetail', compact('pedding'));

    }
    public function orderadmin($id){
        $pedding = Order::findOrFail($id);

return view('admin.peddingorderdetail', compact('pedding'));

    }
    public function approveOrder($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'in progress';
    $order->save();

    // Redirect ke halaman yang tepat atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Order has been approved.');
}
    public function rejectOrder($id)
    {
        $order = Order::findOrFail($id);

        // Mengurangi quantity produk yang tersedia
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
        return redirect()->route('pendingorder')->with('success', 'Order has been rejected.');
    }
    public function cancelOrder($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'pending';
    $order->save();

    // Redirect ke halaman yang tepat atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Order has been cancel.');
}
}
