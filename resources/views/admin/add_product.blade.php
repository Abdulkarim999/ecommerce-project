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


			<h1  style="font-size:25px;">Add Product</h1>
			<form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data" >
				@csrf
			<div class="col-12 col-sm-6 py-2 ">
				<label for="">Product Title </label>
            <input  type="text" class="form-control" style="color:white;"  name="title" required="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Description</label>
            <textarea name="description" id="" ></textarea>
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Price</label>
            <input  type="number" class="form-control" style="color:white;"  name="price" required="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Category</label>
			<select name="category" id="" required>
				<option value="">Select a Category</option>
				@foreach($category as $category)
				<option value="{{$category->category_name}}">{{$category->category_name}}</option>

				@endforeach
			</select> 
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Quantity</label>
            <input  type="text" class="form-control" style="color:white;"  name="quantity" required="">
          </div>
	  
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Product Image</label>
            <input type="file" name="image" id="">
          </div>
		 
		  <div class="col-12 col-sm-6 py-2 ">
		  <button type="submit"  class="btn btn-success mt-3  wow zoomIn">Add Product </button>
		  </div>
		  </form>

		   </div>
        </div>
          </div>
       @include('admin.footer')
  </body>
</html>