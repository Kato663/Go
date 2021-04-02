<?php $__env->startSection('title', 'ニュースの新規作成'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>課題用Profile</h2>
                
            </div>
        </div>
         <form action="<?php echo e(action('Admin\ProfileController@create')); ?>" method="post" enctype="multipart/form-data">
                    <?php if(count($errors) > 0): ?>
                    <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
            <div class="form-group row">
                <label class="col-md-2" for="name">氏名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                    <!--タイトルの横につくしろいところoldでエラーが出たときに前の文章が保存される？-->
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2" for="gender">性別</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="gender" value="<?php echo e(old('name')); ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2" for="hobby">趣味</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hobby" value="<?php echo e(old('hobby')); ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <lavel class="col-md-2" for="introduction">自己紹介</lavel>
                 <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="15"><?php echo e(old('introduction')); ?></textarea>
                        </div>
            </div>
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="更新">
                </div>
                <div class="col-md-10">
                    <a href="<?php echo e(action('Admin\ProfileController@index')); ?>" role="button" class="btn btn-primary col-md-9">プロファイル一覧に戻る</a>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/admin/profile/create.blade.php ENDPATH**/ ?>