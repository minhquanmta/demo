@extends('layout')

@section('categories')
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach($categories as $category)
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{!! url('search/'.$category->id) !!}">{!! $category->name !!}</a></h4>
        </div>
    @endforeach
        </div>
@endsection

@section('products')
    <h2 class="title text-center">{!! $curr_cate[0]->name !!}</h2>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{!! 'http://127.0.0.1:9080/demo2/storage/app/images/'.$product->image0 !!}" alt="" />
                            <h2>{!! $product->price !!}</h2>
                            <p>{!! $product->name !!}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <p align="center">Sản phẩm bạn tìm hiện chưa có, vui lòng xem thêm</p>
        @if(count($features) > 0)
            <h2 class="title text-center">Feature products</h2>
            @foreach($features as $feature)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{!! 'http://127.0.0.1:9080/demo2/storage/app/images/'.$feature->image0 !!}" alt="" />
                                <h2>{!! $feature->price !!}</h2>
                                <p>{!! $feature->name !!}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
@endsection