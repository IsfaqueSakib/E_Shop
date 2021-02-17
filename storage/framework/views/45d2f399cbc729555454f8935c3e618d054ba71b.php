<?php $__env->startSection('content'); ?>

<section>

      <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
          <div class="col-sm-5">
            <div class="view-product">
              <img src="<?php echo e(URL::to($product_by_details->product_image)); ?>" alt="" />
              <h3>ZOOM</h3>
            </div>


          </div>
          <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
              <img src="<?php echo e(URL::to('frontend/images/product-details/new.jpg')); ?>" class="newarrival" alt="" />
              <h2><?php echo e($product_by_details->product_name); ?></h2>
              <img src="<?php echo e(URL::to('frontend/images/product-details/rating.png')); ?>" alt="" />
              <span>
                <span><?php echo e($product_by_details->product_price); ?> TK</span>
                <form action="<?php echo e(url('/add_to_cart')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                <label>Quantity:</label>
                <input type="text" name="qty" value="1" /><?php echo e($product_by_details->product_size); ?>

                <input type="hidden" name="product_id" value="<?php echo e($product_by_details->product_id); ?>">
                <button type="submit" class="btn btn-fefault cart">
                  <i class="fa fa-shopping-cart"></i>
                  Add to cart
                </button>
              </form>
              </span>
              <p><b>Availability:</b> In Stock</p>

            </div><!--/product-information-->
          </div>
        </div><!--/product-details-->
      </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>