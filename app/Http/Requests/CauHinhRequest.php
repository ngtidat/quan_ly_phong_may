<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHinhRequest extends FormRequest
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
            'ma_cau_hinh'     => ['required', 'max:15', 'unique:cau_hinh,ma_cau_hinh,'. $this->id],
            'main_board'        => ['required', 'max:191'],
            'cpu'             => ['required', 'max:191'],
            'ram'             => ['required', 'max:191'],
            'vga'             => ['required', 'max:191'],
            'monitor'         => ['required', 'max:191'],
            'ngay_nhap'         => ['required', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'ma_cau_hinh.required'    => 'Dữ liệu không được phép để trống',
            'ma_cau_hinh.max'         => 'Vượt quá số ký tự cho phép',
            'ma_cau_hinh.unique'         => 'Dữ liệu đã bị trùng',
            'main_board.required'    => 'Dữ liệu không được phép để trống',
            'main_board.max'         => 'Vượt quá số ký tự cho phép',
            'cpu.required'    => 'Dữ liệu không được phép để trống',
            'ram.required'    => 'Dữ liệu không được phép để trống',
            'vga.required'    => 'Dữ liệu không được phép để trống',
            'monitor.required'    => 'Dữ liệu không được phép để trống',
            'ngay_nhap.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
