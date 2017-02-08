<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Session;


class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    // 后台登录
    public function getLogin(){
        return view('admin.login');
    }
    public function postDologin(Request $request){
        if(session('code')==$request->input('code')){
            // 验证账号
            $res = DB::table('admin')->where('administrator',$request->input('username'))->first();
            if($res){
                // 验证密码
                if(Hash::check($request->input('pass'),$res['pass'])){
                    // 将用户信息存入到session中
                    session(['admin'=>$res]);
                    return redirect('/admin');
                }else{
                    return back()->with('error','密码错误');
                }
            }else{
                return back()->with('error','账号不存在');
            }
        }else{
            return back()->with('error','验证码不一致');
        }
    }
    // 输出验证码
    public function code(){
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        // Session::flash('milkcaptcha', $phrase);
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    // 退出登录
    public function getLogout(){
        // 清除session中的用户信息
        session(['admin'=>'']);
        return redirect('/admin/login');
    }
}
