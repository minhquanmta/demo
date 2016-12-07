<?php
	namespace App\Http\Middleware;

	use App\Http\Models\UserModel;
	use Closure;

    //Kiểm tra xem user đang đăng nhập có quyền truy cập hay không
	class RoleMiddleware
	{
		public function handle($request, Closure $next)
		{
			if(session()->has('username')){
				$username = session('username');
                //Danh sách các quyền ứng với các url
				$arr = array(
					"add-customer" => "1",
					"delete-customer" => "2",
					"edit-customer" => "3",
					"all-customer" => "4",
					"add-product" => "5",
					"delete-product" => "6",
					"edit-product" => "7",
					"all-product" => "8",
					"add-user" => "9",
					"delete-user" => "10",
					"edit-user" => "11",
					"all-user" => "12",
				);
                //Lấy ra user hiện tại và quyền truy cập của user đó
				$current = UserModel::where('username',$username)->get()->toArray();
				$temp = $current[0]['permission'];
				$roles = explode(",", $temp);
				$req = explode("/", $request->path());
                //kiểm tra quyền ứng với trang đang request có nằm trong list các quyền mà user đó được cấp hay k
				if(in_array($arr[$req[2]], $roles))
					return $next($request);
				else
				    //Nếu k có quyền thì chuyển sang trang forbiden
					return redirect('Admin/forbiden');
			}else
				return redirect('Admin/forbiden');
		}
	}