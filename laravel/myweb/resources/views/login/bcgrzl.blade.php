@extends('layout.grzx')

@section('con')
<article class="content">

<dl>
    <dt class="module-title">个人资料</dt>
    <dd class="module-item">
        <input value="" class="province" type="hidden">
        <input value="" class="city" type="hidden">
        <input value="" class="area" type="hidden">
        <form class="information-form"  novalidate="novalidate" action="/login/bcgrzl" method="post">
            {{csrf_field()}}
            <center>
                <table class="form-table" >
            <!--         <colgroup>
                        <col style="width: 150px;">
                        <col>
                    </colgroup>
         -->            <tbody>
        <!--             <tr>
                        <th>当前头像：</th>
                        <td>
                            <img src="/grzxgrzl/big">
                        </td>
                    </tr> -->
                    <tr>            
                        <td>姓名：{{$data['realName']}}</td>
                    </tr>
                    <tr>
                        <td class="sex-box">
                            性别: @if($data['sex']==1)
                                    男
                                  @else
                                    女
                                  @endif
                        </td>
                    </tr>
                    <tr>        
                        <td id="j_ReginContriner">
                            <!--层级联动选择框-->
                            <p class='info'>居住地:<span dizhi="{{$data['sheng']}}/{{$data['shi']}}/{{$data['xian']}}"> </span> 
                            </p>
                            <!-- <p class='info'>居住地:<span>{{$data['sheng']}}/{{$data['shi']}}/{{$data['xian']}} </span> 
                            </p> -->
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><button class="btn-blue submit btn-submit" type="submit">保存</button></td> -->
                        <td></td>
                        <td><input type="submit" value="保存" class="btn-blue submit btn-submit" ></td>
                    </tr>
                    </tbody>
                </table>
            </center>    
        </form>
      

    </dd>
</dl>

    </article>
    <script type="text/javascript">
            $(document).ready(function(){
                showLocation();

                //显示id对应的地址
                    var info=$('.info').find('span').attr('dizhi');
                    var res=change(info);
                    $('.info').find('span').html(res);
               

                function change(info){
                    var arr=info.split('/');
                    var xx=new Location();
                    var xx=xx.items;
                    var sheng=xx[0][arr[0]];
                    var shi=xx[0+','+arr[0]][arr[1]];
                    var xian=xx[0+','+arr[0]+','+arr[1]][arr[2]];

                    return sheng+shi+xian;
                }

            });
</script>

@endsection
