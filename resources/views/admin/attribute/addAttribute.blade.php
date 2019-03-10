@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')

	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Attribute</a><a href="#">Add Attribute</a>  </div>
	    <h1>Product Attributes</h1>
	  </div>
  	@if (Session::has('flash_message_success'))
        <div class="alert alert-info alert-block">
        <strong>{!! session('flash_message_success')!!}</strong>
        </div>
    @endif
	<div class="container-fluid"><hr>
     <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Attributes</h5>
          </div>
          <div class="widget-content nopadding">
           <form class="form-horizontal" method="post" action="{{url('/admin/addAttribute/'.$productEdit->id )}}" name="add_Attribute" id="add_Attribute" enctype="multipart/form-data">
            	@csrf
              <input type="hidden" name="product_id" value="{{ $productEdit->id }}">
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong> {{$productEdit->product_name}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong> {{$productEdit->product_code}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product color</label>
                <label class="control-label"><strong> {{$productEdit->product_color}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="field_wrapper">
				    <div>
				        <input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px" />
				        <input required type="text" name="size[]" id="size" placeholder="Size" style="width: 120px" />
				        <input required type="text" name="price[]" id="price" placeholder="Price" style="width: 120px" />
				        <input required type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px" />
				        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
				    </div>
				</div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
     <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Attribute ID</th>
                  <th>SKU</th>
                   <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($productEdit['attributes'] as $attribute)
                <tr class="gradeX">
                  <td>{{$attribute->id}}</td>
                  <td>{{$attribute->sku}}</td>
                  <td>{{$attribute->size}}</td>
                  <td>{{$attribute->price}}</td>
                  <td>{{$attribute->stock }}</td>
                  <td class="center">
                    <a rel="{{$attribute->id}}" rel1="deleteAttribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td>

                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection
