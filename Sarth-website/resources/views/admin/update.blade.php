<div class="bg-admin">

    @extends('layouts.admin')

    @section('page')

    <div>
        <div class="add-new">
            <h1>Update game details</h1>

            <form action="/admin/update/{{ $game->productID }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="imageLocation">Add image of game</label>
                <input type="file" name="imageLocation"> <br><br>
                <p>Current Image of game:</p>
                <img src="{{ $game->imageLocation }}" alt="game" height="125px" width="100px"> <br><br>
                <label for="productName">Name of Game:</label>
                <input type="text" id="productName" name="productName" value="{{ $game->productName }}" required>
                <br><br>
                <label for="productDescription">Descripton of Game:</label> <br>
                <textarea id="productDescription" name="productDescription" cols="30" rows="10"
                    required>{{ $game->productDescription }}</textarea> <br><br>
                <label for="price">Price of Game:</label>
                <input type="number" min="0" step="0.01" id="price" name="price" value="{{ $game->price }}" required>
                <br><br>
                <label for="ageRating">Age Rating of Game:</label>
                <input type="text" id="ageRating" name="ageRating" value="{{ $game->ageRating }}" required> <br><br>
                <label for="stock">Available Stock:</label>
                <input type="number" step="1" min="0" id="stock" name="stock" value="{{ $game->stock }}" required>
                <br><br>
                <input type="submit" value="Update Game" class="submit-game">
            </form>
        </div>
    </div>

    <br>
    <br>

</div>
@endsection