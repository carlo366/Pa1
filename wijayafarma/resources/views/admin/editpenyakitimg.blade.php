@extends('admin.layouts.template')
@section('title','Admin | editroductimg')
@section('content')
<div class="container p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> Edit Gambar</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Gambar</h5>
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
        <form action="{{route('updatepenyakitimg')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Gambar Sebelumnya</label>
            <div class="col-sm-10">
                <img src="{{asset($penyakitinfo->Penyakit_img)}}" alt="" style="width: 500px">
                            </div>
          </div>

          <input type="hidden" name="id" value="{{$penyakitinfo->id}}" id="">

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Kirim Gambar</label>
            <div class="col-sm-10">
                <input type="file" id="Penyakit_img" class="form-control" name="Penyakit_img">
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update gambar desease</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
