<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActivityRequest extends Request
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
            'activityname'=>'required|between:0,50',
            'state'=>'required',
            'nows'=>'required|between:0,2000',
        ];
    }
    public function messages(){
        return [
            'activityname.required'=>'商品名必须填写',
            'activityname.between'=>'活动名在0~50字',
            'state.required'=>'状态必须填写',
            'nows.required'=>'活动信息必须填写',
            'now.between'=>'活动信息在2000字以内',
        ];
    }
}
