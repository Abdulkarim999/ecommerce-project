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

          <table  class="table table-bordered" style="margin-top: 20px;">
  <thead>
    <tr style="color:white;">
      
      <th scope="col">Customer name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Product title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
      <th scope="col">Print PDF </th>
    </tr>

    @foreach($data as $data)
  </thead>
  <tbody>
    <tr>
     
      <td>{{$data->name}}</td>
      <td>{{$data->rec_address}}</td>
      <td>{{$data->phone}}</td>
      <td>{{$data->product->title}}</td>
      <td>{{$data->product->price}}</td>
      
      <td>
        <img width="100" src="products/{{$data->product->image}}" alt="">
      </td>
      <td>
        @if($data->status == 'in progress')

        <span style="color:red;">{{$data->status}}</span>

        @elseif($data->status == 'On the way ')
        <span style="color:blue;">{{$data->status}}</span>


        @else
        <span style="color:yellow;">{{$data->status}}</span>

        @endif
      </td>
      <td>
        <a class="btn btn-danger"  href="{{url('on_the_way',$data->id)}}">On the way</a>
        <a class="btn btn-success"  href="{{url('delivered',$data->id)}}">Delivered</a>
      </td>
      <td>
        <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print Pdf</a>
      </td>
      
      

      @endforeach
  </tbody>
</table>

             


		  </div>
		  </div>
		  </div>
       @include('admin.footer')
  </body>
</html>