<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsRequest extends Request
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
    {   //封装验证规则
        return [
            'goods'=>'required|between:0,50',
            'company'=>'required|between:0,50',
            'descr'=>'required|between:0,2000',
            'price'=>'required|between:0,999999999',
            'store'=>'required',
            'picname'=>'image'
        ];
    }
    public function messages(){
        return [
            'goods.required'=>'商品名必须填写',
            'goods.between'=>'简介在50个字以内',
            'company.required'=>'生产厂家必须填写',
            'company.between'=>'简介在50个字以内',
            'descr.required'=>'简介必须填写',
            'descr.between'=>'简介在2000个字以内',
            'price.required'=>'单价必须填写',
            'price.between'=>'单价小于999999999',
            'store.required'=>'库存量必须填写',
            'picname.image'=>'必须为图片格式(jpeg、png、bmp、gif、或 svg)'
        ];
    }
}
