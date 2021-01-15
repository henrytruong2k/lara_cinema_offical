<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPhim extends FormRequest
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
            //
            
                'TenPhim' => 'required|min:5|max:255',
                'NgayDKChieu' => 'required|datetime',
                'NgayKetThuc'=>'required|datetime',
                'ThoiLuong' => 'required|integer|max:3',
                
            
        ];
    }
}
