<?php

namespace App\Http\Controllers;


use App\Models\Orders;
use App\Models\Dishes;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use \Illuminate\Http\Response;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        if(\Auth::user()->role == 'admin'){
         
            $orders = Orders::all()->toArray();
            return view('orders.admin',compact('orders')); 

        }
        $userId = \Auth::user()->id;
        $orders = Orders::where('user_id',$userId)->get()->toArray();
        return view('orders.index',compact('orders'));  
    }

       
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result=array();
      
        $totalPrice = 0;
        $totalQty = 0;

       if (\session()->has('cart') ){

        $totalQty = count(\session('cart'));

        $selectedDishes= Dishes::select('id','name','price','description')->whereIn('id',\session('cart'))->get();
        $selectedDishesArray = $selectedDishes->toArray();

        $idesArray=\session('cart');

       
             
            foreach ($selectedDishesArray as $selectedDish){
                $selectedDish['qty']=0;
                $selectedDishPrice=$selectedDish['price'];
                for ($i=0; $i < count($idesArray); $i++){
                
                 if($selectedDish['id']==$idesArray[$i]){
                     $selectedDish['qty']++;
                  
                     $selectedDish['price']=$selectedDishPrice*$selectedDish['qty'];
                 }
           
                }
         
                 $totalPrice +=$selectedDish['price'];
         
                 
                 $result+=array($selectedDish['id'] => $selectedDish);
     
          }
    
         }else{
        $totalQty=null;
        $totalPrice =null;
        $result=null;
    }
    return view('orders.create',compact('result','totalPrice','totalQty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'table_number' => 'required|integer|min:1',
        ]);
    

        $cart = json_encode(array_values($request->get('order')));
        $userId = \Auth::user()->id;

        $order= new Orders;
        $order->user_id = $userId;
        $order->cart = $cart;
        $order->table_number = $request->get('table_number');
        $order->save();

        $request->session()->forget('cart');
     return redirect('orders');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->role == 'admin'){
        $order = Orders::find($id);
        $order->status = $request['status'];
        $order->save();
    }
        return  redirect()->back();
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        if(!Orders::where('user_id',\Auth::id())&&\Auth::user()->role != 'admin'){
            return abort(401);
        }
        Orders::destroy($id);

        return  redirect()->back();

    }

}

