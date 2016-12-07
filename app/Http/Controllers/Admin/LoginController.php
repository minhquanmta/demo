<?php
	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Http\Models\UserModel;
	use App\Http\Requests\LoginRequest;
	use App\Http\Middleware\LoginMiddleware;

	class LoginController extends Controller
	{
		public function getLogin(){
			return view('Admin.login');
		}

		public function postLogin(LoginRequest $request){
			//Xóa hết session cũ
			session()->flush();
			$username = $request->username;
			$password = $request->password;
			$users = UserModel::where('username',$username)->where('password',$password)->get();
			if(count($users) > 0){
				if($users[0]['user_group_id'] == 'ADMIN')
				{
					session(['ADMIN' => $users[0]['username']]);
				}
				if($users[0]['user_group_id'] == 'SUPERADMIN')
				{    
					session(['SUPERADMIN' => $users[0]['username']]);
				}
				if($users[0]['user_group_id'] == 'MEM')
				{
					session(['MEM' => $users[0]['username']]);
				}
				session(['username' => $users[0]['username']]);
				session(['user_group_id' => $users[0]['user_group_id']]);
                //Đăng nhập thành công chuyển tới trang admin
				return redirect('Admin/product/all-product');
			}else{
				return view('Admin.login',['fail'=>'Tên đăng nhập hoặc mật khẩu không đúng']);
			}
		}

		public function logout(){
				session()->flush();
				return redirect('login');
		}
	}