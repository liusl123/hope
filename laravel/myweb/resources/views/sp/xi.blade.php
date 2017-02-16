@extends('layout.headindex')
@section('con')
<div id="content" class="cl">
<div class="structure-module full">
    <div class="sm-wrapper">
    	@foreach($vo as $v)
    	@for($i=1;$i<5;$i++)
        <a href="/home/good/xq/{{$v['id']}}"><img class="j_bgImage" data-ratio="1.92" src="{{$v['pic'.$i]}}" usemap="#Mmodule_1479955928503"></a>
        @endfor
        @endforeach
        <map class="j_map" name="Mmodule_1479955928503"><area class="j_link" data-coords="226,163,326,213" coords="433.91999999999996,312.96,625.92,408.96" href="http://shop.vivo.com.cn/product/9948" target="_blank"><area class="j_link" data-coords="338,164,438,214" coords="648.9599999999999,314.88,840.9599999999999,410.88" href="http://shop.vivo.com.cn/product/9957" target="_blank"></map>
    </div>
</div><div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sp/20161128095952713658_original.jpg" usemap="#Mmodule_1480298393218">
        
    </div>
</div></div>


@endsection
