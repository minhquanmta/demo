@extends('Admin.layout')

@section('option')
	Thêm người sử dụng hệ thống
@endsection

@section('content')
	<div class="col-lg-12">
	<form role="form" method="POST" action="{!!url('Admin/user/add-user')!!}" name="frmAddUser">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<input type="hidden" name="role" id="role">
		<div class="col-lg-5">
		<div class="form-group">
			<label>Tên đăng nhập</label>
			<input class="form-control" type="text" name="username" value="{!! old('username') !!}">
			<ul>
				@foreach ($errors->get('username') as $error)
					<li class="alert-danger" style="background: white">{{ $error}}</li>
				@endforeach
			</ul>
		</div>
		<div class="form-group">
			<label>Mật khẩu</label>
			<input class="form-control" type="text" name="password">
			<ul>
				@foreach ($errors->get('password') as $error)
					<li class="alert-danger" style="background: white">{{ $error}}</li>
				@endforeach
			</ul>
		</div>
		<div class="form-group">
			<label>Họ tên</label>
			<input class="form-control" type="text" name="fullname" {!! old('fullname') !!}>
			<ul>
				@foreach ($errors->get('fullname') as $error)
					<li class="alert-danger" style="background: white">{{ $error}}</li>
				@endforeach
			</ul>
		</div>
		<div class="form-group">
			<label>Phân quyền</label>
		  	<select class="form-control input-sm" name="user_group_id">
			  <option value="MEM">Nhân viên</option>
			  <option value="ADMIN">Quản trị viên</option>
			  <option value="SUPERADMIN">Quản trị viên hệ thống</option>
			</select>
		</div>
		<div style="margin-top: 10px">
			<button class="btn btn-default" type="submit" name="submit" style="margin-left: 100px"
			onclick="return validateForm()">Thêm</button>
		</div>
		</div>
		<div class="col-lg-7">
		<label>Chức năng</label>
                        <!-- /.panel-heading -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"
                                style="align-content: center;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Xem</th>
                                            <th>Thêm</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Khách hàng</td>
                                            <td><input type="checkbox" class="role-check" value="4"></td>
                                            <td><input type="checkbox" class="role-check" value="1"></td>
                                            <td><input type="checkbox" class="role-check" value="3"></td>
                                            <td><input type="checkbox" class="role-check" value="2"></td>
                                        </tr>
                                        <tr>
                                            <td>Sản phẩm</td>
                                            <td><input type="checkbox" class="role-check" value="8"></td>
                                            <td><input type="checkbox" class="role-check" value="5"></td>
                                            <td><input type="checkbox" class="role-check" value="7"></td>
                                            <td><input type="checkbox" class="role-check" value="6"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
		</div>

	</form>
	</div>
	<div class="col-lg-6">

	</div>
@endsection

@section('script')
<script type="text/javascript">
	function validateForm() {
    // var x = document.forms["frmAddUser"]["username"].value;
    // if (x == null || x == "") {
    //     alert("Tên đăng nhập không để trống");
    //     return false;
    // }
    // var y = document.forms["frmAddProduct"]["password"].value;
    // if (y == null || y == "") {
    //     alert("Mật khẩu không để trống");
    //     return false;
    // }
    // var z = document.forms["frmAddProduct"]["description"].value;
    // if (z == null || z == "") {
    //     alert("Mô tả sản phẩm không để trống");
    //     return false;
    // }
    var role = "";
   // if($("#customer-view").prop('checked') == true)
   //  	role += $('#customer-view').val();
   $(".role-check").each(function() {
   	 if($(this).prop('checked') == true){
   	 	role += $(this).val();
   	 	role += ",";
   	 }	
   });
   $('#role').attr('value', role);
}


</script>
@endsection