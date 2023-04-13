@extends('Dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <a class="btn btn-primary" href="{{route('dashboard.products.create')}}">create products</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quntity</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
@forelse($products as $product)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->status}}</td>
    <td>{{$product->category->title}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->quntity}}</td>
    <td><img src="{{asset('storage/'.$product->image)}} " class="w-25"></td>
    <td class="d-flex">

            <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-primary btn-sm">Edit</a>


    <form  method="post" action="{{route('dashboard.products.destroy',$product->id)}}">
        @csrf
        @method ('delete')
        <button class="btn btn-danger btn-sm" href="">Delete</button>

    </form>


    </td>






</tr>
@empty
<tr><td colspan="10">No Product Found</td></tr>

@endforelse
            </tbody>
          </table>



        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('page_name')
products
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">categories</li>
@endsection
