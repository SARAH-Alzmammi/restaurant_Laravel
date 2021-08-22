@extends('controlPanel.index')

@section('options')


    <div class="container">

    <form action="{{route('dishes.store')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__('name')}}</label>
            <input type="name" class=" form-control  " id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('description')}}</label>
            <input type="description" class=" form-control  " name="description">
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">{{__('price')}}</label>
            <input type="price" class="  form-control " name="price">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label ">{{__('image')}}</label>
            <input class="  form-control  " type="file" id="image" name="image_path">
        </div>

        <button type="submit" class="btn btnBackground  text-light">{{__('Crete')}}</button>
    </form>
    </div>
@endsection
