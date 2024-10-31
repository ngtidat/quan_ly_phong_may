<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NganhRequest extends FormRequest
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
            'ma_nganh'  => ['required', 'max:50', 'unique:nganh,ma_nganh,'. $this->id],
            'ten_nganh' => ['required'],
            'khoa_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'ma_nganh.required'   => 'Dữ liệu không được phép để trống',
            'ma_nganh.unique'     => 'Dữ liệu đã bị trùng',
            'ten_nganh.required'  => 'Dữ liệu không được phép để trống',
            'khoa_id.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
