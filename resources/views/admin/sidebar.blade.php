<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Admin </h1>
            <p>Coordinate activities perfectly </p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('home_home')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="add_book">Add Books</a></li>
                    <li><a href="{{url('show_book')}}">Show Books</a></li>
                   
                  </ul>
                </li>
                <li><a href="{{url('borrow_request')}}"> <i class="icon-logout"></i>Borrow Book  </a></li>
        </ul>
		
      </nav>