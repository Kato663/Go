<?php $__env->startSection('title', 'ニュースの新規作成編集'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                
                <form action="<?php echo e(action('Admin\NewsController@update')); ?>" method="post" enctype="multipart/form-data">
                    <?php if(count($errors) > 0): ?>
                    <ul>
                    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($e); ?></li>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--エラーメッセージをすべて表示すること-->
                    </ul>
                    <?php endif; ?>
       
                    <div class="form-group row">
                    	<label class="col-md-2" for="title">タイトル</label>
                    	<div class="col-md-10">
                    		<input type="text" class="form-control" name="title" value="<?php echo e($news_form -> title); ?>">
                    	</div>
                    </div>
                    
                    <div class="form-group row">
                    	<label class="col-md-2" for="body">本文</label>
                    	<div class="col-md-10">
                    		<textarea class="form-control" name="body" rows="20"><?php echo e($news_form -> body); ?></textarea>
                    	</div>
                    </div>
                    
                    <div class="form-group row">
                    	<label class="col-md-2" for="image">画像</label>
                    	<div class="col-md-10">
                    		<input type="file" class="form-control-file" name="image">
                    		<div class="form-text text-info">
                    			設定中:<?php echo e($news_form -> image_path); ?>

                    		</div>
                    		<div class="form-check">
                    			 <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                    		</div>
                    	</div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="<?php echo e($news_form->id); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        
                        <ul class="list-group">
                            
                             <?php if($news_form->histories != NULL): ?>
                                <?php $__currentLoopData = $news_form->histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><?php echo e($history->edited_at); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/admin/news/edit.blade.php ENDPATH**/ ?>