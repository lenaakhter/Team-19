@extends('layouts.admin')

@section('page')

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>User ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Subtotal</th>
            <th>Quantity</th>
            <th>Status of order</th>
            <th>When order was created</th>
            
        </tr>
    </thead>
    <body>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->productID }}</td>
            <td>{{ $order->userID }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->subtotal }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach

    </body>

    </body>
</table>
@endsection
