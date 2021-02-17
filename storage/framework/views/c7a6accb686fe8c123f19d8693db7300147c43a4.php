<?php $__env->startSection('category'); ?>


    <h2>Category</h2>
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->

							<div class="panel panel-default">

                <?php

                    $all_published_category = DB::table('tbl_category')
                                              ->where('publication_status',1)
                                              ->get();

              foreach( $all_published_category as $v_category ){ ?>

								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo e(URL::to('/product_by_category/'.$v_category->category_id)); ?>"><?php echo e($v_category->category_name); ?></a></h4>
								</div>
                <?php } ?>
							</div>

						</div><!--/category-products-->


<?php $__env->stopSection(); ?>
