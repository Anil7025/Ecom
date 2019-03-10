@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')

	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a><a href="#">Edit Category</a>  </div>
	    <h1>Category</h1>
	  </div>
	<div class="container-fluid"><hr>
     <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/editCategory/'.$categoriesDetail->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">
            	@csrf
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" value="{{$categoriesDetail->name}}" id="category_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Category levels</label>
                <div class="controls">
                  <select class="browser-default custom-select" name="parent_id" style="width: 25%;">
                    <option selected>Main Category</option>
                    @foreach($levels as $val)
                      <option value="{{$val->id}}" @if( $val->id == $categoriesDetail->parent_id ) selected @endif > {{$val->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$categoriesDetail->description}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" value="{{$categoriesDetail->url}}" id="url">
                </div>
              </div>
              <div class="control-group">
                    <label class="control-label">Enable</label>
                    <div class="controls">
                      <input type="checkbox" name="status" @if($categoriesDetail->status=="1") checked @endif value="1" id="status">
                    </div>
                  </div>
              <div class="form-actions">
                <input type="submit" value="Update Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
    </div>

@endsection
