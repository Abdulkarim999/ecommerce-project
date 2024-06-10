<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
	.deg{
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 60px;
	}
	input[type='search']
	{
		width:400px;
		height:40px;
		margin-left:50px;
	}
   </style>
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

		  <form action="{{url('product_search')}}" method="get">
			@csrf
			<input type="search" name="search" id="">
			<input type="submit" class="btn btn-secondary" value="Search">
		  </form>

		  <div class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">

				<table class="table table-sm table-striped table-bordered table-hover table-responsive" >
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">Description</th>
	  <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity </th>
	  <th scope="col">Image </th>
	  <th scope="col">Edit </th>
	  <th scope="col">Delete </th>
    </tr>
  </thead>
  <tbody>
	@foreach($product as $products)
    <tr>
      <td>{{$products->title}}</td>
	  <td>{!!Str::limit($products->description,50)!!}</td>
	  <td>{{$products->price}}</td>
	  <td>{{$products->category}}</td>
	  <td>{{$products->quantity}}</td>
	  <td>
		<img height="100" src="products/{{$products->image}}" alt="">
	  </td>
	  <td>
	    <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
	  </td>
	  <td>
	    <a class="btn btn-danger" href="{{url('delete_product',$products->id)}}">Delete</a>
	  </td>
    </tr>
	@endforeach
  </tbody>
  
</table>


<div class="deg">
 {{$product ->links()}}

</div>

    
		  </div>
		   </div>
		   </div>
    
       @include('admin.footer')
  </body>
</html>