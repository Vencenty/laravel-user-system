<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 personal-nav">
        <div class="col-md-1 col-sm-1 col-xs-1 back-btn"><img src="/static/image/back.png" alt="" id="goBack"></div>
        <div class="col-md-10 col-sm-10 col-xs-10 personal-name"><?php echo e($title ?? '环润创新微销'); ?></div>
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
    </div>
</div>

<script>
    (function(){
        var goBack = document.getElementById('goBack');

        goBack.onclick = function(){
            history.back(-1);
        }
    })()
</script>