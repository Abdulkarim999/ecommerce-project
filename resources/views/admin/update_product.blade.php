<!DOCTYPE html>
<html>
  <head>
	<base href="/public"> 
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
			
		  <div class="div_deg">
              <h1 class="title_deg">Update Product</h1>
              <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data" >
				@csrf
			<div class="col-12 col-sm-6 py-2 ">
				<label for="">Product Title </label>
            <input  type="text" class="form-control" style="color:white;" value="{{$data->title}}" name="title" required="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Description</label>
            <textarea name="description" id="" >{{$data->description}}</textarea>
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Price</label>
            <input  type="number" class="form-control" style="color:white;" value="{{$data->price}}"  name="price" required="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Category</label>
			<select name="category" id="" required>
				<option value="{{$data->category}}">{{$data->category}}</option>
                
				@foreach($category as $category)
				<option value="{{$category->category_name}}">{{$category->category_name}}</option>

				@endforeach
			</select> 
          </div>

          <div class="col-12 col-sm-6 py-2 ">
			<label for="">Quantity</label>
            <input  type="number" class="form-control" style="color:white;" value="{{$data->quantity}}"  name="quantity" required="">
          </div>

		  
	  
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Current Image</label>
            <img width="150" src="/products/{{$data->image}}" alt="">
          </div>

          <div class="col-12 col-sm-6 py-2 ">
			<label for="">New Image</label>
            <input type="file" name="image" id="">
          </div>
		 
		  <div class="col-12 col-sm-6 py-2 ">
          <input type="submit" class="btn btn-info" value="Update">
		  </div>
		  </form>

		   </div>
        </div>
          </div>
				@csrf  
				
			  </div>
          </div>
        </div>
     </div>
       @include('admin.footer')
  </body>
</html>