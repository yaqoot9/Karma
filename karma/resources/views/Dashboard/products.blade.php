@extends('Dashboard.layout.app')
@section('content')
<h2>Hello from products page!</h2>
@endsection

@section('page_name')
products
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">products</li>
@endsection
