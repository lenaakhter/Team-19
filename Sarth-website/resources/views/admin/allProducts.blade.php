
<div class="bg-admin-products">

    @extends('layouts.admin')
    @section('page')

    <div class="admin-tables">
        <table>
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Image</th>
                    <th>Product name</th>
                    <th>Product Description</th>
                    <th>Price</th>
                    <th>Age Rating</th>
                    <th>Available Stock</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <body>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->productID }}</td>
                    <td><img src="{{ $product->imageLocation }} " alt="image of game" height="125px" width="100px"></td>
                    <td>{{ $product->productName }}</td>
                    <td>{{ $product->productDescription }}</td>
                    <td>£{{ $product->price }}</td>
                    <td>{{ $product->ageRating }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><button type="button"><a href="{{ url('/admin/update/'.$product->productID ) }}">Update</a></td>
                    </button>
                    <td><button type="button"> <a href="{{ url('/admin/removeGame/'.$product->productID) }}">Delete</a>
                    </td> </button>
                </tr>
                @endforeach

            </body>
        </table>
    </div>

</div>
@endsection