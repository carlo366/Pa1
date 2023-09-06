<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\deseases;
use App\Models\Order;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeseasesController extends Controller
{
    function index(){
        $all_penyakit = deseases::latest()->get();

        $admin = Auth::user();

        $order = Order::get();
        foreach ($order as $item) {
            $notif = $admin->notifications()->where('data->id',$item->id)->first();
            if(!$notif){
                $save = new OrderNotification($item);
                $admin->notify($save);
            }
        }
        return view('admin.allpenyakit',compact('all_penyakit','admin'));
    }
    function AddPenyakit(){
        $admin = Auth::user();

        $order = Order::get();
        foreach ($order as $item) {
            $notif = $admin->notifications()->where('data->id',$item->id)->first();
            if(!$notif){
                $save = new OrderNotification($item);
                $admin->notify($save);
            }
        }
        return view('admin.addpenyakit',compact('admin'));
    }
    function StorePenyakit(Request $request){
        $request->validate([
            'Nama_Penyakit' => 'required|unique:deseases',
            'Deskripsi' => 'required',
            'Penyakit_img' => 'required|image|mimes:png,jpg,jpeg,giv,svg|max:2048',
        ]);
        $image = $request  ->file('Penyakit_img');
        $image_name =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->Penyakit_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;

        deseases::insert([
            'Nama_Penyakit' => $request->Nama_Penyakit,
            'Deskripsi' => $request->Deskripsi,
            'Penyakit_img' => $image_url,
            'slug' => strtolower(str_replace('','-',$request->Nama_Penyakit)),
        ]);
        return redirect()->route('allpenyakit')->with('message','Tambah Penyakit Berhasil!');
    }
    public function EditPenyakitImg($id){
        $penyakitinfo = deseases::findOrFail($id);
        return view('admin.editpenyakitimg',compact('penyakitinfo'));
    }
    public function UpdatePenyakitImg(Request $request){
        $request->validate([
            'Penyakit_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $image = $request->file('Penyakit_img');
        $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->Penyakit_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/' . $image_name;

        deseases::findOrFail($id)->update([
            'Penyakit_img' => $image_url,
        ]);

        return redirect()->route('allpenyakit')->with('message','Gambar Penyakit Berhasil Di Update');
    }
    public function EditPenyakit($id){
        $penyakit = deseases::findOrFail($id);

        return view('admin.editpenyakit', compact('penyakit'));
    }
    public function updatePenyakit(Request $request){
        $id = $request->id;

        $request->validate([
            'Nama_Penyakit' => 'required',
            'Deskripsi' => 'required',
        ]);
        deseases::findOrFail($id)->update([
            'Nama_Penyakit' => $request->Nama_Penyakit,
            'Deskripsi' => $request->Deskripsi,
            'slug' => strtolower(str_replace('','-',$request->Nama_Penyakit)),
        ]);
        return redirect()->route('allpenyakit')->with('message','Penyakit Berhasil Di Update');


    }
    public function DeletePenyakit($id){
        deseases::findOrFail($id)->delete();
        return redirect()->route('allpenyakit')->with('message','Penyakit Berhasil Di Hapus');
    }

}
