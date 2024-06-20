<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>
<body>
  <div class="hero_area">
   @include('home.header')
   <table  class="table table-bordered" style="margin-top: 20px;">
  <thead>
    <tr style="color:black;">
      
      <th scope="col">Product Name </th>
      <th scope="col">price</th>
      <th scope="col">Delivery Status</th>
      <th scope="col">Image </th>
      
    </tr>

    @foreach($order as $order)
  </thead>
  <tbody>
    <tr>
     
    <td>{{$order->product->title}}</td>      
    <td>{{$order->product->price}}</td>      
    <td>{{$order->status}}</td>
      <td>
        <img width="100" src="products/{{$order->product->image}}" alt="">
      </td>
      
      

      @endforeach
  </tbody>
</table>

@include('home.footer')

</body>

</html>