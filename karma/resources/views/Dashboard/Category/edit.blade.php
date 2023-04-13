@extends('Dashboard.layout.app')
@section('content')
<div class="card card-primary center">
    <div class="card-header">
      <h3 class="card-title">Update category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action={{route('dashboard.categories.update',$category->id)}} method="post">
        @csrf
        @method('put')
      <div class="card-body">
        @error('title')
        <p class="text-danger text-sm">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{old('title',$category->title)}}">

      </div>
      @error('status')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" id="status" name="status">
          <option value="1" @selected(old('status'))>Active</option>
          <option value="0" @selected(old('status'))>Not active</option>

        </select>
      </div>
      @error('parent_id')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label>Parent Category</label>
        <select name="parent_id" class="form-control" id="parent_id">
            <option value="0">Selected parent id</option>
            @foreach ($parents as $parent)
            <option value="{{$parent->id}}" >{{$parent->title}}</option>
          @endforeach



        </select>
      </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
@endsection

@section('page_name')
products
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">Category</a></li>
<li class="breadcrumb-item active">products</li>
@endsection
