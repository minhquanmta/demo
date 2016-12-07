@extends('Admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Hãng</th>
                            <th>Màu</th>
                            <th>Cỡ</th>
                            <th>SL</th>
                            <th>Người nhập</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{!!$product['id']!!}
                                    @if($product['is_new'] == 1)
                                        <img src="{!! asset('public/images/new-icon.png') !!}">
                                    @endif
                                    @if($product['is_featured'] == 1)
                                        <img src="{!! asset('public/images/star-icon.png') !!}">
                                    @endif
                                </td>
                                <td>{!!$product['name']!!}</td>
                                <td>{!!$product['category']!!}</td>
                                <td>{!!$product['brand']!!}</td>
                                <td>{!!$product['color']!!}</td>
                                <td>{!!$product['size']!!}</td>
                                <td>{!!$product['quantity']!!}</td>
                                <td>{!!$product['username']!!}</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning active btn-xs" value="{!!$product['id']!!}">Sửa
                                    </button>
                                    <button class="btn btn-danger active btn-xs" value="{!!$product['id']!!}">Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Hiển thị từ bản
                ghi thứ {!!$products->firstItem()!!} tới {!!$products->lastItem()!!} trong tổng
                số {!!$products->total()!!} bản ghi
            </div>
        </div>
        <div class="col-sm-5" align="center">
            {{ $products->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-danger').click(function () {
                var rs = confirm("Bạn có chắc muốn xóa bản ghi này?");
                if (rs == true) {
                    url = "{!! url('Admin/product/delete-product') !!}" + "/" + $(this).val();
                    window.location.replace(url);
                }
            });
            $('.btn-warning').click(function () {
                        url = "{!! url('Admin/product/edit-product') !!}" + "/" + $(this).val();
                        window.location.replace(url);
                    }
            );

        });
    </script>
@endsection