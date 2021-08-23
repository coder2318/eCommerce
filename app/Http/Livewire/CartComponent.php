<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $this->emitTo('cart-count-component', 'count');
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
            $this->emitTo('cart-count-component', 'count');
        }

    }

    public function storeCheckout($cart)
    {
        // dd(array_sum(array_column($cart, 'price'))*1.01);
        if(!Order::where('user_id', auth()->user()->id)->where('status', 'waiting')->first()){
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'all_price' => array_sum(array_column($cart, 'price'))*1.01,
                'shipping' => array_sum(array_column($cart, 'price'))*0.01
            ]);

            foreach($cart as $item){
                // dd($item['product_id']);
                OrderDetail::create([
                    'order_id'=> $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price_each' => $item['price_each']
                ]);
                Cart::find($item['id'])->delete();
            }

            return redirect()->route('checkout', ['order_id'=>$order->id]);
        } else{
            session()->flash('checkout', 'Sizda tolov qilinmagan buyurtma bor. iltimos avval uni toldiring');
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
