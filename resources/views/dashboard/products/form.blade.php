@csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name"  autofocus value="{{ isset($product) ? $product->name : old('name')}}">
                                <span style="color:red">{{$errors->first('name')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Price</label>
                                <input class="form-control" type="number" placeholder="{{ __('Price') }}" name="price"  autofocus value="{{ isset($product) ? $product->price : old('price')}}">
                                <span style="color:red">{{$errors->first('price')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Status</label>
                                <select class="form-control" name="status">

                                    <option value="insale">Insale</option>
                                    <option value="outsale">Outsale</option>

                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Quantity</label>
                                <input class="form-control" type="number" placeholder="{{ __('Qunatity') }}" name="quantity"  autofocus value="{{ isset($product) ? $product->quantity : old('quantity')}}">
                                <span style="color:red">{{$errors->first('quantity')}}</span>

                            </div>

                            <div class="form-group row">
                                <label>Short Description</label>
                                <textarea class="form-control" id="textarea-input" name="short_description" rows="9" placeholder="{{ __('Short Description..') }}"  value="{{ isset($product) ? $product->short_description : old('short_description')}}"></textarea>
                                <span style="color:red">{{$errors->first('short_description')}}</span>
                            </div>

                            <div class="form-group row">
                                <label> Description</label>
                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}"  value="{{old('description')}}"></textarea>
                                <span style="color:red">{{$errors->first('description')}}</span>
                            </div>

                            {{-- <div class="form-group row">
                                <label>Applies to date</label>
                                <input type="date" class="form-control" name="applies_to_date" />
                            </div> --}}


                            <div class="form-group row">
                                <label>Image</label>
                                @if (isset($product))
                                    @if ($product->image)
                                        <img src="{{asset('assets/images/products/'.$product->image)}}" width="100" alt="{{$product->image}}">
                                    @endif

                                @endif
                                <input class="form-control" type="file"  name="image" >
                                <span style="color:red">{{$errors->first('image')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Images</label>
                                @if (isset($product))
                                    @if ($product->images)
                                        @php $images = explode(',', $product->images); @endphp
                                        @foreach ($images as $item)
                                        <img src="{{asset('assets/images/products/'.$item)}}" width="100" alt="{{$item}}">
                                        @endforeach
                                    @endif
                                @endif
                                <input class="form-control" type="file" multiple name="images[]" >
                                <span style="color:red">{{$errors->first('images')}}</span>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('product.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
