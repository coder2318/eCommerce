<div class="wrap-icon-section minicart">
    <a href="#" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if ($cart)

            <span class="index">{{$cart->sum('quantity')}} items</span>

            @endif
            <span class="title">CART</span>
        </div>
    </a>
</div>
