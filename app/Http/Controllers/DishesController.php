<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Http\Request;
use Session;


class DishesController extends Controller
{

    public function __construct(){
        $this->middleware('AuthorizationCheck')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $dishes = Dishes::all();
        return view('dishes.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes.crete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName=time() .'-'.$request->name .'.'.$request->image_path->getClientOriginalExtension();

        $request->image_path->move(public_path('images'),$imageName);

        $dish= Dishes::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'image_path'=>$imageName
        ]);
        return redirect('/dishes/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function show(Dishes $dishes)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dishes::find($id);
      
      return view('dishes.edit',compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
    $dish = Dishes::find($id);

    if($request->hasFile('image_path')){
        $uploadedImage = $request->file('image_path');

        $imageName=time() .'.'.$request->image_path->getClientOriginalExtension();

            $request->image_path->move(public_path('images'),$imageName);
            $dish->image_path = $imageName;
      
}

        $dish->name = $request['name'];
        $dish->description = $request['description'];
  
        $dish->price = $request['price'];

        $dish->update();

        return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Dishes::find($id)->delete();
   

        return  redirect()->back();
    }
}
