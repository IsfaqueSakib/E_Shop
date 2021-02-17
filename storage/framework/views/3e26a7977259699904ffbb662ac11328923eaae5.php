<?php $__env->startSection('content'); ?>
<div class="card-body">

      <?php echo Form::open(['url' => '/addProduct','method'=>'POST','role'=>'form']); ?>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Product Name')); ?></label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                <?php if($errors->has('name')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Price')); ?></label>

            <div class="col-md-6">
                <input id="price" type="text" class="form-control" name="price" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Save')); ?>

                </button>
            </div>
        </div>
    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>