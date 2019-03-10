@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')
	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a><a href="#">View Product</a>  </div>
	    <h1>Products</h1>
	  </div>
    @if (Session::has('flash_message_success'))
        <div class="alert alert-info alert-block">
        <strong>{!! session('flash_message_success')!!}</strong>
        </div>
    @endif
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Category Id</th>
                   <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <!-- <th>Description</th> -->
                  <th>Price</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($products as $product)
                <tr class="gradeX">
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_id}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_code }}</td>
                  <td>{{$product->product_color }}</td>
                  <td>{{$product->price }}</td>
                  <td>
                  	@if(!empty($product->image))
                  		<img src="{{asset('/admin/img/product/small/'.$product->image)}}" style="width: 50px">
                  	@endif
                  </td>
                  <td class="center">
                    <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a> |
                   <a href="{{url('/admin/editProduct/'.$product->id)}}" class="btn btn-primary btn-mini">Edit</a> |
                   <a href="{{url('/admin/addAttribute/'.$product->id)}}"class="btn btn-success btn-mini">Add</a> |
                   <a rel="{{$product->id}}" rel1="deleteProduct"
                     href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                   </td>
                    <div id="myModal{{$product->id}}" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>{{$product->product_name}} Full Detail</h3>
                      </div>
                      <div class="modal-body">
                        <p>Product Id : {{$product->id}} </p>
                        <p>Category Id : {{$product->category_id}} </p>
                        <p>Category Name : {{$product->category_name}} </p>
                        <p>Product Name : {{$product->product_name}} </p>
                        <p>Product Code : {{$product->product_code }} </p>
                        <p>Product Color : {{$product->product_color }} </p>
                        <p>Description : {{$product->description}}</p>
                        <p>Febric :</p>
                        <p>Material :</p>
                        <p>Price : {{$product->price }} </p>
                      </div>
                    </div>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection
