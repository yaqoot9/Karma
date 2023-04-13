@extends('Dashboard.layout.app')
@section('content')
<div class="card card-primary center">
    <div class="card-header">
      <h3 class="card-title">Create new product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action={{route('dashboard.products.store')}} method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        @error('name')
        <p class="text-danger text-sm">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>

      @error('description')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
    </div>


    @error('price')
    <p class="text-danger text-sm">{{$message}}</p>
    @enderror
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input type="number" name="price"  step="0.1" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
  </div>

  @error('quntity')
  <p class="text-danger text-sm">{{$message}}</p>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Quntity</label>
    <input type="number" name="quntity"  class="form-control" id="exampleInputEmail1" placeholder="Enter title">
</div>



  @error('image')
  <p class="text-danger text-sm">{{$message}}</p>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="image" class="form-control-file" id="exampleInputEmail1" placeholder="Enter title">
</div>


      @error('status')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" id="status" name="status">
          <option value="1">Active</option>
          <option value="0">Not active</option>

        </select>
      </div>

      @error('category_id')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label>Category_id</label>
        <select name="category_id" class="form-control" id="category_id">
            <option value="0">Selected category id</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
          @endforeach


        </select>
      </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

@section('page_name')
products
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">products</li>
@endsection
