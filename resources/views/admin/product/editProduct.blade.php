@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a><a href="#">Edit Product</a>  </div>
      <h1>Products</h1>
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
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/editProduct/'.$productDetail->id)}}" name="edit_product" id="edit_product" novalidate="novalidate" enctype="multipart/form-data">
              @csrf
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select class="browser-default custom-select" name="category_id" style="width: 25%;">
                    <?php echo $categories_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{$productDetail->product_name}}" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{$productDetail->product_code}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{$productDetail->product_color}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$productDetail->description}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{$productDetail->price}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" value="{{$productDetail->image}}">
                  @if(!empty($productDetail->image))
                  <img style="width: 50px" src="{{asset('/admin/img/product/small/'.$productDetail->image) }}"> |<a href="{{url('/admin/deleteProductImage/'.$productDetail->id)}}" class="btn btn-danger btn-mini">Delete</a>
                  @endif
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
    </div>

@endsection
