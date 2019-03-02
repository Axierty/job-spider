<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博首页</title>
</head>
<link rel="stylesheet" href="{{asset('static/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('static/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('index/css/common.css')}}">
<link rel="stylesheet" href="{{asset('index/css/home.css')}}">

<body>
    <div class="B_unlog">
        
        <!-- 头部 -->
        <div class="header">
            <div class="main">
                <div class="logo">
                    <a href="javascript:;" class="logo_a">
                        <span></span>
                    </a>
                </div>
                <div class="search">
                    <input type="text" class="search_input">
                    <i class="fa fa-search fa-2x"></i>

                    <div class="search-box" style="display: none">
                        <ul>
                            <li>中华人民解放军</li>
                            <li>中华人民解放军</li>
                            <li>中华人民解放军</li>
                            <li>中华人民解放军</li>
                        </ul>
                    </div>
                </div>
                <div class="tags">
                    <ul>
                        <li>首页</li>
                        <li>视频</li>
                        <li>发现</li>
                        <li>游戏</li>
                        <li>注册</li>
                        <li>登录</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 内容层 -->
        <div class="wb_main">
            <div class="wb_frame">
            
                <div class="wb_main_left">
                    <ul>
                        <li>
                            <a href="javascript:;" class="nav_item cur">热门</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="nav_item">明星</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="nav_item">头条</a>
                        </li>
                    </ul>
                </div>

                <div class="plc_main">
                    <?php foreach($users as $v){  ?>
                    {{ $v->nick_name }}
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>


    
</body>
<script src="{{asset('static/js/jquery-1.8.2.min.js')}}"></script>
<script src="{{asset('index/js/common.js')}}"></script>
</html>