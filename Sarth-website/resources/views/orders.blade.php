<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')

    @if(count($orders) == 0)
    <div class="no-orders">
        <h3>You do not have any Previous orders</h3>

    </div>
    @else
    <div class="orders-table-title">
        <h3>Your Previous Order(s)</h3>
    </div>

    <div class="orders-table">
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
    </div>
    <i>Purchased Sarth keys are sent to the registered Email</i><br>

    @endif
</div>
@endsection