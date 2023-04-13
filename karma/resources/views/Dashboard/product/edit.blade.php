@extends('Dashboard.layout.app')
@section('content')
<div class="card card-primary center">
    <div class="card-header">
      <h3 class="card-title">Edit product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action={{route('dashboard.products.update',$product->id)}} method="post" enctype="multipart/form-data">
        @method('put');
        @csrf
      <div class="card-body">
        @error('name')
        <p class="text-danger text-sm">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input value="{{$product->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>

      @error('description')
      <p class="text-danger text-sm">{{$message}}</p>
      @enderror
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input value="{{$product->description}}" type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
    </div>


    @error('price')
    <p class="text-danger text-sm">{{$message}}</p>
    @enderror
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input  value="{{$product->price}}" type="number" name="price"  step="0.1" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
  </div>

  @error('quntity')
  <p class="text-danger text-sm">{{$message}}</p>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Quntity</label>
    <input type="number" value="{{$product->quntity}}" name="quntity"  class="form-control" id="exampleInputEmail1" placeholder="Enter title">
</div>



  @error('image')
  <p class="text-danger text-sm">{{$message}}</p>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" value="{{$product->image}}" name="image" class="form-control-file" id="exampleInputEmail1" placeholder="Enter title">
    <img src="{{asset('Storage/'.$product->image)}}" class="w-25">
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
            <option value="{{$product->category_id}}">Selected category id</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
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
<li class="breadcrumb-item active">products</li>
@endsection
