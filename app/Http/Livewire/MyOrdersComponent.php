<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class MyOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('livewire.my-orders-component', ['orders' => $orders])->layout('layouts.base');
    }
}
