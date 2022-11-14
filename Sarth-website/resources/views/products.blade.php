@extends('layouts.main')

@section('pageInfo') 

<div class="title">
    <h1>List of all games</h1>
</div>

<div class="container">

                    <div class="row height d-flex justify-content-center align-items-center">

                      <div class="col-md-8">

                        <div class="search">
                            
                        <form type="get" action= "{{ url('/search') }}">
                          <input type="text" name="query" class="form-control" placeholder="Searh for games">
                          <button class="btn btn-primary" type= "submit">Search</button>
                        </form>
                        </div>
                        
                      </div>
                      
                    </div>
                </div>
                <br>


<div class="games">
    @foreach($products as $product)
        <div class="game">
            <a href="/products/{{ $product->productID }}">    
                <img src="{{ $product->imageLocation }} " alt="image of game" height="250px" width="200px"> 
                <p>
                    {{ $product->productName }} <br><br>
                    {{ $product->ageRating }} <br><br>
                    £{{ $product->price }} <br><br>
                </p>
            </a>  
        </div>
    @endforeach
</div>

@endsection


<style>
.game{
    border-style: solid;
  border-color: black;
  background-color: #E5FCE6 ;
}
    </style>