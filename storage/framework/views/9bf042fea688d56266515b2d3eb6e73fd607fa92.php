<?php $__env->startSection('admin_content'); ?>

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>

					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo e(url('/save_product')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="">
							  </div>
							</div>

              <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">

                    <option>Select Category</option>

                    <?php

                        $all_published_category = DB::table('tbl_category')
                                                  ->where('publication_status',1)
                                                  ->get();

                  foreach( $all_published_category as $v_category ){ ?>
									           <option value="<?php echo e($v_category->category_id); ?>"><?php echo e($v_category->category_name); ?></option>
                  <?php } ?>

								  </select>
								</div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3" required=""></textarea>
							  </div>
							</div>

              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3" required=""></textarea>
							  </div>
							</div>

              <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
							  </div>
							</div>

              <div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div>

              <div class="control-group">
							  <label class="control-label" for="date01">Product Unit</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" required="">
							  </div>
							</div>

              <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" required="">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">Discount (%)</label>
								<div class="controls">
								<input type="text" class="input-xlarge" name="discount" required="">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">Start Date</label>
								<div class="controls">
								 <input type="text" name="from_date" id="from_date" class="input-xlarge" placeholder="From Date" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">End Date</label>
								<div class="controls">
								<input type="text" name="to_date" id="to_date" class="input-xlarge" placeholder="To Date" />
								</div>
							</div>

							<script>
	      $(document).ready(function(){
	           $.datepicker.setDefaults({
	                dateFormat: 'yy-mm-dd'
	           });
	           $(function(){
	                $("#from_date").datepicker();
	                $("#to_date").datepicker();
	           });
	           $('#filter').click(function(){
	                var from_date = $('#from_date').val();
	                var to_date = $('#to_date').val();

	           });
	      });
	 </script>

              <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Publication Status</label>
                <div class="controls">
                <input type="checkbox" name="publication_status" value="1"></input>
                </div>
              </div>

							<div class="control-group hidden-phone">
                <p class="alert-success">

									<?php

											$message=Session::get('message');

											if($message){
												echo $message;
												Session::put('message',null);
											}

									 ?>

								</p>
              </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>