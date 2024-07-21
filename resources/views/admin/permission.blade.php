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

		<form action="{{ route('permissions.assign') }}" method="POST">
    @csrf
    
    <div class="row-mb-3">
        <h1 style="display: block; margin-bottom:20px;" for="">Permission</h1>
        
        @foreach($permissions as $permission)
        <div class="row" style="margin-bottom:20px">
            <div class="col-md-2">
                {{ $permission['name'] }}
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($permission['group'] as $group)
                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" value="{{ $group['id'] }}" name="permission_id[]"> 
                            {{ $group['name'] }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr style="background: white;">
        @endforeach
    </div>
    
    <button type="submit">Assign Permissions</button>
</form>

             


		  </div>
		  </div>
		  </div>
       @include('admin.footer')
  </body>
</html>