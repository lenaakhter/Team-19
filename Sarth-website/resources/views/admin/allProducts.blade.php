
<div class="bg-long">

    @extends('layouts.admin')
    @section('page')

    @if (session()->has('messageDelete'))
        <div class= "alert alert-success" role="alert" id="go-to-basket">{{ session()->get('messageDelete') }}</div>
    @endif

    @if (session()->has('messageUpdate'))
        <div class="alert alert-success" role="alert" id="go-to-basket">{{ session()->get('messageUpdate') }}</div>
    @endif

    @if (session()->has('messageAdd'))
        <div class="alert alert-success" role="alert">{{ session()->get('messageAdd') }}</div>
    @endif

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
                    <td><button type="button" class="admin-btn"><a href="{{ url('/admin/update/'.$product->productID ) }}">Update</a></td>
                    </button>
                    <td><button type="button" class="admin-btn" onclick="return confirm('Do you want to delete this game?')"> <a href="{{ url('/admin/removeGame/'.$product->productID) }}">Delete</a>
                    </td> </button>
                </tr>
                @endforeach

            </body>
        </table>
    </div>

</div>
@endsection