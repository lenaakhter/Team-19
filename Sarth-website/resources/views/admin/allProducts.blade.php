@extends('layouts.admin')

@section('page')

<h1>All games</h1>

<table>
    <thead>
        <tr>
            <th>ProductID</th>
            <th>Image</th>
            <th>Product name</th>
            <th>Product Description</th>
            <th>Price</th>
            <th>Age Rating</th>
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
            <td><a href="{{ url('/admin/update/'.$product->productID ) }}">Update</a></td>
            <td><a href="{{ url('/admin/removeGame/'.$product->productID) }}">Delete</a></td>
        </tr>
        @endforeach

    </body>
</table>
@endsection