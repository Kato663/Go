<?php $__env->startSection('content'); ?>
	<div class="container">
		<hr color="#ff7f50">
		<?php if(!is_null($headline)): ?>
		<div class="row">
			<div class="headline col-md-12 mx-auto">
				<div class="row">
					<div class="col-md-3">
						<div><?php echo e(str_limit('名前:' .$headline->name)); ?></div>
					</div>
					<div class="col-md-3">
						<p class="gender mx-auto"><?php echo e(str_limit('性別:' .$headline->gender)); ?></p>
					</div>
					<div class="col-md-3">
						<p class="hobby mx-auto"><?php echo e(str_limit('趣味:' .$headline->hobby)); ?></p>
					</div>
					<div class="col-md-3">
						<p class="introduction mx-auto"><?php echo e(str_limit('自己紹介:' .$headline->introduction)); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="posts col-md-12 mx-auto">
				<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<hr color="#ff7f50">
				<div class="post">
					<div class="row">
							<div class="name col-md-3">
								<div class="name mx-auto"><?php echo e(str_limit('名前:' .$post->name)); ?></div>
							</div>
							<div class="gender col-md-3">
								<p class="gender mx-auto ml-5"><?php echo e(str_limit('性別:' .$post->gender)); ?></p>
							</div>
							<div class="col-md-3">
								<p class="hobby mx-auto"><?php echo e(str_limit('趣味:' .$post->hobby)); ?></p>
							</div>
							<div class="col-md-3">
								<p class="introduction mx-auto"><?php echo e(str_limit('自己紹介:' .$post->introduction)); ?></p>
							</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.test', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/laravel/resources/views/profile/index.blade.php ENDPATH**/ ?>