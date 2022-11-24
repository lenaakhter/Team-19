<?php

?>
@extends('layouts.main')

@section('pageInfo')
<!-- add item->qty later-->
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Thanks {{Auth::user()->name}} for shopping with us, Your Game Keys are sent to {{Auth::user()->email}}.

          Your Order No. is #{{$order->id}}
          </h3>

        </div>
        <h1>Your Receipt: </h1><br>

        @foreach($order->order_products as $product)

        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
             <!-- Image of Product-->
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="{{$product->productinfo->imageLocation}}"
                  class="img-fluid rounded-3" alt="Game - img">
              </div>
              <!-- Name of Product-->
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"> {{$product->productinfo->productName }}</p>
              </div>

              <!-- Price of Product-->
              <div class="col-md-3 col-lg-2 col">
                <h5 class="mb-0">£{{$product->productinfo->price }} </h5>
              </div>

                <!-- Quantity of Product-->
                <div class="col-md-3 col-lg-2 ">
                <h5 class="mb-0">quantity: {{$product->qty }}  </h5>
              </div>
               <!-- Order no. and subtotal-->
               <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">Order Status: {{$order->status}} <strong></strong></h5>
              </div>

            </div>
          </div>
        </div>

        @endforeach
        <div class="card">
        <div class="card-body">
        <h2>Subtotal: £{{$order->subtotal}} paid</h2>
<p>Ordered on = {{date('d-m-Y', strtotime($order->created_at))}}</p>
</div>
</div>
<i>Please note that orders can not be cancelled and are non-refundable.Ts & Cs apply</i>

@endsection
