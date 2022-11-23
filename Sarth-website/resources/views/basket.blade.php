<div class = "bg-image">
  @extends('layouts.main')
  @section('pageInfo')
  <DOCTYPE html>
    <meta charset = "UTF-8">
    <header>

    </header>
      <div class="content">

      @if(auth()->user() && $products->count()==0)
      <section class="">
        <div class="container py-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10">

              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-white">Your Basket is Empty</h3>

              </div>
            </div>
          </div>
        </section>
      </div>
</div>

        @else

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
  let element = document.getElementById("header");
  element.classList.add('bg-image');
  element.style.backgroundColor = "black";
  element.style.opacity = "0.95";
})
</script>
        <section class="basket-contain" style="background-color: #090420;">
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
                        src="{{$product->products->imageLocation}}"
                        class="img-fluid rounded-3" alt="Game - img">
                    </div>
                    <!-- Name of Product-->
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"> {{$product->products->productName}}</p>
                    </div>


                      <!-- Price of Product-->
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 class="mb-0">£{{$product->price}}  </h5>
                      </div>

                        <!-- Quantity of Product-->
                        <div class="col-md-3 col-lg-2 col-xl-2">
                        <p class="lead fw-normal mb-2">Quantity: {{$product->qty}}</p>
                      </div>

                    <!-- Remove Button-->
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="{{ url('/removefrombasket/'.$product->id) }}" class="btn btn-warning" >Remove</a>

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

                    <button type="submit" class="reg-btn">Order Now</button>


                  </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </section>


        @endif
        </div>
  </html>
@endsection
