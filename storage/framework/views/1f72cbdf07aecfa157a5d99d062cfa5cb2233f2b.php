<?php $__env->startSection('content'); ?>
<h2 class="title text-center">Features Items</h2>
<?php
foreach( $product_by_category as $v_product_by_category ){ ?>
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
      <div class="productinfo text-center">
        <img src="<?php echo e(URL::to($v_product_by_category->product_image)); ?>" style="height: 300px;" alt="" />
        <h2><?php echo e($v_product_by_category->product_price); ?> TK</h2>
        <p><?php echo e($v_product_by_category->product_name); ?></p>
        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
      </div>
      <div class="product-overlay">
        <div class="overlay-content">
          <h2><?php echo e($v_product_by_category->product_price); ?> TK</h2>
          <p><?php echo e($v_product_by_category->product_name); ?></p>
          <?php if( $v_product_by_category->discount != NULL && date('y-m-d') > $v_product_by_category->from_date && date('y-m-d') < $v_product_by_category->to_date ){ ?>
            <h2><?php echo e($v_product_by_category->discount); ?>% OFF</h2>
          <?php } ?>
          <a href="<?php echo e(URL::to('/view_product/'.$v_product_by_category->product_id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('category', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>