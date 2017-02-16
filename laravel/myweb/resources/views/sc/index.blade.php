@extends('layout.headindex')
@section('con')
<div id="content" class="cl">
<div id="j_HomeBanner" class="home-banner">
    <ul class="container">
            <li class="banner-item instage" style="z-index: 9; opacity: 1; display: block;">
            <div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/20170206100507124763_original.jpg" usemap="#Mmodule_1486346736943">
        
    </div>
</div>
    </li>
    </ul>
</div>
<div class="home-content-wrapper">
<div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/2017020609373945166_original.jpg" usemap="#Mmodule_1486345088632">
    </div>
</div>
@foreach($ee as $v)
@for($i=1;$i<2;$i++)
<div class="structure-module full">
    <div class="sm-wrapper">
       <a href="/home/good/xq/{{$v['id']}}"><img class="j_bgImage" data-ratio="1.92" src="{{$v['pic'.$i]}}" usemap="#Mmodule_1486345124565"></a> 
        <map class="j_map" name="Mmodule_1486345124565"><area class="j_link" data-coords="543,144,643,194" coords="1042.56,276.48,1234.56,372.47999999999996" href="https://shop.vivo.com.cn/product/9964" target="_blank"></map>
    </div>
</div>
@endfor
@endforeach
<div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/2017020616282488593_original.jpg" usemap="#Mmodule_1486369734385">
        
    </div>
</div>
</div>
</div>

@endsection