<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|unique:user,username',
            'password' => 'required',
            'fullname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'fullname.required' => 'Họ tên không được để trống',
        ];
    }
}