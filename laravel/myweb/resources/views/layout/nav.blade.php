
<div class="vivo-menu-series">

<div class="vms-bigbox">

<div class="vms-box cl">
@foreach($cate as $v)
    <dl>
        <dt><a class="v-gb-ico" href="/home/shouji/sj/{{$v['cate']}}">{{$v['cate']}}</a></dt>
        @foreach($v['sub'] as $val)
            <dd><a class="v-gb-ico shop" href="" >{{$val['cate']}}</a></dd> <!-- ="/home/shouji/sj/{{$val['cate']}}" -->
        @endforeach
    </dl>
@endforeach

</div>

</div>

</div>



