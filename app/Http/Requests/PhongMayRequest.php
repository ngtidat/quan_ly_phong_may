<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhongMayRequest extends FormRequest
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
            'ma_phong'        => ['required', 'max:15', 'unique:phong_may,ma_phong,'. $this->id],
            'ten_phong'        => ['required', 'max:191'],
            'loai_phong'        => ['required'],
            'khu_vuc_id'        => ['required'],
            'trang_thai'        => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'ma_phong.required'    => 'Dữ liệu không được phép để trống',
            'ma_phong.max'         => 'Vượt quá số ký tự cho phép',
            'ma_phong.unique'         => 'Dữ liệu đã bị trùng',
            'ten_phong.required'    => 'Dữ liệu không được phép để trống',
            'ten_phong.max'         => 'Vượt quá số ký tự cho phép',
            'loai_phong.required'    => 'Dữ liệu không được phép để trống',
            'khu_vuc_id.required'    => 'Dữ liệu không được phép để trống',
            'trang_thai.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
