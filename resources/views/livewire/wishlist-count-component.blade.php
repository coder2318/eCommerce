<div class="wrap-icon-section wishlist">
        {{--
        <div class="left-info">

        </div> --}}
        <div class="topbar-menu-area">
                <div class="topbar-menu ">
                <ul>
                    <li class="menu-item menu-item-has-children parent" >
                        @if ($wishlist)
                        <a title="Dollar (USD)" href="#"><span class="index">{{$wishlist->count()}} item</span></a>
                        @else
                            <a title="Dollar (USD)" href="#"><span class="index">no wishlist</span></a>

                        @endif
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span class="title">Wishlist</span>
                        @if ($wishlist)
                        <ul class="submenu curency" >
                            @foreach ($wishlist as $item)
                                <li class="menu-item" style="width: 350px">
                                    <a title="Pound (GBP)" href="{{route('product.detail', ['slug' => $item->product->slug])}}">
                                        <img width="50" src="{{asset('assets/images/products/'.$item->product->image)}}" alt="">{{$item->product->name}} - <strong>${{$item->product->price}}</strong></a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
</div>
