@csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name"  autofocus value="{{ isset($user) ? $user->name : old('name')}}">
                                <span style="color:red">{{$errors->first('name')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="{{ __('Email') }}" name="email"  autofocus value="{{ isset($user) ? $user->email : old('email')}}">
                                <span style="color:red">{{$errors->first('email')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Role</label>
                                <select class="form-control" name="role_name">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password"  autofocus value="{{ old('passwrod')}}">
                                <span style="color:red">{{$errors->first('password')}}</span>

                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
