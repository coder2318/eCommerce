<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class CartComponent extends Component
{
    public $product_id;
    public $quantity;

    public function mount(){

    }

    public function increase($id)
    {
        $cart = Cart::find($id);
        $cart->update([
            'quantity' => $cart->quantity+1,
            'price' => ($cart->quantity+1)*$cart->price_each
        ]);
    }
    public function decrease($id)
    {
        $cart = Cart::find($id);
        if($cart){
            if($cart->quantity <= 1){
                $cart->delete();
            }else{
                $cart->update([
                    'quantity' => $cart->quantity-1,
                    'price' => ($cart->quantity-1)*$cart->price_each
                ]);
            }
        }
    }
    public function render()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('livewire.cart-component', ['cart'=>$cart])->layout('layouts.base');
    }

    public function store()
    {
        $this->product_id  = request()->get('product_id', null);;
        $this->quantity  = request()->get('quantity', null);
        if($this->product_id and $this->quantity){
            $product = Product::find($this->product_id);
            if(!Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()){
                Cart::create([
                    'product_id' => $this->product_id,
                    'user_id' => auth()->user()->id,
                    'quantity' => $this->quantity,
                    'price_each' => $product->price,
                    'price' => $product->price
                ]);
            }
        }
        return redirect()->route('cart');
    }
}
