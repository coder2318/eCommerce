<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Thank You</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Xaridingiz uchun rahmat! Sizning buyurtma raqamingiz {{$order_id}}</h2>
                <p> Buyurtmangiz 7 kun ichida yetkaziladi</p>
                <a href="{{route('shop')}}" class="btn btn-submit btn-submitx">Continue Shopping</a>
            </div>
        </div>
    </div><!--end container-->

</main>
