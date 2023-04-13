@extends('Dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <a class="btn btn-primary" href="{{route('dashboard.categories.create')}}">create new category</a>

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
                <th>Created at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <!--Paretn loop-->
                @forelse($category as $cat)
              <tr class="bg-secondary">
                <td>{{$loop->iteration}}</td>
                <td>{{$cat->title}}</td>
                <td>
                  @if($cat->status==1)
                  T
                  @else
                  F
                  @endif
                </td>
                <td>{{$cat->created_at}}</td>
                <td class="d-flex">
                    <a href="{{route('dashboard.categories.edit',$cat->id)}}" class="btn btn-primary btn-sm">Edit</a>

                <form  method="post" action="{{route('dashboard.categories.destroy',['category'=>$cat->id])}}">
                    @csrf
                    @method ('delete')
                    <button class="btn btn-danger btn-sm" href="">Delete</button>

                </form>
                </td>
              </tr>
@php
    $current_loops=$loop->iteration
@endphp
               <!--children loop-->
               @if($cat->children->count()>0)
               @foreach($cat->children as $child)
               <tr>
                <td>{{$current_loops.'_'.$loop->iteration}}</td>
                <td>{{$child->title}}</td>
                <td>
                  @if($child->status==1)
                  T
                  @else
                  F
                  @endif
                </td>
                <td>{{$child->created_at}}</td>
                <td class="d-flex">
                    <form method="get" action="{{'dashboard.categories.edit',$child->id}}">
                        @csrf
                        <abutton class="btn btn-primary btn-sm">Edit</button>
                    </form>

                <form  method="post" action="{{route('dashboard.categories.destroy',['category'=>$child->id])}}">
                    @csrf
                    @method ('delete')
                    <button class="btn btn-danger btn-sm" href="">Delete</button>

                </form>


                </td>
              </tr>
               @endforeach

               @endif

               @empty
               <tr >

                <td colspan="5" class="text-center">No category found</td></tr>


               @endforelse
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
