<?php $__env->startSection('content'); ?>
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
						$total_discount= 0;
						$contents=Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

						<?php foreach($contents as $v_contents){ ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo e(URL::to($v_contents->options->image)); ?>" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo e($v_contents->name); ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo e($v_contents->price); ?></p>

								<?php
										$discount=DB::table('tbl_products')
												->select('tbl_products.discount','tbl_products.from_date','tbl_products.to_date')
												->where('tbl_products.product_id',$v_contents->id)
												->first();

												$per_discount=$discount->discount;
												$current_date = new DateTime();
							          $from = new DateTime($discount->from_date);
							          $to  = new DateTime($discount->to_date);
							            if($current_date<$from || $current_date>$to){
														$per_discount=0;
													}

										$total_discount=$total_discount + $v_contents->price*$v_contents->qty*$per_discount/100;
								 ?>

							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="<?php echo e(url('/update_cart')); ?>" method="post">
										<?php echo e(csrf_field()); ?>

									<input class="cart_quantity_input" type="text" name="qty" value="<?php echo e($v_contents->qty); ?>" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="<?php echo e($v_contents->rowId); ?>">
									<input type="submit" name="submit" class="btn btn-sm btn-default" value="Update">
								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo e($v_contents->total); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete_from_cart/'.$v_contents->rowId)); ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container col-sm-12">

			<div class="row">

				<div >
					<div class="total_area">
						<?php
							$charges=DB::table('tbl_charges')
													->select('tbl_charges.*')
													->first();
						?>
						<ul>
							<li>Cart Sub Total <span><?php echo e(Cart::subtotal()); ?> TK</span></li>
							<li>Discount <span>-<?php echo e(ceil($total_discount)); ?> TK</span></li>
							<li>Shipping Cost <span>+<?php echo e($charges->delivery_charge); ?> TK</span></li>
							<li>Eco Tax <span>+<?php echo e(ceil((Cart::subtotal()-$total_discount)*$charges->vat/100)); ?> TK</span></li>
							<li>Total <span><?php echo e(ceil(Cart::total()-$total_discount+$charges->delivery_charge+(Cart::subtotal()-$total_discount)*$charges->vat/100)); ?> TK</span></li>
						</ul>

						<?php $customer_id=Session::get('customer_id');  ?>
						<?php if($customer_id != NULL) { ?>
								<a class="btn btn-default check_out" href="<?php echo e(URL::to('/checkout')); ?>">Check Out</a>
						<?php } else{ ?>
								<a class="btn btn-default check_out" href="<?php echo e(URL::to('/login_check')); ?>">Check Out</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>