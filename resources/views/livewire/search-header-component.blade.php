<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="#" id="form-search-top" name="form-search-top">
            <input type="text" name="search" value="" wire:model="search" placeholder="Search here...">
            <button form="form-search-top" type="button" wire:click="search()"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                {{-- <input type="hidden" name="product-cate" value="0" id="product-cate">
                <a href="#" class="link-control">All Category</a> --}}
                <select class="link-control" wire:model="cat_name">
                    <option class="level-0" >All Category</option>
                    @if ($categories)
                        @foreach ($categories as $cat)
                            <option class="level-0" >{{$cat->slug}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </form>
    </div>
</div>
