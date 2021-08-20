<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchHeaderComponent extends Component
{
    public $cat_name;
    public $search;
    public function mount()
    {

    }

    public function search()
    {
        // dd($this->cat_name);
        return redirect()->route('shop', ['category_slug' => $this->cat_name, 'search' => $this->search]);
    }
    public function render()
    {
        $categories = Category::get();
        return view('livewire.search-header-component', ['categories' => $categories, 'search' => $this->search]);
    }
}
