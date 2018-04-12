<?php $__env->startSection('content'); ?>
    <div class="row four bouns-list" style="margin:0; margin-top:50px;">
        <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
            <div style="width:99%;"  class="money-1 bouns-1">
                <p style="background: url(/static/image/9.png) right center no-repeat;"></p>
                <h2 style="font-weight: bold;"><span><?php echo e($data['firstGenerationBonus']); ?></span>元</h2>
                <h3 style="font-size:18px;">一代分享总额</h3>
            </div>
            <div style="width:3%;"></div>
        </div>


        <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
            <div style="width:3%;"></div>
            <div style="width:99%;" class="money-1 bouns-1">
                <a href="/bonus/firstGenerationPeople"><p style="background: url(/static/image/8.png) right center no-repeat;"></p></a>
                <h2 style="font-weight: bold;"><span><?php echo e($data['firstGenerationPeople']); ?></span>人</h2>
                <h3 style="font-size:18px;">一代分享人数</h3>
            </div>
        </div>


        <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
            <div style="width:99%;"  class="money-1 bouns-1">
                <p style="background: url(/static/image/7.png) right center no-repeat;"></p>
                <h2 style="font-weight: bold;"><span><?php echo e($data['secondGenerationBonus']); ?></span>元</h2>
                <h3 style="font-size:18px;">二代分享总额</h3>
            </div>
            <div style="width:3%;"></div>
        </div>



            <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
                <div style="width:3%;"></div>
                <div style="width:99%;" class="money-1 bouns-1">
                    <a href="/bonus/secondGenerationPeople"><p style="background: url(/static/image/6.png) right center no-repeat;"></p>  </a>
                    <h2 style="font-weight: bold;"><span><?php echo e($data['secondGenerationPeole']); ?></span>人</h2>
                    <h3 style="font-size:18px;">二代分享人数</h3>
                </div>
            </div>




            <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
                <div style="width:99%;"  class="money-1 bouns-1">
                    <a href="/bonus/credit"><p style="background: url(/static/image/2.png) right center no-repeat;"></p></a>
                    <h2 style="font-weight: bold;"><span><?php echo e($data['credit']); ?></span>元</h2>
                    <h3 style="font-size:18px;">积分明细</h3>
                </div>
                <div style="width:3%;"></div>
            </div>




        <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
            <div style="width:3%;"></div>
            <div style="width:99%;" class="money-1 bouns-1">
                <a href="/bonus/managerBonus"><p style="background: url(/static/image/10.png) right center no-repeat;"></p></a>
                <h2 style="font-weight: bold;"><span><?php echo e($data['managerBonus']); ?></span>元</h2>
                <h3 style="font-size:18px;">管理奖金</h3>
            </div>
        </div>





        <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
            <div style="width:99%;"  class="money-1 bouns-1">
                <a href="/bonus/personalNet"><p style="background: url(/static/image/11.png) right center no-repeat;"></p></a>
                <h2 style="font-weight: bold;"><span><?php echo e($data['personalNet']); ?></span>元</h2>
                <h3 style="font-size:18px;">个人网体奖金</h3>
            </div>
            <div style="width:3%;"></div>
        </div>




            <div class="col-md-6 col-xs-6 col-sm-6 money" style="padding:0;">
                <div style="width:3%;"></div>
                <div style="width:99%;" class="money-1 bouns-1">
                    <a href="/bonus/teamNet"><p style="background: url(/static/image/4.png) right center no-repeat;"></p></a>
                    <h2 style="font-weight: bold;"><span><?php echo e($data['teamNet']); ?></span>元</h2>
                    <h3 style="font-size:18px;">团队网体奖金</h3>
                </div>
            </div>

        <div class="col-md-12 col-xs-12 col-sm-12 team" style="padding:0;">
            <div class="team-1" style="width: 99%;height: 154px;">
                <p style="background: url(/static/image/3.png) right center no-repeat;"></p>
                <h3 class="money-title" style="height: 40px;line-height: 30px;">团队加权分红总额</h3>
                <div class="team-l col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                    <h4 style="font-weight: bold; font-size: 1.2em;"><span>0</span>元</h4>
                    <h5>团队分红</h5>
                </div>
                <div class="team-r col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                    <h4 style="font-weight: bold; font-size: 1.2em;"><span>0</span>元</h4>
                    <h5>消费积分</h5>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>