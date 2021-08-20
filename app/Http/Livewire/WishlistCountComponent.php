<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listeners = ['count' => '$refresh'];
    public function render()
    {
        $wishlist = null;
        if(auth()->check()){
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->with('product')->get();
        }
        return view('livewire.wishlist-count-component', ['wishlist' => $wishlist]);
    }
}
