@extends('layouts.app')

@section('content')

    <div class="container">
      <a href="{{route('users.create')}}" class="btn btn-warning text-light">Add New user</a>
       <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>  
            <th scope="col">Role</th>  
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            
@foreach($users as $user)
          <tr>
            <th scope="row">{{$user['id']}}</th>
           
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['role']}}</td>
            <td><a href="{{route('users.edit',$user['id'])}}" class='btn btn-light text-warning mb-3 w-100'>Edit</a>
              <form action="{{route('users.destroy',$user['id'])}}"class='w-100' method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-light text-danger w-100" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
          
@endforeach
        </tbody>
      </table>


    </div>
@endsection
