@extends('Admin.layout')

@section('option')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="col-lg-10">
        <form role="form" action="{!!url('Admin/product/add-product')!!}" method="POST" name="frmAddProduct"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" id="count_image" name="count_image" value="0">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" id="name" value="{!! old('name') !!}">
                    <ul>
                        @foreach ($errors->get('name') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control input-sm" name="category">
                        @foreach($categories as $category)
                            <option value="{!!$category->id!!}">{!!$category->name!!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hãng</label>
                    <input class="form-control" type="text" name="brand" id="brand" value="{!! old('brand') !!}">
                    <ul>
                        @foreach ($errors->get('brand') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Màu</label>
                    <input class="form-control" type="text" name="color" id="color" value="{!! old('color') !!}">
                    <ul>
                        @foreach ($errors->get('color') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Cỡ</label>
                    <input class="form-control" type="text" name="size" id="size" value="{!! old('size') !!}">
                    <ul>
                        @foreach ($errors->get('size') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input class="form-control" type="text" name="quantity" id="quantity" value="{!! old('quantity') !!}">
                    <ul>
                        @foreach ($errors->get('quantity') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" type="text" name="price" id="price" value="{!! old('price') !!}">
                    <ul>
                        @foreach ($errors->get('price.integer') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="description" id="description">{!! old('description') !!}</textarea>
                    <ul>
                        @foreach ($errors->get('description') as $error)
                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <button class="btn btn-default" type="submit" name="submit" style="margin-left: 100px"
                            onclick=" return validateForm()">Thêm
                    </button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group" id="addImageField">
                </div>
                <div class="form-group">
                    <button id="addImageUpload()" style="margin-left: 100px; margin-top: 40px;" type="button"
                            onclick="addImageUpload()">Thêm ảnh
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function validateForm() {
		    if($('#name').val() == null || $('#name').val() == ""){
             alert("Tên sản phẩm không để trống");
             return false;
            }
            if($('#brand').val() == null || $('#brand').val() == ""){
			 alert("Hãng sản phẩm không để trống");
			 return false;
		    }
            if($('#color').val() == null || $('#color').val() == ""){
                alert("Màu sản phẩm không để trống");
                return false;
            }
            if($('#size').val() == null || $('#size').val() == ""){
                alert("Cỡ sản phẩm không để trống");
                return false;
            }
            if($('#quantity').val() == null || $('#quantity').val() == ""){
                alert("Số lượng sản phẩm không để trống");
                return false;
            }
            if($('#price').val() == null || $('#price').val() == ""){
                alert("Giá sản phẩm không để trống");
                return false;
            }
            if($('#description').val() == null || $('#description').val() == ""){
                alert("Mô tả sản phẩm không để trống");
                return false;
            }
            //Lấy số lượng ảnh
            var count = $('.addFileInput').length;
            $("#count_image").attr("value", count);
        }
        //Thêm 1 ảnh upload
        function addImageUpload() {
            var content = "";
            var count = $('.addFileInput').length;
            content += "<div class=\"form-group-image-upload\" id=\"divAddFile" + (count + 1) + "\">";
            content += "<label>Ảnh " + (count + 1) + "</label>";
            content += "<input class=\"addFileInput\" type=\"file\" name=\"image" + (count + 1) + "\">";
            content += "<button type=\"button\" class=\"removeImage\" value=\"" + (count + 1) + "\" onclick=\"removeImageUpload(" + (count + 1) + ")\">Remove</button>";
            $('#addImageField').append(content);
        }
        //Hủy upload 1 ảnh
        function removeImageUpload(p) {
            //Bỏ đi input vừa remove
            var count = $('.addFileInput').length;
            var id = "#divAddFile" + p;
            $(id).remove()
            //Sửa lại tên label ứng với ảnh
            var i = 1;
            $("div.form-group-image-upload label").each(function () {
                $(this).text("Ảnh " + i);
                i++;
            });
            //Thay đổi lại tên cho toàn bộ ảnh upload
            i = 1;
            $("div.form-group-image-upload input.addFileInput").each(function () {
                $(this).attr("name", "image" + i);
                i++;
            });
            //Thay đổi lại tên cho button xóa ảnh của các input
            i = 1;
            $("div.form-group-image-upload button.removeImage").each(function () {
                $(this).val(i);
                $(this).attr("onclick", "removeImageUpload(" + i + ")");
                i++;
            });
            //Thay đổi lại id cho các thẻ div chứa ảnh
            i = 1;
            $("div.form-group-image-upload").each(function () {
                $(this).attr("id", "divAddFile" + i);
                i++;
            });
        }

    </script>
@endsection