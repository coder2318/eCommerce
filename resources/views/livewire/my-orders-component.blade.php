<div class="container m-10">
    <table class="table table-info">
        <thead>
            <tr >
                <th>№</th>
                <th>Fullname</th>
                <th>All Price</th>
                <th>Status</th>
                <th>Payment Type</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key=>$order)
                <tr class="table-info">
                    <td>{{$key+1}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>${{$order->all_price}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->payment_type}}</td>
                    <td><a href="{{route('order.details', ['order_id' => $order->id])}}" class="btn btn-success">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
