<?php $__env->startSection('content'); ?>
    <div class="container">
        <hr color="#c0c0c0">
        <?php if(!is_null($headline)): ?>
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    <?php if($headline->image_path): ?>
                                        <img src="<?php echo e(asset('storage/image/' . $headline->image_path)); ?>" class="rounded-circle">
                                    <?php endif; ?>
                                </div>	
                                <div class="title p-2">
                                    <h1><?php echo e(str_limit($headline->title, 70)); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto"><?php echo e(str_limit($headline->body, 650)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    <?php echo e($post->updated_at->format('Y年m月d日')); ?>

                                </div>
                                <div class="title">
                                    <?php echo e(str_limit($post->title, 150)); ?>

                                </div>
                                <div class="body mt-3">
                                    <?php echo e(str_limit($post->body, 100)); ?>

                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                <?php if($post->image_path): ?>
                                    <img src="<?php echo e(asset('storage/image/' . $post->image_path)); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                    <h2>更新完了</h2>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/news/index.blade.php ENDPATH**/ ?>