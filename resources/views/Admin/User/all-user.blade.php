@extends('Admin.layout')

@section('option')
	Danh sách người sử dụng hệ thống
@endsection

@section('content')
    <div class="row">
	<div class="col-lg-8">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        	<th style="text-align: center;">ID</th>
                                            <th style="text-align: center;">Tên đăng nhập</th>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Phân quyền</th>
                                            <th style="text-align: center;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($users as $user)
                                        <tr>
                                        	<td>{!!$user['id']!!}</td>
                                            <td>{!!$user['username']!!}</td>
                                            <td>{!!$user['fullname']!!}</td>
                                            <td>{!!$user['user_group_id']!!}</td>
                                            <td style="text-align: center;">
                                            	<button class="btn active btn-xs btn-info" value="{!!$user['id']!!}">Chi tiết</button>
                                            	<button class="btn btn-warning active btn-xs" value="{!!$user['id']!!}">Sửa</button>
                                            	<button class="btn btn-danger active btn-xs" value="{!!$user['id']!!}">Xóa</button>
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
        <div class="col-lg-4">
                    <div class="panel panel-info" style="margin-top: 15px">
                        <div class="panel-heading" id="heading">
                            Chi tiết
                        </div>
                    </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Hiển thị từ bản ghi thứ {!!$users->firstItem()!!} tới {!!$users->lastItem()!!} trong tổng số {!!$users->total()!!} bản ghi
                </div>
            </div>
            <div class="col-sm-5" align="center">
            {{ $users->links() }}
            </div>
        </div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn-info').click(function() {
				var id = $(this).val();
				var root = "{!! url('Admin/user/get-permission') !!}";
				var link = root + "/" + id;
				$.ajax({
					url: link,
					type: 'GET',
					dataType: 'text',
					success: function(result){
						var json = JSON.parse(result);
						var content = '<div class="panel-body" id="content-role">Quyền<br><ul>';
						$.each(json,function(index, value) {
							content += '<li>'+ value +'</li>';
						});
						content += '</ul></div>';
						$('#content-role').remove();
						$('#heading').append(content);

					},
					error: function() {
						alert("ajax fail");
					}
				});
			});
			$('.btn-danger').click(function(){
                var rs = confirm("Bạn có chắc muốn xóa bản ghi này?");
                if(rs == true){
                    url = "{!! url('Admin/user/delete-user') !!}" + "/" + $(this).val();
                    window.location.replace(url);
                }
            });
            $('.btn-warning').click(function(){
                url = "{!! url('Admin/user/edit-user') !!}" + "/" + $(this).val();
                window.location.replace(url);
                }
            );
		});

	</script>
@endsection