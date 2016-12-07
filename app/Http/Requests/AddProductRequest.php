<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên sản phẩm',
            'brand.required' => 'Hãy nhập nhà sản xuất',
            'color.required' => 'Hãy nhập màu sản phẩm',
            'size.required' => 'Hãy nhập cỡ ',
            'quantity.integer' => 'Hãy nhập số lượng đúng định dạng',
            'quantity.required' => 'Hãy nhập số lượng',
            'price.integer' => 'Hãy nhập giá đúng định dạng',
            'price.required' => 'Hãy nhập giá',
            'description.required' => 'Hãy nhập mô tả sản phẩm',
        ];
    }
}