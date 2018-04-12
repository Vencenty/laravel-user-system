<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row one-member" style="box-shadow: none;margin-top: 70px;">
        <ul>
            <li class="col-md-12" style="padding:0;">
                <span class="col-md-6 member-til  col-xs-6 col-sm-6 member-til-top">分享人</span>
                <span class="col-md-6 member-til col-xs-6 col-sm-6 stratic-bonus member-til-right">分享所得奖励</span>
            </li>

            <?php if( !$data->isEmpty() ): ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-md-12" style="padding:0;">
                    <span class="col-md-6 member-til  col-xs-6 col-sm-6" style="color: #000;"><?php echo e($item->nickname); ?></span>
                    <span class="col-md-6 member-til col-xs-6 col-sm-6 stratic-bonus" style="color: #000;">
                         <?php if(in_array($item->wxlevel, [1,0])): ?>
                            <?php echo e($item->wxlevel); ?>

                        <?php else: ?>
                            <?php echo e($item->wxlevel * 0.15); ?>

                        <?php endif; ?>
                    </span>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <li class="col-md-12 under-line" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc;">您目前暂无一代推荐人</li>
            <?php endif; ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>