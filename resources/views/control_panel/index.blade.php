@extends('layouts.app')
@section('title',__('control panel'))
@section('content')
<div class="d-flex flex-column  gap-3 w-75 m-auto">
 <a href="{{route('orders.index')}}" class="btn btn-warning text-light btn-lg">Orders</a>

 <a href="{{url('dishes/admin')}}"class="btn btn-warning text-light btn-lg"> Dishes</a>
 <a href="{{route('users.index')}}"class="btn btn-warning text-light btn-lg "> Users</a>
</div>

@endsection