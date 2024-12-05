<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayLaiMatKhauUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'password'      => 'required|min:6|max:50',
            're_password'   => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.*'    => 'Mật khẩu không được để trống và từ 6 ký tự trở lên!',
            're_password.*' => 'Nhập Lại Mật khẩu không trùng khớp!'
        ];
    }
}
