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

  <section class="orders-contain" style="background-color: #090420;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

          <div class="d-flex justify-content-between align-items-center mb-4" style = "margin-left: 43%;">
            <h3 class="fw-normal mb-0 text-white">Order History</h3>

          </div>

          @foreach($orders as $item)

          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
              <!-- Image of Product-->
              <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                    src="{{ $item->imageLocation}}"
                    class="img-fluid rounded-3" alt="Game - img">
                </div>
                <!-- Name of Product-->
                <div class="col-md-3 col-lg-2">
                  <p class="lead fw-normal mb-2"> {{$item->productName}}</p>
                </div>
                <!-- Price of Product-->
                <div class="col-md-3 col-lg-2">
                  <h5 class="mb-0">Quantity: {{$item->qty}}  </h5>
                </div>
                <!-- Price of Product-->
                <div class="col-md-3 col-lg-2 col-xl-2 ">
                  <h5 class="mb-0">£{{$item->price}}  </h5>
                </div>

                <!-- Order no. and subtotal-->
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">Order Status: <strong>{{$item->status}}</strong></h5>
                </div>

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h2>Subtotal: £{{$item->subtotal}}</h2>
              <p>Ordered: {{date('d-m-Y', strtotime($item->created_at))}}</p>
            </div>
          </div>
          <br><br>
          @endforeach
  </section>
@endsection
