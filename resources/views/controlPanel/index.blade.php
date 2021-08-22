@extends('layouts.app')
@section('title',__('control panel'))
@section('content')

<div class=" vh-100 ">
 <div class="row ">


   <div class="col-2 vh-100  bg-light d-flex gap-3  align-content-center  flex-column ">
    <a href="{{route('orders.index')}}" class="btn bordercolor textColor btn-lg">Orders</a>

    <a href="{{url('dishes/admin')}}"class="btn bordercolor textColor btn-lg"> Dishes</a>
    <a href="{{route('users.index')}}"class="btn bordercolor textColor btn-lg "> Users</a>
   </div>

   <div class="col-10  vh-100">
    @yield('options')
   </div>
 </div>
</div>
@endsection