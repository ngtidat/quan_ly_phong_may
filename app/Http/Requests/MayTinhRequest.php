<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MayTinhRequest extends FormRequest
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
            'ma_may'        => ['required', 'max:15'],
            'ten_may'           => ['required'],
            'so_thu_tu'        => ['required'],
            'ngay_nhap'        => ['required'],
            'trang_thai'        => ['required'],
            'cau_hinh_id'        => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'ma_may.required'    => 'Dữ liệu không được phép để trống',
            'ma_may.max'         => 'Vượt quá số ký tự cho phép',
            'ma_may.unique'         => 'Dữ liệu đã bị trùng',
            'ten_may.required'    => 'Dữ liệu không được phép để trống',
            'so_thu_tu.required'    => 'Dữ liệu không được phép để trống',
            'ngay_nhap.required'    => 'Dữ liệu không được phép để trống',
            'cau_hinh_id.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
