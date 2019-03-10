@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')

	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a><a href="#">Add Category</a>  </div>
	    <h1>Form validation</h1>
	  </div>
	<div class="container-fluid"><hr>
     <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/addCategory')}}" name="add_category" id="add_category" novalidate="novalidate">
            	@csrf
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Category Levels</label>
                <div class="controls">
                  <select class="browser-default custom-select" name="parent_id" style="width: 25%;">
                    <option selected>Main Category</option>
                    @foreach($levels as $val)
                      <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>
              <div class="control-group">
                    <label class="control-label">Checkbox</label>
                    <div class="controls">
                      <input type="checkbox" name="checkbox" value="1" id="checkbox">
                    </div>
                  </div>
              <div class="form-actions">
                <input type="submit" value="Add Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
     </div>
    </div>

@endsection
