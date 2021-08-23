@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create Note') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @include('dashboard.products.form')
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
