<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'Email' => 'email'|'unique:nhan_viens,Email',
            'SDT' => 'size:10|starts_with:0|required',
            'HoNV' => 'required',
            'TenNV' => 'required',
            'Anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'min:8|required|same:RePassword',
            'RePassword' => 'min:8|required|same:password',
            'TenTK' => 'required'
        ];
    }
}
