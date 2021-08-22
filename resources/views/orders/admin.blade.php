@extends('controlPanel.index')

@section('options')


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
           
        @foreach($orders as$key=> $order)
       

            <tr>
                <td scope="col">{{++$key}}</td>
                <td>{{(int)$order['created_at']}}</td>
                <td>
                    
                    @foreach(json_decode($order['cart'], true) as $dish)
               
                    <div>{{$dish['qty']}}: {{$dish['name']}}</div>

                    @endforeach
                </td>
                {{-- =================== --}}
                <td>{{$order['status']}}</td>

<td> 
 <form action="{{route('orders.update',$order['id'])}}"class=" w-100 mt-4" method="post">
  @method('PATCH')
  @csrf
 <select class="form-select" name="status">
  <option selected>{{$order['status']}}</option>
  <option value="accept"  class=" text-success">Accept</option>
  <option value="decline" class=" text-danger">Decline</option>
</select>
<button type="submit" class="btn btn-success mt-3 w-100">Save</button>
</form>

 <form action="{{route('orders.destroy',$order['id'])}}"class=" w-100 mt-4" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger text-dark  w-100 " onclick="  return confirm('Are you sure?')">Delete </button>
    </form>
   
   </td>
      

            </tr>
        @endforeach

        </tbody>
    </table>
    

@endsection

