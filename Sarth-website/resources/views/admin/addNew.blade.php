@extends('layouts.admin')

@section('page')

<div>
    <h1>Add new game</h1>
    <form action="/admin/allProducts" method="post" enctype="multipart/form-data"> 
    @csrf
    <label for="imageLocation">Add image of game</label>
    <input type="file" name="imageLocation" required> <br><br>
    <label for="productName">Name of Game:</label>
    <input type="text" id="productName" name="productName" required> <br><br>
    <label for="productDescription">Descripton of Game:</label> <br>
    <textarea id="productDescription" name="productDescription" cols="30" rows="10" required></textarea> <br><br>
    <label for="price">Price of Game:</label>
    <input type="number" min="0" step="0.01" id="price" name="price" required> <br><br>
    <label for="ageRating">Age Rating of Game:</label>
    <input type="text" value="PEGI " id="ageRating" name="ageRating" required> <br><br>
    <label for="stock">Available Stock:</label>
    <input type="number" step="1" min="0" id="stock" name="stock" required> <br><br>
    <input type="submit" value="Add new Game">
    </form>
</div>
@endsection