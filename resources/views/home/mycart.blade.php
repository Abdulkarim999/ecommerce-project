<!DOCTYPE html>
<html>

<head>
    <style>
        .cart_value{
           text-align: center;
           margin-bottom: 70px;
           padding: 18px; 
        }
    </style>
  @include('home.css')
</head>
<body>
  <div class="hero_area">
   @include('home.header')
  
   <table  class="table table-bordered">
  <thead>
    <tr>
      
      <th scope="col">Product Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
    </tr>

    <?php
       $value = 0;
    ?>


    @foreach($cart as $cart)
  </thead>
  <tbody>
    <tr>
     
      <td>{{$cart->product->title}}</td>
      <td>{{$cart->product->price}}</td>
      <td>
        <img width="100" src="/products/{{$cart->product->image}}" alt="">
      </td>
      <td>
        <a class="btn btn-danger" href="{{url('remove',$cart->id)}}">
            Remove
        </a>
      </td>
      
      <?php

      $value = $value + $cart->product->price;

       ?>

      @endforeach
  </tbody>
</table>

<div class="cart_value">
    <h3>Total Value of Cart is : ${{$value}} </h3>
</div>
@include('home.footer')

</body>

</html>