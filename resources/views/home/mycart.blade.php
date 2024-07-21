<!DOCTYPE html>
<html>

<head>
    <style>
        .cart_value{
           text-align: center;
           margin-bottom: 70px;
           padding: 18px; 
        }
        .order_deg{
          padding-left: 100px;
          padding-bottom: 10px;
		  align-items: center;
		  justify-content: center;
		  text-align: center;
		  display: flex;
        }
    </style>
  @include('home.css')
</head>
<body>
  <div class="hero_area">
   @include('home.header')
   
   
   <div class="container">
    <div class="row">
      <div class="col-md-12">
      <table  class="table table-bordered" style="margin-top: 20px;">
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
<div class="col-md-12">
 <div class="order_deg">
    <form action="{{url('confirm_order')}}" method="post">
      @csrf
      <div>
        <label for="">Receiver Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
      </div>

      <div>
        <label for="">Receiver Address</label>
        <textarea name="address" id="">{{Auth::user()->address}}</textarea>
      </div>
      <div>
        <label for="">Receiver Phone</label>
        <input type="number" name="phone" value="{{Auth::user()->phone}}">
      </div>
      <div>
        <div style="margin-top: 10px;">
          <input class="btn btn-primary" type="submit" value="Cash on Delivery">
		  <a  class="btn btn-success" href="{{url('stripe',$value)}}">Pay using card</a>
        </div>
    </form>
   </div>
</div>
    

 


 </div>
       
      
    
  

      
   </div>
   </div>
   
@include('home.footer')

</body>

</html>