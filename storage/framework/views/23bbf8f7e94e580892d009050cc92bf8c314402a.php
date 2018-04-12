<?php $__env->startSection('content'); ?>

    <div class="row nav-top" style="margin:0;">
        <a href="javascript:;">
            <div class="nav-l col-md-11 col-sm-10 col-xs-10" style="padding-right: 0;">环润创新微销</div>
        </a>
        <div class="nav-r col-md-1 col-sm-2 col-xs-2" id="avatar" style="padding:0;">
            <img  src="<?php echo e(auth()->user()->avatar ?? '/static/image/default-pic.png'); ?>"
                    width="60px" height="60px" style="float:right;">
        </div>
    </div>

    <div class="row second" style="margin:0; margin-top: 60px;">
        <a href="/home/upGrade">
            <div class="col-md-6  col-xs-6 col-sm-6 title-1" style="padding:0;">
                <div style="width:99%;" class="bg-1 total-top">
                    <h2>起步升级</h2>
                    <h1 style="margin-top:12px;"><img src="/static/image/up.png" alt=""></h1>
                </div>
                <div style="width:2%;"></div>
            </div>
        </a>

        <a href="/home/bonusQuery">
            <div class="col-md-6 col-xs-6 col-sm-6 title-2" style="padding:0;">
                <div style="width:100%;" class="bg-4 total-top">
                    <h2>奖金查询</h2>
                    <h1 style="margin-top:12px;"><img src="/static/image/fangda.png" alt=""></h1>
                </div>
            </div>
        </a>

        <a href="/home/income">
            <div class=" col-md-6 col-xs-6 col-sm-6 title-1" style="padding:0;">
                <div style="width:99%;" class="bg-3 total-top">
                    <h2>总收入(个人)</h2>
                    <h1><span><?php echo e($data['income']); ?></span>元</h1>
                </div>
                <div style="width:2%;"></div>
            </div>
        </a>


        <a href="/home/staticBonus">
            <div class="col-md-6  col-xs-6 col-sm-6 title-2"  style="padding:0;">
                <div style="width:100%;" class="bg-2 total-top">
                    <h2>总收益(静态)</h2>
                    <h1><span><?php echo e($data['static_total']); ?></span>元</h1>
                </div>
            </div>
        </a>

        <a href="/home/yesterdayShare">
            <div class=" col-md-6 col-xs-6 col-sm-6" style="padding:0;">
                <div style="width:99%;" class="bg-5 total-top">
                    <h2>前日分红</h2>
                    <h1><span><?php echo e($data['yesterday_share']); ?></span>元</h1>
                </div>
                <div style="width:2%;"></div>
            </div>
        </a>


        <a href="/home/yesterdayBonus">
            <div class=" col-md-6 col-xs-6 col-sm-6" style="padding:0;">
                <div style="width:100%;" class="bg-6 total-top">
                    <h2>前日奖金</h2>
                    <h1><span><?php echo e($data['yesterday_bonus']); ?></span>元</h1>
                </div>
            </div>
        </a>
    </div>

    
        
            
            
        
        
            
        
    
    <div class="row jihuo-door" style="margin:0;margin-top:10px; ">
        <div class="col-md-12 col-sm-12 col-xs-12 jihuo-til">
            <p class="jihuo-name">复购专区</p>
            <p class="jihuo-num">超值产品</p>
        </div>
        <div class=" col-md-12 col-sm-12 col-xs-12" style="padding:0;">
            <a href="exception/build"><img src="/static/image/dub-shop.png" alt="" width="100%"></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>