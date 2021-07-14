@extends('layouts.app')

@section('content')
    <div class="container">
<a href="{{route('dishes.create')}}" class="btn btn-warning text-light">Add New Dish</a>

       <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
   
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            
@foreach($dishes as $dish)
          <tr>
            <th scope="row">{{$dish['id']}}</th>
            <td><img src="{{asset('images/'.$dish->image_path)}}" class="card-img-top w-25 " alt="..."></td>
            <td>{{$dish['name']}}</td>
            <td>{{$dish['description']}}</td>
            <td>{{$dish['price']}}</td>
            <td><a href="{{route('dishes.edit',$dish['id'])}}" class='btn btn-light text-warning mb-3 w-100'>Edit</a>
              <form action="{{route('dishes.destroy',$dish['id'])}}"class='w-100' method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-light text-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
          
@endforeach
        </tbody>
      </table>


    </div>
@endsection
