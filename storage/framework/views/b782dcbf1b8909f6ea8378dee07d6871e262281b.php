<?php $__env->startSection('content'); ?>


  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="left-sidebar">

          <h2><a href="<?php echo e(URL::to('/user_profile/'.Session::get('customer_id'))); ?>">Dashboard</a></h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->

      							<div class="panel panel-default">

      								<div class="panel-heading">
      									<h4 class="panel-title"><a href="<?php echo e(URL::to('/edit_profile')); ?>">Edit Profile</a></h4>
                        <h4 class="panel-title"><a href="<?php echo e(URL::to('/change_password')); ?>">Password</a></h4>
      								</div>
      							</div>

      						</div><!--/category-products-->

        </div>
      </div>


      <section id="cart_items">
        <div class="container">

          <div class="shopper-informations">
            <div class="row">

              <div class="col-sm-8 clearfix">
                <div class="bill-to">
                  <p>
                      <h4><?php echo e(Session::get('message')); ?></h4>
                  </p>
                  <p>Change Password</p>
                  <div class="form-one">

                    <form action="<?php echo e(url('/save_password')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                      <label>Current Password</label><input type="password" name="current_password" placeholder="Enter your current password">
                      <label>New Password</label><input type="password" name="new_password" placeholder="Enter a new password">

                      <input type="submit" class="btn btn-default" value="Done">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> <!--/#cart_items-->
          </div>

      </div><!--features_items-->

      </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>