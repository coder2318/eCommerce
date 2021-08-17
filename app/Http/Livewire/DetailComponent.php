<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_prod = Product::inRandomOrder()->limit(4)->get();
        $related_prod = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(10)->get();
        return view('livewire.detail-component', ['product' => $product, 'popular_prod' => $popular_prod, 'related_prod' => $related_prod])->layout('layouts.base');
    }
}
