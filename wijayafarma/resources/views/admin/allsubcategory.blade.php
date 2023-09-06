@extends('admin.layouts.template')
@section('title','Admin | allsubcategory')
@section('content')
<div class="container p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> All Sub
        Categori</h4>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif

    <div class="card">
        <h5 class="card-header">Light Table head</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Nama Sub Categori</th>
                <th>Categori</th>
                <th>Produk</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($allsubcategories as $allsubcategori )

                <tr>
                    <td>{{$allsubcategori->id}}</td>
                    <td>{{$allsubcategori->subcategory_name}}</td>
                    <td>{{$allsubcategori->category_name}}</td>
                    <td>{{$allsubcategori->product_count}}</td>
                <td>
                    <a href="{{route('editsubcat', $allsubcategori->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('deletesubcat', $allsubcategori->id,$allsubcategori->category_id)}}" class="btn btn-warning">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection
