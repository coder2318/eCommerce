<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;

class DetailComponent extends Component
{
    public $slug;
    public $quantity;
    public function mount($slug)
    {
        $this->quantity=1;
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
    public function increase()
    {
        $this->quantity = $this->quantity+1;
    }
    public function render()
    {
        // dd($this->quantity);
        $product = Product::where('slug', $this->slug)->first();
        $wishlist = null;
         if(auth()->check()){
            $wishlist = Wishlist::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();
         }
        $popular_prod = Product::inRandomOrder()->limit(4)->get();
        $related_prod = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(10)->get();
        return view('livewire.detail-component', ['product' => $product, 'popular_prod' => $popular_prod, 'related_prod' => $related_prod, 'wishlist' => $wishlist])->layout('layouts.base');
    }
}
