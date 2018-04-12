@extends('common.layouts')

@section('title')
    {{$title}}
@stop

@section('content')
    @if( !auth()->user()->question )
    <style>
        .pay-list{
            text-align: center;
        }
        .pay-list > input {
            text-align: left;
        }
        .pay-list:first-child{
            margin-top:30px;
        }
        .pay-list select{
            width: 200px;
            height: 36px;
            border-radius: 4px;
            border: 1px solid #d8d8d8;
        }
        .pay-list input{
            width: 200px;
            height: 36px;
            border-radius: 4px;
            border: 1px solid #d8d8d8;
            text-align: center;
        }
        .pay-list p{
            line-height: 32px;
            color: #e60101;
            clear: both;
            text-align: left;
        }
        button.change-sub{
            height: 36px;
            line-height: 36px;
            border-radius: 4px;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#c9a9fc), to(#9a9ff9));
            border:0;
            color: #fff;
            margin-top: 10px;
            font-size: 1.3em;
        }
    </style>


    <div
            class="row  welfare"
            style="margin-top:60px;margin-bottom: 80px;margin-right: 0;margin-left: 0;text-align: center">
        <form action="/center/setSafeQuestion" method="post" style="margin:20px 10px;">
            {{ csrf_field() }}
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">安全问题一：</label>
                <select name="question1" id="pro0">
                </select>
            </div>
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答案：</label>
                <input type="text" name="answer1">
            </div>
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">安全问题二：</label>
                <select name="question2" id="pro1">
                </select>
            </div>
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答案：</label>
                <input type="text" name="answer2">
            </div>
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">安全问题三：</label>
                <select name="question3"  id="pro2">
                </select>
            </div>
            <div style="margin-bottom:10px;" class="pay-list">
                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答案：</label>
                <input type="text" name="answer3">
            </div>

            <p id="tips" style="color: red;
            @if( count($errors) >0 )
                    display: block;
            @else
                    display: none;
            @endif">
                {{ $errors->first() }}</p>

            <button class="col-md-12 col-sm-12 col-xs-12 change-sub"  onclick="postQuestion(event)" style="background:#ef4f4f">确认提交</button>
        </form>
    </div>
    <script>
        window.onload = function () {
            // 初始化下拉列表
            initSafeQuestion();
        };

        // 提交问题的时候如果没有选择项拒绝提交
        function postQuestion (e) {
            e = e || event;

            const selects = document.querySelectorAll('select');
            const tips = document.querySelector('#tips');
            selects.forEach(function (select, index) {
                if (select.selectedIndex === 0) {
                    tips.style.display = 'block';
                    tips.innerHTML = '第' + (index+1) + '个安全问题不能为空';
                    tips.style.color = 'red';
                    e.preventDefault();
                }
            });
            // tips.style.display = 'none';
        }

        function initSafeQuestion () {
            var questions = ["我父亲的姓名", "我母亲的姓名？", "我的出生地？", "我高中校名？", "我的大学校名？", "我大学毕业年份？", "我老婆/老公的名字？？", "结婚纪念日？", "我的生日？"];
            // 初始化函数
            var selects = document.querySelectorAll('select');
            selects.forEach(function (select) {
                initSelect(select, '--请选择--');
                questions.forEach(function (question) {
                    return initSelect(select, question);
                });
                select.onchange = function () {
                    reloadOption();
                }
        });


            // 重新载入Option
            function reloadOption () {
                var isSelected = [];
                selects.forEach(function (select) {
                    return isSelected[select.selectedIndex] = true;
                });

                selects.forEach(function (select) {
                    for (var i = 1; i <= questions.length; i++) {
                        select.options[i].style.display = isSelected[i] ? 'none' : 'block';
                    }
                });
            }

            // 初始化下拉列表
            function initSelect (select, text) {
                var option = document.createElement('option');
                option.innerHTML = text;
                select.add(option);
            }
        }



    </script>
    @else
        @component('common.tips')
            @slot('text')
                您的安全问题已设置成功
                <a href="/center" class="back-button">返回</a>
            @endslot
        @endcomponent
    @endif
@stop

