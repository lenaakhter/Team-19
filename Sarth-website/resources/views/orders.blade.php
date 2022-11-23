@extends('layouts.main')

@section('pageInfo')
@if(count($orders) == 0)
<div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">You do not have any Previous orders</h3>

        </div>
@else
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Your Previous Order(s)</h3>

        </div>

        @foreach($orders as $item)

        <h2>Order:</h2>

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
                <h5 class="mb-0">quantity: {{$item->qty}}  </h5>
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
            <h2>Subtotal: £{{$item->subtotal}} paid</h2>
            <p>Ordered on = {{date('d-m-Y', strtotime($item->created_at))}}</p>
          </div>
        </div>
        <br><br>
        @endforeach
@endif
@endsection
