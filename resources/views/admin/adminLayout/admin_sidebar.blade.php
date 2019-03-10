<div id="sidebar"><a href="{{url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Category</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/addCategory') }}">Add Category</a></li>
        <li><a href="{{ url('/admin/viewCategory') }}">View Category</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Product</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/addProduct') }}">Add Product</a></li>
        <li><a href="{{ url('/admin/viewProduct') }}">View Product</a></li>
      </ul>
    </li>
  </ul>
</div>