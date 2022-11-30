<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')

    @if(count($orders) == 0)
    <div class="no-orders">
        <div class="no-orders-image">
            <a href="/" class="sadBox"><img src="images/sadBox.png" alt="" /></a>
        </div>
        <div class="no-orders-1">
            <h3>Looks like you have no Active Orders.</h3>
        </div>
        <div class="no-orders-2">
            <p>Let's Change That!</p>
        </div>
        <div class="no-orders-3">
            <button type="button" onclick=window.location.href="/products" class="shop-now-btn">Shop Now!</button>
        </div>
    </div>
    @else

    <div class="orders-table">

        <div class="orders-table-title">
            <h3>Your Previous Order(s)</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Ordered on</th>
                    <th scope="col">More Details</th>
                </tr>
            </thead>
            @foreach($orders as $order)

            <body>

                <tr>

                    <td>{{$order['id']}}</td>
                    <td>@foreach($order['order_products'] as $ord)
                        #{{$ord['productID']}}<br>
                        @endforeach
                    </td>
                    <td>{{$order['email']}}</td>
                    <td>{{$order['status']}}</td>
                    <td>£{{$order['subtotal']}}</td>
                    <td>{{date('d-m-Y', strtotime($order['created_at']))}}</td>
                    <td><a href="{{url('orders/'.$order['id'])}}">Order Details</a></td>


                </tr>
                @endforeach
            </body>
        </table>
        <br>
        <i>Purchased Sarth keys are sent to the registered Email</i>
        <br>

    </div>

    @endif
</div>
@endsection