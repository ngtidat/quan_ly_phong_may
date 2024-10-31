<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuVucRequest extends FormRequest
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
            'ten_khu_vuc'        => ['required', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'ten_khu_vuc.required'    => 'Dữ liệu không được phép để trống',
            'ten_khu_vuc.max'         => 'Vượt quá số ký tự cho phép',
        ];
    }
}
