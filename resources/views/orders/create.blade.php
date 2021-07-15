@extends('layouts.app')
@section('title',__('Order'))
@section('content')
@if(isset($result))
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

       <table class="table ">
        <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">Quantity</th>
            <th scope="col">price</th>
        </tr>
        </thead>
        <tbody>


        @foreach($result as $dish)

            <tr>
                <td  scope="row">{{$dish['name']}}</td>
                <td>{{$dish['description']}}</td>

                <td>{{$dish['qty']}}</td>

                <td>{{$dish['price']}}</td>
            </tr>
        @endforeach
<tr></tr>
<tr   scope="row"  class="mt-5 ">

<td class="pt-5 " >Total Quantity is {{$totalQty}} <br/>Total price is {{$totalPrice}}</td>

</tr>
        </tbody>
    </table>
    <form action="{{ route('orders.store',['order'=>$result]) }}" method="post">
        @csrf
        <label for="table_number">Table number</label>
     <input name="table_number" type="number" class="form-control w-25 mb-3 ">
        <button class="btn btn-sm btn-warning text-light" type="submit">{{__('Place the order')}}</button>
    </form>

    @else
 
     <p class="mt-5">The cart is  is emty</p>
 @endif
    </div>

@endsection