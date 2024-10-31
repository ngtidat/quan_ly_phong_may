<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiaoVienRequest extends FormRequest
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
            'ma_giao_vien'  => ['required', 'max:50', 'unique:giao_vien,ma_giao_vien,'. $this->id],
            'ten_giao_vien' => ['required'],
            'khoa_id' => ['required'],
            'images'  => 'nullable|image|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'ma_giao_vien.required'   => 'Dữ liệu không được phép để trống',
            'ma_giao_vien.unique'     => 'Dữ liệu đã bị trùng',
            'ten_giao_vien.required'  => 'Dữ liệu không được phép để trống',
            'khoa_id.required'    => 'Dữ liệu không được phép để trống',
            'images.image'               => 'Vui lòng nhập đúng định dạng file ảnh',
            'images.mimes'               => 'Vui lòng nhập đúng định dạng file ảnh',
        ];
    }
}
