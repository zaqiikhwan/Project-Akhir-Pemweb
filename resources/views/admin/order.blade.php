@extends('admin.layouts.main')

@section('content')
    <table id="order-table" class="table-fixed">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        @foreach ($order as $idx => $val)
        <tr>
            <td>{{$idx + 1}}</td>
            <td>{{$val->product_name}}</td>
            <td>{{$val->quantity}}</td>
            <td>{{$val->price}}</td>
            <td>{{$val->first_name}}</td>
            <td>{{$val->address}}</td>
            <td>{{$val->phone}}</td>
            <td>{{date_format($val->created_at,"d M Y")}}</td>
            <td>{{$val->status}}</td>
        </tr>    
        @endforeach
    </table>
@endsection