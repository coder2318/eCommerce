<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public $sort;
    public $paginate;
    public $category_slug;
    public $search;
    public $min;
    public $max;
    public function  mount($category_slug = null)
    {
        $this->sort = 'default';
        $this->paginate = 12;
        $this->category_slug = $category_slug;
        $this->search = request()->get('search', null);
    }

    public function store($product_id)
    {
        $product = Product::find($product_id);
        if(auth()->check()){
            if($cart = Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()){
                $cart->update([
                    'quantity' => $cart->quantity + 1,
                    'price' => $cart->price_each*($cart->quantity + 1)
                ]);
            } else{
                Cart::create([
                    'product_id' => $product_id,
                    'user_id' => auth()->user()->id,
                    'quantity' => 1,
                    'price_each' => $product->price,
                    'price' => $product->price
                ]);
            }
        }
        return redirect()->route('cart');

    }


    public function render()
    {
        $product = Product::query();
        if($this->sort == 'date'){
            $product = $product->orderByDesc('created_at');
        }
        if($this->sort == 'price'){
            $product = $product->orderBy('price');
        }
        if($this->sort == 'price-desc'){
            $product = $product->orderByDesc('price');
        }
        $category = null;
        if($this->category_slug){
            $category = Category::where('slug', $this->category_slug)->first();
            $product = $product->where('category_id', $category->id);
        }
        if($this->search){
            // dd($this->search);
            $product = $product->where('name', 'like', '%'.$this->search.'%');
        }

        if($this->min and $this->max){
            // dd($this->search);
            $product = $product->where('price', '>', $this->min)->where('price', '<', $this->max);
        }

        $product = $product->paginate($this->paginate);
        $categories = Category::get();
        return view('livewire.shop-component', ['products' => $product, 'categories' => $categories, 'category' => $category])->layout('layouts.base');
    }
}
