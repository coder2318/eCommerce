<?php

namespace App\Http\Livewire;

use App\Models\OrderDetail;
use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    public $order_details_id;
    public $rating;
    public $comment;

    protected $rules = [
        'rating' => 'required',
        'comment' => 'required',
    ];

    public function mount($order_details_id)
    {
        $this->rating = 5;
        $this->order_details_id = $order_details_id;
    }

    public function storeReview()
    {
        $this->validate();
        // dd('dsf');
        Review::create([
            'user_id' => auth()->user()->id,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'order_details_id' => $this->order_details_id
        ]);
        $order_detail = OrderDetail::find($this->order_details_id);
        $order_detail->update([
            'rstatus' => true
        ]);
        session()->flash('success_review', 'Your review is successfully saved');
        return redirect()->route('order.details', ['order_id' => $order_detail->order_id]);
    }
    public function render()
    {
        // dd($this->comment);
        $order_details = OrderDetail::find($this->order_details_id);
        return view('livewire.review-component', ['order_details' => $order_details])->layout('layouts.base');
    }
}
