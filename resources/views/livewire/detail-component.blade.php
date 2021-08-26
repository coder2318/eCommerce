<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="{{asset('assets/images/products/'.$product->image)}}">
                                <img src="{{asset('assets/images/products/'.$product->image)}}" alt="product thumbnail" />
                            </li>

                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <style>
                            .star-grey{
                                color: #e6e6e6 !important;
                            }
                        </style>
                        @if (sizeof($order_details) > 0)
                        {{-- {{dd($order_details)}} --}}
                            {{-- @if ($order_details->review) --}}
                                <div class="product-rating">
                                    @php $avg_rating = 0; $count = 0; @endphp
                                    @foreach ($order_details as $order_detail)
                                        @php
                                            $avg_rating = $avg_rating + $order_detail->review->rating;
                                            $count++;
                                        @endphp
                                    @endforeach
                                    @for ($i=1; $i<=5; $i++)
                                    @if ($i <= ($avg_rating/$count))
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star star-grey" aria-hidden="true"></i>
                                    @endif
                                    @endfor
                                    <a href="#review" class="count-review">{{$order_details->where('rstatus', true)->count()}} reviews</a>
                                </div>
                            {{-- @endif --}}
                            @else
                            <div class="product-rating">
                            <a href="#review" class="count-review">{{$order_details->where('rstatus', true)->count()}} reviews</a>
                            </div>
                        @endif
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">
                            <ul>
                                <li>{{$product->short_description}}</li>
                            </ul>
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{asset('assets/images/social-list.png')}}" alt=""></a>
                        </div>
                        <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{$product->status}}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="inu_quantity" wire:model="quantity" value="1" data-max="120" pattern="[0-9]*" >

                                <a class="btn btn-reduce" href="" wire:click="decrease()"></a>
                                <a class="btn btn-increase" href="#" wire:click="increase()"></a>
                            </div>
                            {{-- {{dd($quantity)}} --}}
                        </div>
                        <div class="wrap-butons">
                            {{-- <form action="{{route('cart.store')}}" method="POST">
                                @method('post')
                                @csrf
                                <input type="text" name="product_id" hidden value="{{$product->id}}">
                                <input type="text" name="quantity" hidden value="{{$quantity}}">
                                <input type="submit" class="btn add-to-cart" style="padding: 8px 100px" value="Add to Cart">
                            </form> --}}
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store()">Add to Cart</a>

                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                @if (auth()->check())
                                    @if ($wishlist)
                                        <a href="#" style="color: red !important;" class="btn btn-wishlist" wire:click="addWishlist({{$product->id}})">Add Wishlist</a>
                                    @else
                                        <a href="#" class="btn btn-wishlist" wire:click="addWishlist({{$product->id}})">Add Wishlist</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t everti meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>
                                <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus taria . </p>
                                <p>experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea. Vis quaeque ocurreret ea.cu bus  scripserit, modus voluptaria ex per.</p>
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">1 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">
                                <style>
                                    .width-0-percent {
                                        width: 0%;
                                    }
                                    .width-20-percent {
                                        width: 20%;
                                    }
                                    .width-40-percent {
                                        width: 40%;
                                    }
                                    .width-60-percent {
                                        width: 60%;
                                    }
                                    .width-80-percent {
                                        width: 80%;
                                    }
                                    .width-100-percent {
                                        width: 100%;
                                    }
                                </style>
                                <div class="wrap-review-form">

                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{$order_details->where('rstatus', true)->count()}} review for <span>{{$product->name}}</span></h2>
                                        @foreach ($order_details as $item)
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt="" src="{{asset('assets/images/author-avata.jpg')}}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span class="width-{{$item->review->reting*20}}-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author">{{$item->order->user->name}}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($item->review->created_at)->format('d F Y g:i A')}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$item->review->comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        @endforeach
                                    </div><!-- #comments -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_prod as $po_prod)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{route('product.detail', ['slug'=>$po_prod->slug])}}" title="{{$po_prod->name}}">
                                                <figure><img src="{{asset('assets/images/products/'.$po_prod->image)}}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.detail', ['slug'=>$po_prod->slug])}}" class="product-name"><span>{{$po_prod->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$po_prod->price}}</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            @foreach ($related_prod as $re_pro)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.detail', ['slug'=>$re_pro->slug])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset('assets/images/products/'.$re_pro->image)}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('product.detail', ['slug'=>$re_pro->slug])}}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.detail', ['slug'=>$re_pro->slug])}}" class="product-name"><span>{{$re_pro->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$re_pro->price}}</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>

