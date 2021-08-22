@extends('layouts.app')
@section('title',__('Order'))
@section('content')
<div class="container">
    @if (session('addingMessage'))
    <div class="alert alert-success" role="alert">
        {{ session('addingMessage') }}
    </div>
    @endif
            @php
            Session::forget('addingMessage');
             @endphp
        <div class="d-flex justify-content-around flex-wrap">
    
            @foreach($dishes as $dish)
    
                <div class="card bordercolor mb-3" style="width: 16rem;">
                    <div class="col">
                        
                        <img src="{{asset('images/'.$dish->image_path)}}" class="card-img-top" alt="..."style="height: 8rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$dish->name}}</h5>
                            <span class="text-end">{{$dish->price}}</span>
                            <p class="card-text">{{$dish->description}}</p>
    {{--                        <form action="{{ route('addToCart', ['id' =>  $dish->id]) }}" method="POST">--}}
    {{--                            <input class="btn btn-sm btn-light" type="submit" value="Add" />--}}
    
    {{--                            @csrf--}}
    {{--                        </form>--}}
                            <a href="{{ route('addToCart', ['id' =>  $dish->id]) }}" class="btn btn-sm btnBackground  text-white" role="button">{{__('Add to the card')}}</a>
    
    
    
                        </div>
                    </div>
                </div>
            @endforeach
    
        </div>
    
    
    
    
        <br>
</div>

  
@endsection
