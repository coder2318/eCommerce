<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $order_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $country;
    public $city;
    public $payment_type;

    public function mount($order_id = null)
    {
        $this->order_id = $order_id;
    }

    public function update($order)
    {
        $order = Order::find($order['id']);

        $order->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'payment_type' => $this->payment_type
        ]);
        return redirect()->route('thankyou', ['order_id' => str_pad($order->id, 5, 0, STR_PAD_LEFT)]);
    }

    public function render()
    {
        $order = null;
        if(auth()->check()){
            if($this->order_id){
                $order = Order::find($this->order_id);
            } else{
                $order = Order::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
            }
        }
        return view('livewire.checkout-component', ['order' => $order])->layout('layouts.base');
    }
}
