<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)//对象注入  Closure->类型约束
    {
        //存储所有的请求路由规则  php中绝对路径-》安装apache的盘符目录 html中绝对路径 域名解析目录
        //php中的路径使用相对 在html中的使用绝对的
        //在laravel中的相对路径都是相对于index.php（入口文件）
      
        $route = $request->path();   //获取url中的路由规则 
        file_put_contents('./luyou.txt',$route."\n\r",FILE_APPEND);     
        //echo '中间件'; 
        return $next($request);//球  next 向下一层控制器传递-》请求对象
    }
}
