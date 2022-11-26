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

@if(count($orders) == 0)
<div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">You do not have any Previous orders</h3>

        </div>
@else

          <h3 class="fw-normal mb-0 text-black">Your Previous Order(s)</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Product ID</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Ordered on</th>
      <th scope="col">More Details</th>



    </tr>
  </thead>
  @foreach($orders as $order)
  <tbody>

    <tr>

      <td>{{$order['id']}}</td>
      <td>@foreach($order['order_products'] as $ord)
        #{{$ord['productID']}}<br>
        @endforeach
      </td>
      <td>{{$order['email']}}</td>
      <td>{{$order['status']}}</td>
      <td>£{{$order['subtotal']}}</td>
      <td>{{date('d-m-Y', strtotime($order['created_at']))}}</td>
      <td><a href="{{url('orders/'.$order['id'])}}">Order Details</a></td>


    </tr>
    @endforeach
  </tbody>
</table>
<i>Purchased Sarth keys are sent to the registered Email</i><br>

    @endif
@endsection
