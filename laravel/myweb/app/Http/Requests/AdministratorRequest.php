<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdministratorRequest extends Request
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
            'name'=>'required',
            'administrator'=>'required',
            'repass'=>'same:pass|required',
            'email'=>'required|email',
            'phone'=>'required|digits:11',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'姓名必须填写',
            'administrator.required'=>'账号必须填写',
            'repass.required'=>'密码必须填写',
            'repass.same'=>'两次密码必须一致',
            'email.required'=>'邮箱必须填写',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'电话必须填写',
            'phone.digits'=>'手机号必须为十一位',
        ];
    }
}
