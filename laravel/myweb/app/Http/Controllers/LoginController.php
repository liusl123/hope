<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller{
    // 用户登录
    public function getLogin(){
    // echo  '用户登录';
    	return view('login.login');
    }
    public function postDologin(Request $request){
    // echo  '执行用户登录';
        
        $pass=$request->input('pwd');
        // dd($pass);
        $account=$request->input('account');
        $pattern='/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])*(\.([a-z0-9])([-a-z0-9_-])([a-z0-9])+)*$/i';
    	if(preg_match($pattern, $account)==1){
            // echo "邮箱";
            $res=DB::table('user')->where('email',$account)->first();
            if($res){
                // echo "该用户存在";
                if($res['pass']==$pass){
                    // echo '密码正确';
                    // dd('aa');
                    session()->forget('error');
                    if(empty(session('home'))){
                        // echo "第一次登陆,要设置昵称,之后再去个人中心";
                       
                        $res=DB::table('user')->where('email',$request->input('account'))->first();
                        $id=$res['id'];
                        $email=$res['email'];
                        session(['id'=>$id]);
                        session(['email'=>$email]);
                        $data=DB::table('user')->where('id',$id)->first();
                        $name=$data['username'];
                        session(['name'=>$name]);
                        // dd(session('error'));
                        // return view('login.sznc');
                        // return view('login.grzxgrzl');
                        return  redirect('/login/grzxgrzl');
                    }else{
                        // echo "不是第一次登陆,直接就去个人中心,个人中心显示昵称";
                        // dd($request->all());
                        $res=DB::table('user')->where('email',$request->input('account'))->first();
                        $id=$res['id'];
                        $email=$res['email'];
                        session(['id'=>$id]);
                        session(['email'=>$email]);
                        $data=DB::table('user')->where('id',$id)->first();
                        $name=$data['username'];
                        session(['name'=>$name]);
                        // dd(session('error'));
                        return view('login.grzx');

                    }
                    
                }else{
                    // echo '密码不正确';
                    session(['error'=>"密码不正确"]);
                    // dd(session('error'));
                    return  redirect('/login/login');
                }
                
            }else{
                session(['error'=>"账户不存在"]);
                // dd(session('error'));
                return  redirect('/login/login');
            }
        }else{
             // echo "手机";
            $res=DB::table('user')->where('phone',$account)->first();
            if($res){
                // echo "该用户存在";
                // dd($res);
                if($res['pass']==$pass){
                // if(Hash::check($res['pass'],$pass)){
                    // echo '密码正确';
                    session()->forget('error');
                    if(empty(session('home'))){
                        // echo "第一次登陆,要设置昵称,之后再去个人中心";
                        // return view('login.sznc');
                         $res=DB::table('user')->where('phone',$request->input('account'))->first();
                        $id=$res['id'];
                        $phone=$res['phone'];
                        session(['id'=>$id]);
                        session(['phone'=>$phone]);
                        //本来没有但是为了不设置昵称,所以设定的这个
                        $data=DB::table('user')->where('id',$id)->first();
                        $name=$data['username'];
                        session(['name'=>$name]);
                        return view('login.grzx');


                    }else{
                        // echo "不是第一次登陆,直接就去个人中心,个人中心显示昵称";
                        // dd($request->all());
                        $res=DB::table('user')->where('phone',$request->input('account'))->first();
                        $id=$res['id'];
                        $phone=$res['phone'];
                        session(['id'=>$id]);
                        session(['phone'=>$phone]);
                        // dd(session('id'));
                        // dd(session('phone'));
                        $data=DB::table('user')->where('id',$id)->first();
                        $name=$data['username'];
                        session(['name'=>$name]);
                        return view('login.grzx');

                    }
                    
                }else{
                    // echo '密码不正确';
                    session(['error'=>"密码不正确"]);
                    // dd(session('error'));
                    return redirect('/login/login');
                }
                
            }else{
                session(['error'=>"账户不存在"]);
                // dd(session('error'));
                return redirect('/login/login');
            }
        }
    }


    //退出登录
    public function getLogout(){
        // echo "退出登录";
        session()->forget('phone');
        session()->forget('iphone');
        session()->forget('iemail');
        session()->forget('id');
        session()->forget('error');
        session()->forget('home');
        session()->forget('name');
        // dd(session('error'));
        return redirect('/login/login');
    }

    //设置昵称
    public function postSznc(Request $request){
        session(['home'=>"{$request->input('nickname')}"]);
        return redirect('/login/grzx');
    }

    //忘记密码
    public function getForget(){
        // echo "忘记密码";
    
        return view("login.forget");
    }

    //个人中心修改密码
    public function getXgmm(){
        // echo "修改密码";
         return view("login.xgmm");
    }

    //个人中心执行密码
    public function postDoxgmm(Request $request){
        // echo "执行密码修改";
        $id=session('id');
        $pass=$request->input('username');
        $res=DB::table('user')->where('id',$id)->update(['pass'=>$pass]);
        if($res){
        return redirect('/login/login');
        }else{
            return back();
        }
    }

    //个人中心保存个人资料
    public function postBcgrzl(Request $request){
        // echo "保存个人资料";
        $data=$request->all();
        // dd($data);
        return view('login.bcgrzl',['data'=>$data]);
    }



    //用户注册
    public function getRegister(){
    	// echo "用户注册页面";

    	return view('login.register');
    }

    //执行用户注册
    public function postDoregister(Request $request){
        if($_POST['RegisterForm']['mode']=="phone"){
        // echo '手机';
            // dd($_POST['RegisterForm']['mode']);
            if(session('code')==$request->input('phonecode')){
                // echo "赶紧做吧";
                $b=$request->only(['account']);
                $data['phone']=$b['account'];
                // $data=$request->all();
                $a=$request->only(['aa']);
                $data['pass']=$a['aa'];
                // $data['pass']=Hash::make($data['pass']);
                $data['token']=str_random(50);
                $data['status']=0;
                // dd($data);
                if($user_id=DB::table('user')->insertGetId($data)){
                    // echo "手机用户插入成功";
                    return view('login.grzx');
                    
                }else{
                    return back();
                }
                
            }else{
                return back();
            }    
            
                      
        }else{
        // echo '邮箱';
        // echo "执行用户注册";
        // dd($_POST);
            if(session('code')==$request->input('code')){
                $data=$request->only(['pass','email']);
                 // $data=$request->all();
                // $data['pass']=Hash::make($data['pass']);
                // $data['pass']=$data['pass'];
                $data['token']=str_random(50);
                $data['status']=0;
                // dd($data);
               
                // DB::table('user')->insert($data);
                    if($user_id=DB::table('user')->insertGetId($data)){
                        // echo $user_id;
                        //发送一句文本
                        // Mail::raw('恭喜您成功注册vivo,请尽快激活', function ($message) use($data) {
                        // $message->to($data['email']);
                        // $message->subject('激活邮件');
                        // });

                        //发送一个模板(含有一个链接)
                        // Mail::send('模板名','模板参数',function ($message) use($data){
                        // return view('login.yxzccg');
                        // dd('避免发送邮件特别频繁,将return提前');
                        Mail::send('email.jihuo',['token'=>$data['token'],'id'=>$user_id],function ($message) use($data){
                            $message->to($data['email']);
                            $message->subject('邮件');
                        });
                        return view('login.yxzccg');

                        
                    
                }else{
                    return back();
                }
            }
        }    
    }
    // 个人中心
    public function getGrzx(){

        return view('login.grzx');
    }

    public function getGrzxgrzl(){
        $id=session('id');
     
        $res=DB::table('user')->where('id',$id)->first();
        // dd( $res);
        if($res['username']){
            $username=$res['username'];
            session(['name'=>$username]);
            $res=DB::table('user')->where('id',$id)->first();

            return view('login.grzxgrzl',['data'=>$res]);
        }else{
            // return ('login.xggrzl');
            return redirect('/login/xggrzll');
        }
        
    }

      //个人中心修改个人资料
    public function postXggrzl(){
        // echo "修改个人资料";

        return view('login.xggrzl');
    }

    public function getXggrzll(){
        // echo "修改个人资料";

        return view('login.xggrzl');
    }


    public static function postDoxggrzl(Request $request){
        // echo "保存个人资料";
        $data=$request->all();
        $id=session('id');
        $name=$data['name'];
        $sex=$data['sex'];
        $iphone=$data['iphone'];
        $iemail=$data['iemail'];
        $res=DB::table('user')->where('id',$id)->update(['username'=>$name,'sex'=>$sex,'phone'=>$iphone,'email'=>$iemail,]);
        
        // $funame=DB::table('cate')->where('id',$pid)->first()['cate'];
        
        // $data=DB::table('user')->where('id',$id)->first();
        // dd($data);
        // session(['name'=>$name]);
        // session(['sex'=>$sex]);
        // session(['iphone'=>$iphone]);
        // session(['iemail'=>$iemail]);
        // dd(session('iemail'));
        // return view('login.xggrzl');
        return redirect('/login/grzxgrzl');
 
        // 
    }
     // 个人中心的我的订单
    public function getGrzxwddd(){
        return view('login.grzxwddd');
    }
     // 个人中心的收货地址
    public function getGrzxshdz(){
        return view('login.grzxshdz');
    }

    

    public function getJihuo(Request $request){
        // echo "激活邮件";
        // 通过token来判断用户的合法身份
        $user=DB::table('user')->where('id',$request->input('id'))->first();
        if($user['token']==$request->input('token')){
            // 修改status为1
            $res=DB::table('user')->where('id',$request->input('id'))->update(['status'=>1]);
            if($res){
                return view('login.login');
            }else{
                echo "激活失败";
            }
        }else{
            echo '非法请求';
        }
        
    }


    public function getCode(){
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 80, $height = 48, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        // Session::flash('code', $phrase);
        session(['code'=>$phrase ]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }


    // 发送注册短信验证码
    public function postSendyzm(Request $request){
     
       
        $curl = new \Curl\Curl();
        // $curl->get('http://xfdlamp169.applinzi.com/index.php?&com=vivo&code=1234');
        $code=rand(0000,9999);
        $account=$request->input('account');
        session(['mcode'=>$code]);
        session(['phone'=>$account]);

        // echo session('mcode');
        //为了验证测试并且不浪费短信所以将return view('login.sendforgetyzm');提前避免了浪费短信
        // return view('login.sendforgetyzm');
        // dd($code);
        $curl->get('http://xfdlamp169.applinzi.com?to='.$account.'&com=vivo&code='.$code);        
        if ($curl->error) {
            echo "短信发送失败";
        }
        else {
            // echo $curl->response;
            return view('login.sendforgetyzm');
        }
       
    }

    //判断验证码是否正确
    public function postDosendyzm(Request $request){
        if( $request->input('phonecode')==session('mcode')){
            // echo "验证码正确";
            return view('login.czmm');
        }else{
            echo "验证码不正确";
        }
    }

    //更改密码
    public function postUpdate(Request $request){
        // $pass=Hash::make( $request->input('resetpwd'));
        $pass= $request->input('resetpwd');
        $phone=session('phone');
        // dd($phone);
        $res=DB::table('user')->where('phone',$phone)->update(['pass'=>$pass]);
        if($res){
            return view('login.mmxgcg');
        }else{
            echo '密码修改失败';
        }

    }
} 

