<?php $__env->startSection('title', 'ニュースの新規作成'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成3</h2>
                
                <form action="<?php echo e(action('Admin\NewsController@create')); ?>" method="post" enctype="multipart/form-data">
                    <?php if(count($errors) > 0): ?>
                    <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <!--ifからendifまで、まだ良く分からない-->
                    <div class="form-group row">
                        <!--rowは行のことを指しており、12等分できるという考えなので、md-2は行を2/12しておくという意味-->
                        <!--詳しくはブーストラップで検索-->
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>">
                                <!--タイトルの横につくしろいところoldでエラーが出たときに前の文章が保存される？-->
                        </div>
                    </div>
                    <!--ここまでがタイトル文-->
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20"><?php echo e(old('body')); ?></textarea>
                        </div>
                    </div>
                    <!--ここまでが本文-->
                    <div class="form-group row">
                        <label class="col-md-2"  for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <!--typeをfileにすることでデスクトップフォルダ検索できるようになる-->
                            <!--右の選択されていませんを編集する方法は不明-->
                        </div>
                    </div>
                    <!--ここまでが画像の入れ方-->
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                        <div class="col-md-10">
                            <a href="<?php echo e(action('Admin\NewsController@index')); ?>" role="button" class="btn btn-primary col-md-9">ニュース一覧に戻る</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/admin/news/create.blade.php ENDPATH**/ ?>