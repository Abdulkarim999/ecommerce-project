<!DOCTYPE html>
<html>
  <head>
	<base href="/public"> 
   @include('admin.css')

   <style>
	.div_deg{
		margin: auto;
		text-align: center;
	}
	.title_deg{
		color: white;
		padding: 40px;
		font-weight:bold ;
		font-size: 30px;
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
			
		  <div class="div_deg">
              <h1 class="title_deg">Update Category</h1>
			  <form action="{{url('update_category',$data->id)}}" method="post">
				@csrf  
				<label for="">Category Name</label>
				<input type="text" name="category" id="" value="{{$data->category_name}}">
				<input type="submit" class="btn btn-info" value="Update">
			  </form>
			  </div>
          </div>
        </div>
     </div>
       @include('admin.footer')
  </body>
</html>