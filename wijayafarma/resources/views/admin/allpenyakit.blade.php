@extends('admin.layouts.template')
@section('title','Admin | allpenyakit')
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
<div class="container p-5">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> All Penyakit</h4>
    <div class="card">
        <h5 class="card-header">All Product Information</h5>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif
        <div class="table-responsive text-nowrap">
            <div class="container">

                <table class="table" id="dtbl">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Penyakit</th>
                            <th>Gambar</th>
                            <th>Deskrispsi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($all_penyakit as $penyakit)
                        <tr>
                            <td>{{$penyakit->id}}</td>
                            <td>{{$penyakit->Nama_Penyakit}}</td>
                    <td> <div class=""><img src="{{asset($penyakit->Penyakit_img)}}" height="100em" width="100em" alt=""> <br>
                        <a href="{{route('editpenyakitimg',$penyakit->id)}}" class="btn btn-primary">Update Image</a>
                    </div>
                    <td>{{$penyakit->Deskripsi}}</td>
                    <td>
                        <a href="{{route('editpenyakit',$penyakit->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('deletepenyakit',$penyakit->id)}}" data-name="" class="btn btn-warning delete" id="delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>
@endsection
