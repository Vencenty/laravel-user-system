<!DOCTYPE HTML>
<html>
<head>
    <title>环润微销</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link href="/static/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/static/css/style2.css" rel='stylesheet' type='text/css' />
    <script src="/static/js/jquery-3.2.1.min.js"></script>
    <style>
        .focus{
            border: none;
            outline:medium;

        }
    </style>
</head>
<body>
<div class="container" style="padding:0;">
    <div class="login-w col-md-6 col-sm-8 col-xs-12">
        <div class="col-md-12 login-top"></div>
        <div class="col-md-12 login-title"><h1>welcome</h1></div>
        <form method="post" action="/login">
            {{ csrf_field() }}
            <input type="text" name="mobile" placeholder="请输入手机号" class="focus col-md-12 col-sm-12 col-xs-12 name">
            <input type="password" name="password" placeholder ="请输入密码" class="focus col-md-12 col-sm-12 col-xs-12 pass">


            <div class="col-md-12 col-sm-12 col-xs-12 prompt text-center">{{ session()->get('error') ?? $errors->first()  }}</div>

            <input type="submit" value="立即登录" class="col-md-12 col-sm-12 col-xs-12 submit">

            <div class="col-md-12 col-sm-12 col-xs-12 passtext">

                {{--<div class="col-md-6 col-sm-6 col-xs-6 forget">忘记密码?</div>--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-6 catch">修改密码</div>--}}
            </div>
        </form>
    </div>
</div>

</body>
</html>


