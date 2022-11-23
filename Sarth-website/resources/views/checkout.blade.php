@extends('layouts.main')
<!-- JS Displays navbar using image -->
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    let element = document.getElementById("header");
    element.classList.add('bg-image');
    element.style.backgroundColor = "black";
    element.style.opacity = "0.95";
})
</script>
@section('pageInfo')
<!-- add item->qty later-->
<section class="checkout-contain" style="background-color: #090420;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-white">Thanks for shopping with us {{Auth::user()->name}}, your Game Keys have been sent to {{Auth::user()->email}}</h3>
        </div>

        <h1 style = "color: white;">Your Receipt: </h1><br>
        @php $total = 0; @endphp
        @foreach($order as $item)
       
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
             <!-- Image of Product-->  
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ $item->imageLocation}}" class="img-fluid rounded-3" alt="Game - img">
              </div>
              <!-- Name of Product-->
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"> {{$item->productName}}</p>
              </div>

              <!-- Price of Product-->
              <div class="col-md-3 col-lg-2 col">
                <h5 class="mb-0">£{{$item->price}}  </h5>
              </div>
              
                <!-- Quantity of Product-->
              <div class="col-md-3 col-lg-2 ">
                <h5 class="mb-0">quantity: {{$item->qty}}  </h5>
              </div>
               <!-- Order no. and subtotal-->
               <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">Order Status: <strong>{{$item->status}}</strong></h5>
              </div>
              
            </div>
          </div>
        </div>
        @php $total+= $item->price * $item->qty;  @endphp
        @endforeach
        <div class="card">
          <div class="card-body">
            <h2>Subtotal: £{{$total}} paid</h2>
            <p>Ordered on = {{date('d-m-Y', strtotime($item->created_at))}}</p>
          </div>
        </div>
      </div>
      <i style = "color: white;">Please note that orders cannot be cancelled and are non-refundable. Ts & Cs apply.</i>
    </div>
  </div>
</section>        
@endsection