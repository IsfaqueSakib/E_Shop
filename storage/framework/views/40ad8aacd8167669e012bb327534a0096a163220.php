<?php $__env->startSection('admin_content'); ?>

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">

				<?php

						$message=Session::get('message');

						if($message){
							echo $message;
							Session::put('message',null);
						}

				 ?>

			</p>

			<form action="/admin_allCategory_search" method="post">
				<?php echo e(csrf_field()); ?>

			<div>
				<div class="search_box pull-right">
					<input type="text" class="st-default-search-input" style="width: 300px; height: 40px" placeholder="Search" name="search" />
					<button type="submit" class="btn-btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</div>
		</form>

			<div class="row-fluid sortable">
				<div class="box span12">
					<!-- <div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div> -->
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
							  <tr>
								  <th>Category ID</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

					<?php $__currentLoopData = $all_category_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						  <tbody>
							<tr>
								<td><?php echo e($v_category->category_id); ?></td>
								<td class="center"><?php echo e($v_category->category_name); ?></td>
								<td class="center"><?php echo e($v_category->category_description); ?></td>
								<td class="center">

									<?php if($v_category->publication_status==1): ?>
									    	<span class="label label-success">Active</span>
									<?php else: ?>
												<span class="label label-danger">Inctive</span>
									<?php endif; ?>
								</td>
								<td class="center">
									<?php if($v_category->publication_status==1): ?>
									<a class="btn btn-danger" href="<?php echo e(URL::to('/inactiveCategory/'.$v_category->category_id)); ?>">
										<i class="halflings-icon white thumbs-down"></i>
									</a>
									<?php else: ?>
									<a class="btn btn-success" href="<?php echo e(URL::to('/activeCategory/'.$v_category->category_id)); ?>">
										<i class="halflings-icon white thumbs-up"></i>
									</a>
									<?php endif; ?>
									<a class="btn btn-info" href="<?php echo e(URL::to('/editCategory/'.$v_category->category_id)); ?>">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="<?php echo e(URL::to('/deleteCategory/'.$v_category->category_id)); ?>" id="delete">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>

						  </tbody>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>