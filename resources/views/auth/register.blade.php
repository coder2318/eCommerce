@extends('dashboard.authBase')

@section('content')

{{--    <div class="container">--}}
{{--      <div class="row justify-content-center">--}}
{{--        <div class="col-md-6">--}}
{{--          <div class="card mx-4">--}}
{{--            <div class="card-body p-4">--}}
{{--                <form method="POST" action="{{ route('register') }}">--}}
{{--                    @csrf--}}
{{--                    <h1>{{ __('Register') }}</h1>--}}
{{--                    <p class="text-muted">Create your account</p>--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                          <span class="input-group-text">--}}
{{--                            <svg class="c-icon">--}}
{{--                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>--}}
{{--                    </div>--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                          <span class="input-group-text">--}}
{{--                            <svg class="c-icon">--}}
{{--                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>--}}
{{--                    </div>--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                          <span class="input-group-text">--}}
{{--                            <svg class="c-icon">--}}
{{--                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>--}}
{{--                    </div>--}}
{{--                    <div class="input-group mb-4">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                          <span class="input-group-text">--}}
{{--                            <svg class="c-icon">--}}
{{--                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>--}}
{{--                            </svg>--}}
{{--                          </span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="card-footer p-4">--}}
{{--              <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                  <button class="btn btn-block btn-facebook" type="button">--}}
{{--                    <span>facebook</span>--}}
{{--                  </button>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                  <button class="btn btn-block btn-twitter" type="button">--}}
{{--                    <span>twitter</span>--}}
{{--                  </button>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{route('register')}}" name="frm-login" method="post" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="frm-reg-lname" name="name" placeholder="name*">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="frm-reg-email" name="email" placeholder="Email address">
                                </fieldset>
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Login Information</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">Password *</label>
                                    <input type="password" id="frm-reg-pass" name="password" placeholder="Password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">Password *</label>
                                    <input type="password" id="frm-reg-pass" name="password_confirmation" placeholder="Password">
                                </fieldset>

                                <input type="submit" class="btn btn-sign" value="Register">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection

@section('javascript')

@endsection
