<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;

class DetailComponent extends Component
{
    public $slug;
    public $quantity;
    public $product_id;
    public function mount($slug)
    {
        $this->quantity=1;
        $this->product_id = Product::where('slug', $this->slug)->first()->id;
        $this->slug = $slug;
    }
    public function addWishlist($product_id)
    {
        if(auth()->check()){
            $wishlist = Wishlist::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
            if($wishlist){
                $wishlist->delete();
            } else{
                Wishlist::create([
                    'product_id' => $product_id,
                    'user_id' => auth()->user()->id
                ]);
            }
            $this->emitTo('wishlist-count-component', 'count');

        }
    }
    public function decrease()
    {
        if($this->quantity > 1){
            $this->quantity = $this->quantity-1;
        }
    }

    public function increase()
    {
        $this->quantity = $this->quantity+1;
    }

    public function store()
    {
        if(auth()->check()){
            if($this->product_id and $this->quantity){
                $product = Product::find($this->product_id);
                if($cart = Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()){
                    $cart->update([
                        'quantity' => $cart->quantity + $this->quantity,
                        'price' => $cart->price_each*($cart->quantity + $this->quantity)
                    ]);
                } else{
                    Cart::create([
                        'product_id' => $this->product_id,
                        'user_id' => auth()->user()->id,
                        'quantity' => $this->quantity,
                        'price_each' => $product->price,
                        'price' => $product->price*$this->quantity
                    ]);
                }
            }
        }
        return redirect()->route('cart');
    }

    public function render()
    {
        // dd($this->quantity);
        $product = Product::where('slug', $this->slug)->first();
        $order_details = OrderDetail::with('review')->where('product_id', $product->id)->get();
        // dd($order_details);
        $wishlist = null;
         if(auth()->check()){
            $wishlist = Wishlist::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();
         }
        $popular_prod = Product::inRandomOrder()->limit(4)->get();
        $related_prod = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(10)->get();
        return view('livewire.detail-component', ['product' => $product, 'popular_prod' => $popular_prod, 'related_prod' => $related_prod, 'wishlist' => $wishlist, 'order_details' => $order_details])->layout('layouts.base');
    }
}
