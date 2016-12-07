<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Http\Models\UserModel;
	use DB;
	use Validator;
	use Illuminate\Http\Request;
    use App\Http\Requests\UserRequest;
	use Illuminate\Pagination\LengthAwarePaginator;
	use Illuminate\Pagination\Paginator;

    /*
     *Controller thao tác với user trong admin
     */
	class UserController extends Controller
	{
		public function getAll()
		{
			$users = UserModel::paginate(5);
			return view('Admin.User.all-user', compact('users'));
		}

		public function getAdd()
		{
			return view('Admin.User.add-user');
		}

		public function postAdd(UserRequest $request)
		{
			$user = new UserModel;
			$user->username = $request->input('username');
			$user->password = $request->input('password');
			$user->fullname = $request->input('fullname');
			$temp = $request->input('role');
			$user->permission = substr($temp, 0, strlen($temp) - 1);
			$user->user_group_id = $request->input('user_group_id');
			$user->save();
			return redirect('Admin/user/all-user');
		}
		public function getPermission($id)
		{
			$data = DB::table('user')->select('permission')->where('id',$id)->get();
			$permission = json_decode($data,true);
			$id_arr = explode(",", $permission[0]['permission']);
			//print_r($permission);
			$count = 0;
			foreach( $id_arr as $num) {
				$temp = DB::table('role')->select('description')->where('id',($num))->get();
				$temp2 = json_decode($temp,true);
				$result[$count] = $temp2[0]['description'];
				$count++;
			}
			return json_encode($result);
		}

		public function getDelete($id){
			UserModel::destroy($id);
			return redirect('Admin/user/all-user');
		}

		public function getEdit($id){
			$user = UserModel::find($id);
			if($user){
				return view('Admin.User.edit-user', compact('user'));
			}else{
				return redirect('Admin/user/all-user');
			}
		}
		public function postEdit(Request $request){
			
			$validator = Validator::make($request->all(),
				[
					'username' => 'required',
					// 'password' => 'required',
					'fullname' => 'required',
				],
				[
					'username.required' => 'Tên đăng nhập không được để trống',
					// 'password.required' => 'Mật khẩu không được để trống',
					'fullname.required' => 'Họ tên không được để trống',
				]
				);
			if($validator->fails()){
				$url = 'Admin/user/edit-user/'.$request->input('id');
				return redirect($url)->with('errors', $validator->errors());
			}
			$user = UserModel::find($request->input('id'));
			$user->username = $request->input('username');
			// $user->password = $request->input('password');
			$user->fullname = $request->input('fullname');
			$temp = $request->input('role');
			$user->permission = substr($temp, 0, strlen($temp) - 1);
			$user->user_group_id = $request->input('user_group_id');
			$user->save();
			return redirect('Admin/user/all-user');
		}

		public function getRoleGroup(){
			return view('Admin.user.role-group');
		}
		public function postRoleGroup(Request $request){
			$role = $request->input('role');
			$user_group_id = $request->input('user_group_id');
			UserModel::where('user_group_id',$user_group_id)->update(['permission'=> $role]);
			return redirect('Admin/user/all-user');
		}
	}