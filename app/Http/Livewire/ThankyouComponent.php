<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThankyouComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
        return view('livewire.thankyou-component', ['order_id' => $this->order_id])->layout('layouts.base');
    }
}
