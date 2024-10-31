<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocRequest extends FormRequest
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
            'ma_mon_hoc'  => ['required', 'max:50', 'unique:mon_hoc,ma_mon_hoc,'. $this->id],
            'ten_mon_hoc' => ['required'],
            'khoa_id' => ['required'],
            'nganh_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'ma_mon_hoc.required'   => 'Dữ liệu không được phép để trống',
            'ma_mon_hoc.unique'     => 'Dữ liệu đã bị trùng',
            'ten_mon_hoc.required'  => 'Dữ liệu không được phép để trống',
            'khoa_id.required'    => 'Dữ liệu không được phép để trống',
            'nganh_id.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
