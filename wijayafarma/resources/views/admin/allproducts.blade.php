@extends('admin.layouts.template')
@section('title','Admin | allproduct')
@push('css')
    <link href="{{asset('css/tables.css')}}" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtbl').DataTable();
        });
    </script>
@endpush
@section('content')
<div class="container-fluid p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> All Product</h4>
    <div class="card">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif
        <div class="table-responsive text-nowrap container pb-4">
            <h5 class="card-header">All Product Information</h5>
          <table class="table" id="dtbl">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>Jenis Penyakit</th>
                <th>Jenis Obat</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($products as $product)
              <tr>
                <form action=""></form>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>   @if(json_decode($product->product_img))<div class="">@foreach(json_decode($product->product_img) as $image)<img src="{{ asset($image) }}" style="height:100px; width:200px;" alt="">@endforeach <br>
                        <a href="{{route('editproductimg',$product->id)}}" class="btn btn-primary">Update Image</a>
                        </div>
                        @else
                        <div class=""><img src="{{asset($product->product_img)}}" height="100em" width="100em" alt=""> <br>
                            <a href="{{route('editproductimg',$product->id)}}" class="btn btn-primary">Update Image</a>
                        </div>
                        @endif
                    <td>{{$product->product_category_name}}</td>
                    <td>{{$product->tipe}}</td>
                    </td>
                    @if ($product->quantity === 0)
                    <td><p class="text-danger">Stok Habis</p></td>
                    @else
                    <td>{{$product->quantity}}</td>
                    @endif
                    <td>{{$product->product_deskripsi}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('editproduct',$product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('deleteproduct' ,$product->id)}}" data-name="" class="btn btn-warning delete" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
          </table>
        </div>
    </div>
    {{-- {{$products->links()}} --}}
</div>
@endsection
