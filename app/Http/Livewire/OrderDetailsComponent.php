<?php

namespace App\Http\Livewire;

use App\Models\OrderDetail;
use Livewire\Component;

class OrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order_details = OrderDetail::where('order_id', $this->order_id)->get();
        return view('livewire.order-details-component', ['order_details' => $order_details])->layout('layouts.base');
    }
}
