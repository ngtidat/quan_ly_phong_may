<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaRequest extends FormRequest
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
            'ma_khoa'  => ['required', 'max:50', 'unique:khoa,ma_khoa,'. $this->id],
            'ten_khoa' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'ma_khoa.required'             => 'Dữ liệu không được phép để trống',
            'ma_khoa.unique'                  => 'Dữ liệu đã bị trùng',
            'ten_khoa.required'             => 'Dữ liệu không được phép để trống',
        ];
    }
}
