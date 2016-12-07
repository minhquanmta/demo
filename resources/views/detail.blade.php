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
    <h2 class="title text-center">Chi tiết sản phẩm</h2>
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">

            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{!! url('').'/storage/app/images/'.$arr[0] !!}" alt="">
                    </div>
                    @for($i=1;$i<count($arr);$i++)
                        <div class="item">
                            <img src="{!! url('').'/storage/app/images/'.$arr[$i] !!}" alt="">
                        </div>
                    @endfor
                </div>
                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <form role="form" action="{!!url('cart')!!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="productId" value="{!! $product->id !!}">
                <h2>{!! $product->name !!}</h2>
                <span>
									<span>{!! number_format($product->price,0,"",",") !!}đ</span>
									<label>Quantity:</label>
									<input type="text" value="1" id="countProduct" name="countProduct"/>
                    @if($product->quantity > 0)
                        <button type="submit" class="btn btn-fefault cart" onclick="return buyProduct()">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                    @else
                        <button type="submit" class="btn btn-default cart" disabled>
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</button>
                    @endif
								</span>
                @if($product->quantity > 0)
                    <p><b>Tình trạng:</b> Còn hàng</p>
                @else
                    <p><b>Availability:</b> Hết hàng</p>
                @endif
                <p><b>Sản phẩm:</b> Mới 100%</p>
                <p><b>Hãng:</b> {!! $product->brand !!}</p>
                <p><b></b></p>
                </form>
            </div><!--/product-information-->

        </div>
    </div><!--/product-details-->
@endsection

{{--@section('recommends')--}}
{{--<h2 class="title text-center">Sản phẩm cùng loại</h2>--}}
{{--@foreach($features as $feature)--}}
{{--<div class="col-sm-4">--}}
{{--<div class="product-image-wrapper">--}}
{{--<div class="single-products">--}}
{{--<div class="productinfo text-center" onclick="">--}}
{{--<a href="{!! url('index/detail').'/'.$feature->id !!}"><img src="{!! url('').'/storage/app/images/'.$feature->image0 !!}" alt="" /></a>--}}
{{--<h2>{!! $feature->price !!}</h2>--}}
{{--<a href="{!! url('index/detail').'/'.$feature->id !!}"><p>{!! $feature->name !!}</p></a>--}}
{{--<a href="{!! url('index/detail').'/'.$feature->id !!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endsection--}}

<script type="text/javascript">
    function buyProduct() {
        var n = parseFloat($('#countProduct').val());
        if(!(+n === n && !(n % 1) && n >= 0)){
            alert("Bạn phải nhập đúng số lượng");
            return false;
        }
        {{--window.location.replace("{!! url('cart') !!}");--}}
        return true;
    }
</script>