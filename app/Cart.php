<?php

namespace App;

class Cart
{
    public $dishes =[];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->dishes = $oldCart->dishes ;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($dish,$id) {
        $storedItem = [
            'qty' => 0,
            'price' => $dish->price,
            'dish' => $dish];

        if ($this->dishes) {
            if (array_key_exists($id, $this->dishes)) {
                $storedItem = $this->dishes[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $dish->price * $storedItem['qty'];
        $this->dishes[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $dish->price;
//        ===
//        $this->dishes=array_push($this->dishes,$dish);
//        $this->totalQty++;
//        $this->totalPrice += $dish->price;
    }
}






// $storedDish = ['price' => $dish->price, 'dish' => $dish];
//        if ($this->dishes) {
//            if (array_key_exists($id, $this->dishes)) {
//                $storedDish = $this->dishes[$id];
//            }
//        }
//        $storedDish['qty']++;
//        $storedDish['price'] = $dish->price * $storedDish['qty'];
//        $this->dishes[$id] = $storedDish;
