<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('category', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h2 class="title text-center">Features Items</h2>
<?php
foreach( $all_published_product as $v_published_product ){ ?>
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
      <div class="productinfo text-center">
        <img src="<?php echo e(URL::to($v_published_product->product_image)); ?>" style="height: 300px;" alt="" />
        <h2><?php echo e($v_published_product->product_price); ?> TK</h2>
        <p><?php echo e($v_published_product->product_name); ?></p>
        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
      </div>
      <div class="product-overlay">
        <div class="overlay-content">
          <h2><?php echo e($v_published_product->product_price); ?> TK</h2>
          <p><?php echo e($v_published_product->product_name); ?></p>
          <?php
          $current_date = new DateTime(); // Today
          $from = new DateTime($v_published_product->from_date);
          $to  = new DateTime($v_published_product->to_date);
            if( $v_published_product->discount != NULL && $current_date>$from && $current_date<$to){ ?>
            <h2><?php echo e($v_published_product->discount); ?>% OFF</h2>
          <?php } ?>
          <a href="<?php echo e(URL::to('/view_product/'.$v_published_product->product_id)); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>