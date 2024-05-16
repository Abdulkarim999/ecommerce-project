<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

	   <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

		  <div class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">

				<table class="table table-sm table-striped table-bordered table-hover table-responsive" >
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">Description</th>
	  <th scope="col">price</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity </th>
	  <th scope="col">Image </th>
	  

	 
    </tr>
  </thead>
  <tbody>
	@foreach($product as $products)
    <tr>
      <td>{{$products->title}}</td>
	  <td>{{$products->description}}</td>
	  <td>{{$products->price}}</td>
	  <td>{{$products->category}}</td>
	   <td>{{$products->quantity}}</td>
	  
	  <td>
		<img height="200" src="product/{{$products->image}}" alt="">
	  </td>
      
    </tr>
	@endforeach
  </tbody>
  
</table>

		  </div>
		   </div>
		   </div>
    
       @include('admin.footer')
  </body>
</html>