@extends('controlPanel.index')
@section('title',__('Order'))
@section('options')
@if(isset($orders))
    <div class="container">


        
       <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Order</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
  
        @foreach($orders as $key=>$order)
       

            <tr>
                <th scope="col">{{$key+1}}</th>
                <td>{{(int)$order['created_at']}}</td>
               
                <td>
                    
                    @foreach(json_decode($order['cart'], true) as $dish)
               
                    <div>{{$dish['qty']}}: {{$dish['name']}}</div>

                    @endforeach
                </td>

                <td>{{$order['status']}}</td>

<td>  <form action="{{route('orders.destroy',$order['id'])}}"   style="display: inline-block" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" @if($order['status'] != 'waiting') disabled @endif  onclick="  return confirm('Are you sure?')">Delete</button>
    </form></td>
      

            </tr>
        @endforeach

        </tbody>
    </table>
    
@else
 <p>Bag is emty</p>
 @endif
    </div>

@endsection

