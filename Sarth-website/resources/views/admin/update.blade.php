@extends('layouts.admin')

@section('page')

<div>
    <h1>Update game details</h1>
    <form action="/admin/update/{{ $game->productID }}" method="post" enctype="multipart/form-data"> 
    @csrf
    <label for="imageLocation">Add image of game</label>
    <input type="file" name="imageLocation"> <br><br>
    <img src="{{ $game->imageLocation }}" alt="game" height="125px" width="100px"> <br><br>
    <label for="productName">Name of Game:</label>
    <input type="text" id="productName" name="productName" value="{{ $game->productName }}"> <br><br>
    <label for="productDescription">Descripton of Game:</label> <br>
    <textarea id="productDescription" name="productDescription" cols="30" rows="10">{{ $game->productDescription }}</textarea> <br><br>
    <label for="price">Price of Game:</label>
    <input type="number" step="0.01" id="price" name="price" value="{{ $game->price }}"> <br><br>
    <label for="ageRating">Age Rating of Game:</label>
    <input type="text" id="ageRating" name="ageRating" value="{{ $game->ageRating }}"> <br><br>
    <input type="submit" value="Update Game">
    </form>
</div>
@endsection