@extends('Admin.layout')

@section('option')
    Sửa sản phẩm
@endsection

@section('content')
    <div class="col-lg-10">
        <form role="form" action="{!!url('Admin/product/edit-product')!!}" method="POST" name="frmEditProduct" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" id="count_image" name="count_image" value="0">
            <input type="hidden" name="product_id" value="{!! $product->id !!}">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" value="{!! $product->name !!}">
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control input-sm" name="category">
                        @foreach($categories as $category)
                            @if($category->id == $product->category)
                                <option selected="selected" value="{!!$category->id!!}">{!!$category->name!!}</option>
                            @else
                                <option value="{!!$category->id!!}">{!!$category->name!!}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Chọn làm</label><br>
                    @if($product->is_new == 1)
                        <input type="checkbox" checked name="is_new">Sản phẩm mới<img src="{!! asset('public/images/new-icon.png') !!}"><br>
                        @else
                        <input type="checkbox" name="is_new">Sản phẩm mới<img src="{!! asset('public/images/new-icon.png') !!}"><br>
                        @endif
                    @if($product->is_featured == 1)
                        <input type="checkbox" checked name="is_featured">Sản phẩm nổi bật<img src="{!! asset('public/images/star-icon.png') !!}"><br>
                        @else
                        <input type="checkbox" name="is_featured">Sản phẩm nổi bật<img src="{!! asset('public/images/star-icon.png') !!}"><br>
                        @endif
                </div>
                <div class="form-group">
                    <label>Hãng</label><br>
                    <input class="form-control" type="text" name="brand" value="{!! $product->brand !!}">
                </div>
                <div class="form-group">
                    <label>Màu</label>
                    <input class="form-control" type="text" name="color" value="{!! $product->color !!}">
                </div>
                <div class="form-group">
                    <label>Cỡ</label>
                    <input class="form-control" type="text" name="size" value="{!! $product->size !!}">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input class="form-control" type="text" name="quantity" value="{!! $product->quantity !!}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="description">{!! $product->description !!}</textarea>
                </div>
                <div>
                    <button class="btn btn-default" type="submit" name="submit" style="margin-left: 100px"
                            onclick="return validateForm()">Lưu</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group" id="addImageField">
                </div>
                <div class="form-group">
                    <button id="addImageUpload()" style="margin-left: 100px; margin-top: 40px;" type="button" onclick="addImageUpload()">Thêm ảnh</button>
                </div>
            </div>
        </form>
        <div class="col-lg-4">
        <div class="form-group" id="image-arear">
            @for($i=0; $i<count($arr); $i++)
                @if(trim($arr[$i]) != '')
                    <div class="form-group" id="div-image-{!! $i !!}">
                        <img class="image-product" width="250px" height="250px" name="{!! $arr[$i] !!}"
                             id="image-product{!! $i !!}" src="{!! url('').'/storage/app/images/'.$arr[$i] !!}">
                        <button class="remove-image" value="{!! $i !!}">Remove</button>
                    </div>
                @endif
            @endfor
        </div>
            </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
            function validateForm() {
//		 var x = document.forms["frmAddProduct"]["name"].value;
//		 if (x == null || x == "") {
//			 alert("Tên sản phẩm không để trống");
//			 return false;
//		 }
//		 var x = document.forms["frmAddProduct"]["description"].value;
//		 if (x == null || x == "") {
//			 alert("Mô tả sản phẩm không để trống");
//			 return false;
//		 }
                var count = $('.addFileInput').length;
                $("#count_image").attr("value", count);
            }
            function addImageUpload() {
                var content = "";
                var count = $('.addFileInput').length;
                content += "<div class=\"form-group-image-upload\" id=\"divAddFile" + (count + 1) + "\">";
                content += "<label>Ảnh " + (count + 1) + "</label>";
                content += "<input class=\"addFileInput\" type=\"file\" name=\"image" + (count + 1) + "\">";
                content += "<button type=\"button\" class=\"removeImage\" value=\"" + (count + 1) + "\" onclick=\"removeImageUpload(" + (count + 1) + ")\">Remove</button>";
                $('#addImageField').append(content);
            }

            function removeImageUpload(p) {
                var count = $('.addFileInput').length;
                var id = "#divAddFile" + p;
                $(id).remove()
                var i = 1;
                $("div.form-group-image-upload label").each(function () {
                    $(this).text("Ảnh " + i);
                    i++;
                });
                i = 1;
                $("div.form-group-image-upload input.addFileInput").each(function () {
                    $(this).attr("name", "image" + i);
                    i++;
                });
                i = 1;
                $("div.form-group-image-upload button.removeImage").each(function () {
                    $(this).val(i);
                    $(this).attr("onclick", "removeImageUpload(" + i + ")");
                    i++;
                });
                i = 1;
                $("div.form-group-image-upload").each(function () {
                    $(this).attr("id", "divAddFile" + i);
                    i++;
                });
            }

        $(document).ready(function () {
            $('.remove-image').click(function () {
                    var check = confirm("Bạn có chắc chắn xóa ảnh này?");
                    if (check == true){
                        var id = "#div-image-" + $(this).val();
                        var img_id = '#image-product' + $(this).val();
                        var img_name = $(img_id).prop('name');
                        var link = "{!! url('Admin/product/delete-product/delete-image') !!}";
                        $.ajax({
                            url: link,
                            type: 'POST',
                            dataType: 'text',
                            data: {product_id: "{!! $product->id !!}", image_name: img_name, _token: "{!! csrf_token() !!}"},
                            success: function () {
                                $(id).remove();
                            },
                            error: function () {
                                alert("Không xóa được!");
                            }
                        });
                    }
            });
        });
    </script>
@endsection