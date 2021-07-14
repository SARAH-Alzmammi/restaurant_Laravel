@extends('layouts.app')

@section('content')

    <div class="container">
    <form action="{{route('dishes.update',$dish['id'])}}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{__('name')}}</label>
            <input type="name" class=" form-control  " id="name" name="name" value="{{$dish['name']}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('description')}}</label>
            <input type="description" class=" form-control  " name="description" value="{{$dish['description']}}">
        </div>

 
        <div class="mb-3">
            <label for="price" class="form-label">{{__('price')}}</label>
            <input type="price" class="  form-control " name="price" value="{{$dish['price']}}"W>
        </div>
        <img src="{{asset('images/'.$dish->image_path)}}" class="w-25" alt="..."style="height: 8rem;">
        <div class="mb-3">
      
            <label for="image" class="form-label ">{{__('image')}}</label>
            <input class="  form-control  " type="file" id="image" name="image_path" >
        </div>

        <button type="submit" class="btn btn-warning  text-light">{{__('Update')}}</button>
    </form>
    </div>
@endsection
