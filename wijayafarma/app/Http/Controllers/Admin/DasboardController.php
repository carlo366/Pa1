<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\deseases;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\Eloquent\Relations\MorphMany;

class DasboardController extends Controller
{
       public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }


    public function index(){
        $product = Product::count();
        $category = Category::count();
        $today = Carbon::today();
        $orders = Order::whereDate('time', $today)->whereIn('status', ['in progress', 'selesai'])->count();

        $ordercount = Order::count();
        $count = Order::whereIn('status', ['in progress','selesai'])->get();
        $deseases = deseases::count();
        //Pada bagian ini, kita mendapatkan admin yang sedang terautentikasi (logged-in user) menggunakan Auth::user().
        $admin = Auth::user();

        $order = Order::get();
        //mendapatkan semua pesanan (order) dari database. Dalam loop foreach
        foreach ($order as $item) {
            $notif = $admin->notifications()->where('data->id',$item->id)->first();
// kita memeriksa setiap pesanan apakah admin sudah memiliki notifikasi untuk pesanan tersebut.
//Jika tidak, kita membuat notifikasi baru menggunakan pesanan tersebut dan mengirim notifikasi kepada admin.
            if(!$notif){
                $save = new OrderNotification($item);
                $admin->notify($save);
            }
        }
        return view('admin.dasboard',compact('product','category','orders','deseases','admin','count','ordercount'));
    }
    public function read($id){
        if($id){
            Auth::user()->notifications()->where('id',$id)->first()->markAsRead();
        }
        return redirect()->back();
    }
    public function editprofileadmin(){
        return view('admin.editprofile');
    }
}
