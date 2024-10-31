<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEventRequest extends FormRequest
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
            'event_id' => ['required'],
            'unit' => ['required'],
            'weight' => ['required', 'numeric'],
            'execution_date'    => 'required|after_or_equal:today',

        ];
    }

    public function messages()
    {
        return [
            'event_id.required'             => 'Dữ liệu không được phép để trống',
            'unit.required'                 => 'Dữ liệu không được phép để trống',
            'donated_blood.required'        => 'Dữ liệu không được phép để trống',
            'weight.numeric'                => 'Định dạng dữ liệu ở dạng số',
            'weight.required'               => 'Dữ liệu không được phép để trống',
            'execution_date.required'       => 'Dữ liệu không được phép để trống',
            'execution_date.after_or_equal' => 'Ngày đăng ký phải lớn hơn hoặc bằng ngày hiện tại',
        ];
    }
}
