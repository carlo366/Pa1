@extends('admin.layouts.template')
@section('title','Admin | peddingorders')
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages / </span> Pedding Order</h4>
    <div class="card mb-5">
        <div class="table-responsive text-nowrap container pb-4">
            <h5 class="card-header">All Order Information</h5>
        <table class="table" >
            <tr>
    <th>User Id</th>
    <th>Status</th>
    <th>OrderDate</th>
    <th>payment</th>
    <th>Action</th>
            </tr>
    @foreach ($pending_orders as $order)
    <tr>
        <td>{{$order->user_id}}</td>
        <td>{{$order->status}}</td>
        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
        @if (empty($order->img_bayar))
        <td>Belum Bayar</td>
    @else
        <td>Sudah Bayar</td>
    @endif

        <td><a href="{{route('pendingorderdetail',$order->id)}}" class="btn btn-primary">view</a></td>
    </tr>
    @endforeach
        </table>
 </div>
    </div>

     <div class="card">
        <div class="table-responsive text-nowrap container pb-4">
            <h5 class="card-header">History Order</h5>
        <table class="table" >
            <tr>
    <th>User Id</th>
    <th>Status</th>
    <th>OrderDate</th>
    <th>Action</th>
            </tr>
    @foreach ($pending_selesai as $order)
    <tr>
        <td>{{$order->user_id}}</td>
        <td>{{$order->status}}</td>
        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
        <td><a href="{{route('pendingorderdetail',$order->id)}}" class="btn btn-primary">view</a></td>
    </tr>
    @endforeach
        </table>
 </div>
    </div>
    </div>
@endsection
