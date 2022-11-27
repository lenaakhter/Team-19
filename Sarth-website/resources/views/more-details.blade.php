<div class="bg-image">
    @extends ('layouts.main')

    @section('pageInfo')


    <div class="content">
        <div class="title">
            <h1>More Details</h1>
        </div>

    </div>

    <div class="orders-table">
        <table class="table">
            <thead>

                <tr>
                    <th scope="col">Game</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sarth Key</th>
                </tr>
            </thead>
            <tbody>
                @foreach($moreDetails->order_products as $product)
                <tr>
                    <td> <img src="{{$product->productinfo->imageLocation}}" class="img-fluid rounded-3"
                            alt="Game - img" width="100" height="130"></td>
                    <td>{{$product->productinfo->productName }}</td>
                    <td>£{{$product->productinfo->price }}</td>
                    <td>{{$product->qty }}</td>
                    <td>{{$product->gamekey }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4> Subtotal: £{{$moreDetails->subtotal}}</h4>
    </div>
    <br>

</div>
@endsection