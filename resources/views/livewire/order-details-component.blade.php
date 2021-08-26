<div class="container m-10">
    @if (session()->has('success_review'))
        <div class="alert alert-success"><span>{{session('success_review')}}</span></div>
    @endif
    <table class="table table-secondary">
        <thead>
            <tr >
                <th>№</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Each</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_details as $key=>$order_detail)
                <tr class="table-secondary">
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset('assets/images/products/'.$order_detail->product->image)}}" width="70" alt="{{$order_detail->product->name}}"></td>
                    <td>{{$order_detail->product->name}}</td>
                    <td>{{$order_detail->quantity}}</td>
                    <td>${{$order_detail->price_each}}</td>
                    <td>
                    @if ($order_detail->order->status == 'delivered' && $order_detail->rstatus == 0)
                        <a href="{{route('reviews', ['order_details_id' => $order_detail->id])}}" class="btn btn-primary">Write Review</a>
                    @endif
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
