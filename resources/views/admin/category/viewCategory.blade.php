@extends('admin.master')

@section('content-title')
    Home
@endsection

@section('dashboardContent')
	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a><a href="#">View Category</a>  </div>
	    <h1>Categories</h1>
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
            <h5>View Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category Name</th>
                  <th>Category Levels</th>
                  <th>Category URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->parent_id }}</td>
                  <td>{{$category->url}}</td>
                  <td class="center"><a href="{{url('/admin/editCategory/'.$category->id)}}" class="btn btn-primary btn-mini">Edit</a> |
                     <a id="delCat" href="{{url('admin/deleteCategory/'.$category->id )}}" class="btn btn-danger btn-mini">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
