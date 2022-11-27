<div class="bg-admin">

    @extends('layouts.admin')

    @section('page')

    <div class="admin-tables">
        <table>
            <thead>
                <tr>

                    <th>User ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Product ID</th>
                    <th>Product Name<th>
                    <th>Product Quantity<th>
                    <th>Subtotal</th>
                    <th>Status of order</th>
                    <th>When order was created</th>
                    <th>Order ID<th>

                </tr>
            </thead>

            <body>
                @foreach($orders as $order)
                <tr>

                    <td>{{ $order->userID }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->name }}</td>
                    <td>@foreach($order['order_products'] as $ord)
                        #{{$ord['productID']}}<br><br>
                        @endforeach</td>
                    <td> @foreach($order->order_products as $product)
                        {{$product->productinfo->productName}}<br><br>
                        @endforeach<td>
                        <td> @foreach($order->order_products as $product)
                        x{{$product->qty}}<br><br>
                        @endforeach<td>
                    <td>£{{ $order->subtotal }}</td>
                    <td>
                        <div class="select-styling">
                            <select>
                                <option selected>{{ $order->status }}</option>
                                <option value="1">@if ( $order->status == "pending") completed @else Pending @endif
                                </option>
                            </select>
                        </div>
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->id }}</td>
                </tr>
                @endforeach
            </body>
        </table>
    </div>
</div>
@endsection
