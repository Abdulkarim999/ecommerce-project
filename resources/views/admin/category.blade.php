<!DOCTYPE html>
<html>
  <head> 
	<base href="/public">
   @include('admin.css')
   <style>
	input[type='text']
	{
		width: 400px;
		height:50px;
	}
	.div_deg{
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 30px;

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

		  <h1 style="color: white;">Add Category</h1>

			<div class="div_deg">
              <form action="{{url('add_category')}}" method="Post">
				@csrf
				<div>
				<input type="text" name="category" id="">	
				
					<input class="btn btn-primary" type="submit"  id="" value="Add Category">
                </div>
			   </form>
			   </div>

		  </div>
		  </div>
		  </div>
       @include('admin.footer')
  </body>
</html>