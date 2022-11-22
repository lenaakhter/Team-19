@extends('layouts.main')
@section('pageInfo')
<DOCTYPE html>
  <meta charset = "UTF-8">
  <header>

  <link rel="stylesheet" href="/css/basket.css">

  </header>
<div class = "bg-image">
      <div class="content">

      @if(auth()->user() && $products->count()==0)
      <section class="">  
        <div class="container py-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10">

              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-white">Your Basket is Empty</h3>

              </div>
              <a href="/products" style = "text-decoration:none; color:white;"> Back to Products Page</a>
            </div>
          </div>
        </div>
      </section>
      @else


      <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Your Basket</h3>
              </div>
              @php $total = 0; @endphp
              @foreach($products as $product)
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                  <!-- Image of Product-->
                  <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="{{ $product->imageLocation}}"
                        class="img-fluid rounded-3" alt="Game - img">
                    </div>
                    <!-- Name of Product-->
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"> {{$product->productName}}</p>
                    </div>


                    <!-- Price of Product-->
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0">£{{$product->price}}  </h5>
                    </div>

                      <!-- Quantity of Product-->
                      <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">Quantity: {{$product->qty}}</p>
                    </div>

                    <!-- Remove Button-->
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="{{ url('/removefrombasket/'.$product->basket_id) }}" class="btn btn-warning" >Remove</a>

                    </div>

                  </div>
                </div>
              </div>
              @php $total+= $product->price * $product->qty;  @endphp

              @endforeach
              <div class="card">
              <form action="{{ url('checkout') }}" method = "post">
              @csrf
                <div class="card-body">
                <h1>Subtotal: £{{$total}}</h1>

                  <button type="submit" class="btn btn-warning btn-block btn-lg">Order Now</button>


                </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </section>


      @endif
      </div>

</div>


</html>
@endsection