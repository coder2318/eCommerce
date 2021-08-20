<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners = ['count' => '$refresh'];
    public function render()
    {
        $cart = null;
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->user()->id)->get();
        }
        return view('livewire.cart-count-component', ['cart' => $cart]);
    }
}
