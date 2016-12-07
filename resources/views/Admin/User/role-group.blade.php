@extends('Admin.layout')

@section('option')
	Phân quyền nhóm người dùng
@endsection
@section('content')
<form role="form" method="POST" action="{!!url('Admin/user/role-group')!!}" name="frmRoleGroup">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<input type="hidden" name="role" id="role">
	<div class="col-lg-2">
		<div class="form-group">
			<label>Phân quyền</label>
		  	<select class="form-control input-sm" name="user_group_id">
			  <option value="MEM">Nhân viên</option>
			  <option value="ADMIN">Quản trị viên</option>
			</select>
		</div>
	</div>
	<div class="col-lg-8">
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
                                <button type="submit" onclick="return validateForm()">Submit</button>
                                
                            </div>
	</div>
</form>
@endsection

@section('script')
<script type="text/javascript">
	function validateForm() {
		var result = confirm("Thay đổi này của bạn sẽ áp dụng cho toàn bộ nhóm người dùng")
		if(result == true){
			var role = "";
			//Lấy các quyền của user
			$(".role-check").each(function() {
		   	 if($(this).prop('checked') == true){
		   	 	role += $(this).val();
		   	 	role += ",";
		   	 }
		   });
			//Bỏ đi dấu , ở cuối
			var role2 = role.substring(0, role.length - 1);
			//Gán giá trị role để submit
		   $('#role').attr('value', role2);
			return true;
		}
		return false;
	}
	</script>
@endsection