
<div class="row nav-btm" style="margin-top:60px;">
    <div class=" col-md-12 col-sm-12 col-xs-12 ">
        <ul class="good-btm">
            <a href="/home" style="color: #999">
                <li class="col-md-2 col-sm-2 col-xs-2 no-padding" >

                    @if( request()->getRequestUri() == '/home' )
                        <span class="icon-1" style="background: url(/static/image/index-cur.png) center center no-repeat;"></span>
                        <span class="nav-bar active checked-font" style="color: #30beb5;">首页</span>
                    @else
                        <span class="icon-1" style="background: url(/static/image/index.png) center center no-repeat;"></span>
                        <span class="nav-bar active simple">首页</span>
                    @endif

                </li>
            </a>

            <a href="/bonus" style="color: #999">
                <li class="col-md-2 col-sm-2 col-xs-2 no-padding">

                    @if( request()->getRequestUri() == '/bonus' )
                        <span class="icon-1" style="background: url(/static/image/bounces-cur.png) center center no-repeat;"></span>
                        <span class="nav-bar active checked-font" style="color: #30beb5;">奖金管理</span>
                    @else
                        <span class="icon-1" style="background: url(/static/image/bounces.png) center center no-repeat;"></span>
                        <span class="nav-bar active simple" >奖金管理</span>
                    @endif

                    {{--<span class="icon-2" style="background: url(/static/image/bounces.png) center center no-repeat;"></span>--}}
                    {{--<span class="nav-bar">奖金管理</span>--}}
                </li>
            </a>

            <a href="/welfare">
                <li class="col-md-2 col-sm-2 col-xs-2 no-padding">

                    @if( request()->getRequestUri() == '/welfare' )
                        <span class="icon-1" style="background: url(/static/image/firefalt-cur.png) center center no-repeat;"></span>
                        <span class="nav-bar active checked-font" style="color: #30beb5;">福利奖项</span>
                    @else
                        <span class="icon-1" style="background: url(/static/image/firefalt.png) center center no-repeat;"></span>
                        <span class="nav-bar active simple">福利奖项</span>
                    @endif


                </li>
            </a>

            <a href="/spread">


                <li class="col-md-2 col-sm-2 col-xs-2 no-padding">

                    @if( request()->getRequestUri() == '/spread' )
                        <span class="icon-1" style="background: url(/static/image/share-cur.png) center center no-repeat;"></span>
                        <span class="nav-bar active checked-font" style="color: #30beb5;">立即推广</span>
                    @else
                        <span class="icon-1" style="background: url(/static/image/share.png) center center no-repeat;"></span>
                        <span class="nav-bar active simple">立即推广</span>
                    @endif

                </li>
            </a>

            <a href="/center">
                <li class="col-md-2 col-sm-2 col-xs-2 no-padding">
                    @if( request()->getRequestUri() == '/center' )
                        <span class="icon-1" style="background: url(/static/image/personal-cur.png) center center no-repeat;"></span>
                        <span class="nav-bar active checked-font" style="color: #30beb5;">会员中心</span>
                    @else
                        <span class="icon-1" style="background: url(/static/image/personal.png) center center no-repeat;"></span>
                        <span class="nav-bar active simple">会员中心</span>
                    @endif
                </li>
            </a>
        </ul>
    </div>
</div>