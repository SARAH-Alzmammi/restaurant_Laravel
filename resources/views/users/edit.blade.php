@extends('layouts.app')

@section('content')

    <div class="container">
    <form action="{{route('users.update',$user['id'])}}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">{{__('name')}}</label>
            <input type="name" class=" form-control  " id="name" name="name" value="{{$user['name']}}"  disabled="disabled">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{__('email')}}</label>
            <input type="email" class=" form-control  " name="email" value="{{$user['email']}}"  disabled="disabled">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="role">
                <option selected>{{$user['role']}}</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
    
        </div>
        {{-- === --}}

        <button type="submit" class="btn btn-warning  text-light">{{__('Update')}}</button>
    </form>
    </div>
@endsection
