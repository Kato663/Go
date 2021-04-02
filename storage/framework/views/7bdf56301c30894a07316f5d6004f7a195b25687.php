<?php $__env->startSection('title', '登録済みニュースの一覧'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo e(action('Admin\NewsController@add')); ?>" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="<?php echo e(action('Admin\NewsController@index')); ?>" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value=<?php echo e($cond_title); ?>>
                        </div>
                        <div class="col-md-2">
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                	<th><?php echo e($news->id); ?></th>
                                    <td><?php echo e(str_limit($news->title, 100)); ?></td>
                                    <td><?php echo e(str_limit($news->body, 250)); ?></td>
                                    <td>
                                        <div>
                                            <a href="<?php echo e(action('Admin\NewsController@edit', ['id' => $news->id])); ?>">編集</a>
                                        </div>
                                        <div>
                                             <a href="<?php echo e(action('Admin\NewsController@delete', ['id' => $news->id])); ?>">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/admin/news/index.blade.php ENDPATH**/ ?>