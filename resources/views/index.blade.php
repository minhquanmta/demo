@extends('layout')

{{--@section('checkout')--}}
    {{--@if(count(Cart::content()) > 0)--}}
        {{--<li><a href="{!! url('checkout')!!}"><i class="fa fa-crosshairs"></i> Checkout</a></li>--}}
        {{--@endif--}}
    {{--@endsection--}}

@section('slider')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="public/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="public/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="public/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="public/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="public/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="public/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
    @endsection

@section('categories')
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach($categories as $category)
        <div class="panel-heading" >
            <h4 class="panel-title" ><a href="{!! url('search/'.$category->id) !!}">{!! $category->name !!}</a></h4>
        </div>
        @endforeach
        </div>
    @endsection

@section('products')
    <h2 class="title text-center">Features Items</h2>
    @foreach($features as $feature)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center" onclick="">
                        <a href="{!! url('index/detail').'/'.$feature->id !!}"><img src="{!! url('').'/storage/app/images/'.$feature->image0 !!}" alt="" /></a>
                        <h2>{!! number_format($feature->price,0,"",",") !!}</h2>
                        <a href="{!! url('index/detail').'/'.$feature->id !!}"><p>{!! $feature->name !!}</p></a>
                        <a href="{!! url('index/detail').'/'.$feature->id !!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-sm-9" align="center" id="pagination">
        {{ $features->links() }}
    </div>
    @endsection

@section('brands')
    @endsection


