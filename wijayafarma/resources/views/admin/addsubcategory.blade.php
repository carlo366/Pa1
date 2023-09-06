@extends('admin.layouts.template')
@section('title','Admin | addsubcategory')
@section('content')
<div class="container p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> Add Sub Categori</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambahal Sub Kategori Baru</h5>
        <small class="text-muted float-end">informasi input</small>
      </div>
      <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('storesubcategory')}}" method="POST">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Sub Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="subcategory" name="subcategory_name"  name="category_name"/>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Categori</label>
            <div class="col-sm-10">
                <select class="form-select" id="category" name="category_id" aria-label="Default select example">
                    <option selected>category</option>
                    @foreach ($categories as $categori)
                    <option value="{{$categori->id}}">{{$categori->category_name}}</option>
                    @endforeach
                  </select>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Sub Categori</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
