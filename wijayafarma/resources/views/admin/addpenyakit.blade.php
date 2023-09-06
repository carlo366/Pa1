@extends('admin.layouts.template')
@section('title','Admin | addpenyakit')
@section('content')
<div class="container p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> Add Penyakit</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah Penyakit</h5>
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
        <form action="{{route('storepenyakit')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Penyakit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nama_Penyakit" name="Nama_Penyakit" placeholder="Nama Penyakit"/>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi Penyakit</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="Deskripsi" id="Deskripsi" placeholder="deskripsi" cols="30" rows="10"></textarea>
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Kirim Gambar</label>
            <div class="col-sm-10">
                <input type="file" id="Penyakit_img" class="form-control" name="Penyakit_img">
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Produk</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
