<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validate = [
            //
            'full_name'     => ['required', 'max:255'],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email,'. $this->id],
            'gender'        => ['required'],
            'birthday'      => ['required'],
            'phone'         => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:10', 'min:10'],
            'passport'      => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,passport,'. $this->id],
            'address'       => ['required', 'max:255'],
            'job'           => ['nullable', 'max:255'],
        ];

        if ($request->submit == 'admin') {
            $validate = array_merge($validate, [
                'role'          => ['required'],
                'blood_group'   => ['required'],
                'images'        => ['nullable', 'image', 'mimes:jpeg,jpg,png']
            ]);
        }
        if ($request->event == 'create') {
            $validate = array_merge($validate, [
                'password'      => ['required'],
                'rpassword'     => ['required', 'same:password'],
            ]);
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'full_name.required'            => 'Dữ liệu không được phép để trống',
            'full_name.max'                 => 'Vượt quá số ký tự cho phép',
            'email.required'                => 'Dữ liệu không được phép để trống',
            'email.email'                   => 'Vui lòng nhập đúng định dạng email',
            'email.unique'                  => 'Địa chỉ email đã bị trùng',
            'password.required'             => 'Dữ liệu không được phép để trống',
            'rpassword.required'            => 'Dữ liệu không được phép để trống',
            'rpassword.same'                => 'Mật khẩu không trùng khớp',
            'gender.required'               => 'Dữ liệu không được phép để trống',
            'birthday.required'             => 'Dữ liệu không được phép để trống',
            'phone.required'                => 'Dữ liệu không được phép để trống',
            'phone.regex'                   => 'Vui lòng nhập đúng định dạng',
            'phone.max'                     => 'Vượt quá số ký tự cho phép',
            'phone.min'                     => 'Vượt quá số ký tự cho phép',
            'passport.required'             => 'Dữ liệu không được phép để trống',
            'passport.unique'               => 'Dữ liệu không được trùng lặp',
            'passport.regex'                => 'Vui lòng nhập đúng định dạng',
            'address.required'              => 'Dữ liệu không được phép để trống',
            'address.max'                   => 'Vượt quá số ký tự cho phép',
            'job.max'                       => 'Vượt quá số ký tự cho phép',
            'role.required'                 => 'Dữ liệu không được phép để trống',
            'blood_group.required'          => 'Dữ liệu không được phép để trống',
        ];
    }
}
