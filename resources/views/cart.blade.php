@extends('layout')

@section('products')
    <h2 class="title text-center">Shopping cart</h2>
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive col-md-8" id="div-cart">
                @if(count(Cart::content()))
                    <div role="row">
                        <table class="table table-striped table-bordered table-hover" id="tbl-cart">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image" align="center">Item</td>
                                <td class="price" align="center">Price</td>
                                <td class="quantity" align="center">Quantity</td>
                                <td class="total" align="center">Total</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach(Cart::content() as $item)
                                <tr id="<?php echo 'cart-row' . $i; ?>" class="cart-row">
                                    <td>
                                        <p>{!! $item->name !!}</p>
                                    </td>
                                    <td align="center">
                                        <p id="<?php echo 'price' . $i; ?>">{!! number_format($item->price,0,"",",") !!}</p>
                                    </td>
                                    <td align="center">
                                        <button type="button" onclick="btn_increase_click(<?php echo $i; ?>)">+</button>
                                        <input id="<?php echo 'qty' . $i; ?>" style="width: 30px; text-align: center"
                                               readonly value="{!! $item->qty !!}">
                                        <input id="<?php echo 'old_qty' . $i; ?>" type="hidden"
                                               value="{!! $item->qty !!}">
                                        <input id="<?php echo 'rowId' . $i; ?>" type="hidden"
                                               value="{!! $item->rowId !!}">
                                        <button type="button" onclick="btn_descrease_click(<?php echo $i; ?>)">-
                                        </button>
                                    </td>
                                    <td align="center">
                                        <p id="<?php echo 'total' . $i; ?>">{!! $item->subtotal(0,"",",","") !!}</p>
                                    </td>
                                    <td align="center">
                                        <button id="<?php echo 'btn-delete' . $i; ?>" class="btn btn-danger"
                                                value="{!! $item->rowId !!}"
                                                onclick="btn_delete_click(<?php echo $i; ?>)"><i
                                                    class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php $i++;?>
                            @endforeach
                        </table>
                    </div>
                    <div role="row">
                        <div id="total">
                            <div class="col-sm-5">
                                <label for="total-value">Thành tiền: </label>
                                <p id="total-value">{!! Cart::subtotal(0,"",",","") !!}</p>
                            </div>
                        </div>
                        <div id="div-btn-save-cart" hidden="hidden" class="col-sm-2">
                            <button id="btn-save-cart" class="btn btn-info"
                                    onclick="btn_save_click()">Lưu thay đổi
                            </button>
                        </div>
                        <div id="div-btn-save-cart">
                            <button id="btn-save-cart" class="btn btn-info col-sm-2"
                                    onclick="btn_pay_click()">Đặt hàng
                            </button>
                        </div>
                        <div id="div-btn-save-cart">
                            <button id="btn-save-cart" class="btn btn-info col-sm-2" style="margin-left: 4px"
                                    onclick="btn_delete_cart_click()">Xóa giỏ hàng
                            </button>
                        </div>
                    </div>
                    <div role="row" class="col-sm-12" id="div-customer" style="display: none; margin-top: 20px;" >
                        <h2 class="title text-center">Thông tin khách hàng</h2>
                        <form id="main-contact-form" action="{!! url('cart/save-bill') !!}" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required"
                                       placeholder="Họ tên">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="phone" class="form-control" required="required"
                                       placeholder="Số điện thoại">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="address" class="form-control" required="required"
                                       placeholder="Địa chỉ">
                            </div>
                            <div class="form-group col-md-12" align="center">
                                <button class="btn btn-default -align-center">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                @else
                    <h2>Bạn chưa chọn sản phẩm nào</h2>
                @endif
            </div>
        </div>
    </section>
@endsection

<script type="application/javascript" language="JavaScript">
    /*
     Khi click vào button thêm sản phẩm
     */
    function btn_increase_click(par) {
//        if ($('#div-cart'))
        var id = "#qty" + par;
        var x = parseInt($(id).val());
        $(id).val(x + 1);
        var id = "#total" + par;
        var id_price = "#price" + par;
        var price = parseInt(($(id_price).text()).replace(/,/g,""));
        $(id).text(numberWithCommas((x + 1) * price));
        //thay đổi tổng giá trị giỏ hàng
        var total = parseInt($('#total-value').text().replace(/,/g,""));
        $('#total-value').text(numberWithCommas(total + price));

        //Thay đổi hiển thị nút lưu giỏ hàng
        if (isCartChange()) {
            $('#div-btn-save-cart').show();
        } else {
            $('#div-btn-save-cart').hide();
        }
    }
    /*
     Khi click vào nút giảm số lượng sản phẩm
     */
    function btn_descrease_click(par) {
        var id = "#qty" + par;
        var x = parseInt($(id).val());
        if (x > 1) {
            $(id).val(x - 1);
            var id = "#total" + par;
            var id_price = "#price" + par;
            var price = parseInt(($(id_price).text()).replace(/,/g,""));
            $(id).text(numberWithCommas((x - 1) * price));
        }
        //Thay đổi tổng giá trị giỏ hàng
        var total = parseInt($('#total-value').text().replace(/,/g,""));
        $('#total-value').text(numberWithCommas(total - price));
        //Thay đổi hiển thị nút lưu giỏ hàng
        if (isCartChange()) {
            $('#div-btn-save-cart').show();
        } else {
            $('#div-btn-save-cart').hide();
        }
    }
    /*
     Hàm xử lý chức năng xóa 1 sp trong giỏ hàng
     */
    function btn_delete_click(par) {
        var x = confirm("Bạn muốn xóa sản phẩm này khỏi giỏ hàng?")
        if (x == true) {
            var link = "{!! url('') !!}" + "/cart/delete-product";
            var id = "#btn-delete" + par;
            var row_id = "#cart-row" + par;
            //Xóa sản phẩm trong giỏ hàng bằng ajax
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'text',
                data: {rowId: $(id).val(), _token: "{!! csrf_token() !!}"},
                success: function (data) {
                    //nếu bảng có nhiều hơn 1 hàng thì chỉ bỏ hàng bị xóa đi
                    if ($('.cart-row').length > 1) {
                        //xóa hàng
                        $(row_id).remove();
                        $('#total-value').text("Thành tiền: " + numberWithCommas(data));
                        //không cần đánh số lại các thành phần của hàng như upload ảnh
                        //vì ảnh có thể thêm mới ngay tại trang đó còn mua hàng sẽ phải quay lại trang index
                        //sau đó khi mua sp sẽ reload lại trang cart
                    } else {
                        //Nếu còn 1 hàng thì xóa toàn bộ bảng và thêm thông báo k có sản phẩm nào
                        $('#tbl-cart').remove();
                        $('#div-cart').append("<h2>Bạn chưa chọn sản phẩm nào</h2>")
                    }
                },
                error: function () {
                    alert("Có lỗi!");
                }
            });
        }
    }
    /*
     Định dạng format in ra cho giá sản phẩm và thành tiền
     */
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    /*
     Hàm kiểm tra giỏ hàng có sự thay đổi nào không
     */
    function isCartChange() {
        var num = $('.cart-row').length;
        var count = 0;
        //so sánh giá trị load từ giỏ hàng và giá trị ng dùng thay đổi
        for (var i = 0; i < num; i++) {
            var id_curr = "#qty" + i;
            var id_old = "#old_qty" + i;
            if ($(id_curr).val() != ($(id_old)).val()) {
                count++;
            }
            if (count > 0)
                return true;
        }
        return false;
    }
    //Lưu trạng thái giỏ hàng sau khi click button Lưu thay đổi
    function btn_save_click() {
        //lấy ra số dòng của bảng sau khi thay đổi
        var num = $('.cart-row').length;
        //Xây dựng chuỗi json những sản phẩm đã thay đổi
        //Thông tin gồm có rowId và qty
        var json = '{';
        //Kiểm tra tất cả các dòng của bảng
        for (var i = 0; i < num; i++) {
            var qty = "#qty" + i;
            var old_qty = "#old_qty" + i;
            if ($(qty).val() != $(old_qty).val()) {
                var row_id = "#rowId" + i;
                json += '"' + $(row_id).val() + '":"' + $(qty).val() + '",';
            }
        }
        //xóa dấu , ở cuối
        if (json.length > 1) {
            json = json.substring(0, json.length - 1);
        }
        json += '}';
        var url = "{!! url('') !!}" + "/cart/save-cart";
        //Xóa bằng ajax
        $.ajax({
            url: "{!! url('') !!}" + "/cart/save-cart",
            type: "POST",
            dataType: 'text',
            //phương thức post phải đi kèm token tránh lỗi server 500
            data: {par: json, _token: "{!! csrf_token() !!}"},
            success: function () {
                //hiện ra thông báo lưu thành công
                alert("Thay đổi của bạn đã được lưu");
                //Ẩn nút thay đổi
                $('#div-btn-save-cart').hide();
            },
            error: function () {
                alert("Lưu không thành công");
            }
        });

    }
    function btn_delete_cart_click() {
        var cf = confirm("Bạn muốn xóa toàn bộ giỏ hàng?");
        if (cf == true) {
            $.ajax({
                url: "{!! url('') !!}" + "/cart/delete-cart",
                type: "POST",
                dataType: 'text',
                //phương thức post phải đi kèm token tránh lỗi server 500
                data: {_token: "{!! csrf_token() !!}"},
                success: function () {
                    //hiện ra thông báo lưu thành công
                    alert("Xóa thành công");
                    //Ẩn nút thay đổi
//                    $('#div-btn-save-cart').hide();
                    window.location.replace('index');
                },
                error: function () {
                    alert("Lưu không thành công");
                }
            });
        }
    }
    function btn_pay_click() {
        $('#div-customer').toggle();
    }
</script>