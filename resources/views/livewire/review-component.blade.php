    <div class="container">

    <div class="tab-content-item " id="review">

        <div class="wrap-review-form">

            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">

                        <table class="table table-secondary">
                            <thead>
                                <tr >
                                    <th>Image</th>
                                    <th>Product Name</th>

                                </tr>
                            </thead>
                            <tbody>

                                    <tr class="table-secondary">
                                        <td><img src="{{asset('assets/images/products/'.$order_details->product->image)}}" width="70" alt="{{$order_details->product->name}}"></td>
                                        <td>{{$order_details->product->name}}</td>


                                    </tr>
                            </tbody>
                        </table>

                        <form action="" wire:submit.prevent="storeReview()" method="post" id="commentform" class="comment-form" novalidate="">

                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">

                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" wire:model="rating" value="1">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" wire:model="rating" value="2">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" wire:model="rating" value="3">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" wire:model="rating" value="4">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" wire:model="rating" value="5" checked="checked">
                                </p>
                                @error('rating') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <p class="comment-form-comment">
                                <label for="comment">Your review <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="comment" cols="4" rows="5" wire:model="comment"></textarea>
                                @error('comment') <span class="error" style="color:red">{{ $message }}</span> @enderror
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                            </p>
                        </form>

                    </div><!-- .comment-respond-->
                </div><!-- #review_form -->
            </div><!-- #review_form_wrapper -->

        </div>
    </div>

</div>
