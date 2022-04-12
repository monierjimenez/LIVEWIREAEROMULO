@extends('admin.layout')

@section('content')
    <!-- Slider Area -->
{{--    @include('layouts.menu')--}}

    <!--/ End Slider Area -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <p style="text-align: center; font-size: 60px;font-weight:800;">
                            <br>
                            404
                            <br><br>
                        <div class="row" >
                            <div class="col-4" ></div>
                            <div class="col-4" >
                                <img src="/images/cart-empty.png" class="img">
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <br>
                        <h3>Page Not Found</h3>
                        <br>
                        <p>The Page you are looking for doesn't exist or an other error occured. Go to <a href="{{ route('home') }}">Home Page.</a></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->
@stop
