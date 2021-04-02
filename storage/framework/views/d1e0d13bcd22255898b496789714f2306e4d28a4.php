<?php $__env->startSection('title', 'プロフィールの新規作成編集'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="<?php echo e(action('Admin\ProfileController@update')); ?>" method="post" enctype="multipart/form-data">
                    <?php if(count($errors) > 0): ?>
                    <ul>
                    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($e); ?></li>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--エラーメッセージをすべて表示すること-->
                    </ul>
                    <?php endif; ?>
                    
                    <div class="form-group row">
                    	<label class="col-md-2" for="name">名前</label>
                    	<div class="col-md-10">
                    		<input type="text" class="form-control" name="name" value="<?php echo e($profile_form->name); ?>">
                    	</div>
                    </div>
                    
                    <div class="form-group row">
                    	<label class="col-md-2" for="gender">性別</label>
                    	<div class="col-md-10">
                    		<input type="text" class="form-control" name="gender" value="<?php echo e($profile_form->gender); ?>">
                    	</div>
                    </div>
                    
                     <div class="form-group row">
                    	<label class="col-md-2" for="hobby">趣味</label>
                    	<div class="col-md-10">
                    		<input type="text" class="form-control" name="hobby" value="<?php echo e($profile_form->hobby); ?>">
                    	</div>
                    </div>
                    
                     <div class="form-group row">
                    	<label class="col-md-2" for="introduction">自己紹介</label>
                    	<div class="col-md-10">
                    		<textarea class="form-control" name="introduction" rows="20"><?php echo e($profile_form->introduction); ?></textarea>
                    	</div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="<?php echo e($profile_form->id); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            
                            <?php if($profile_form->backgrounds != NULL): ?>
                                <?php $__currentLoopData = $profile_form->backgrounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $background): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><?php echo e($background->edited_at); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/admin/profile/edit.blade.php ENDPATH**/ ?>