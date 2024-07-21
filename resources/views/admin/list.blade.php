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
	.table_deg{
		text-align:center;
		margin:auto;
		border:2px solid yellowgreen;
		margin-top: 50px;
		width: 600px;
	}
	th{
		background-color: skyblue;
		padding: 15px;
		font-size: 20px;
		font-weight: bold;
		color: white;

	}
	td{
		color: white;
		padding: 10px;
		border: 1px solid skyblue;
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

		  <h1 style="color: white;">Add Role</h1>

			<div class="div_deg">
              <form action="{{url('add_panel')}}" method="Post">
				@csrf
				<div>
				<input type="text" name="name" id="">	
				
					<input class="btn btn-primary" type="submit"  id="" value="Add">
                </div>
			   </form>
			   </div>

			   <div>
				<table class="table_deg">
					<tr>
						<th>Role Name</th>
						<th>Edit </th>
						<th>Delete </th>
						<th>Permission </th>
					</tr>
					
                 @foreach($save as $save)
					<tr>
						<td>{{$save->name}}</td>
						<td>
							<a class="btn btn-success" href="{{url('edit_role',$save->id)}}">Edit</a>
						</td>

						<td>
							<a class="btn btn-danger" href="{{url('delete_role',$save->id)}}">Delete</a>
						</td>
						<td>
							<a class="btn btn-primary" href="{{url('permission_role',$save->id)}}">Permission</a>
						</td>
					</tr>
					@endforeach
				</table>
				
			   </div>


             


		  </div>
		  </div>
		  </div>
       @include('admin.footer')
  </body>
</html>