@extends('admin.admin_layout')

@section('admin_content')

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
						<form class="form-horizontal" action="{{url('/save_charges')}}" method="post">
                {{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">VAT(%)</label>
							  <div class="controls">
								<input type="number" class="input-xlarge" name="vat" required="">
							  </div>
							</div>

              <div class="control-group">
                <label class="control-label" for="date01">Delivery Charge</label>
                <div class="controls">
                <input type="number" class="input-xlarge" name="delivery_charge" required="">
                </div>
              </div>

              <!-- <div class="control-group">
                <label class="control-label" for="date01">Discount(%)</label>
                <div class="controls">
                <input type="number" class="input-xlarge" name="discount" required="">
                </div>
              </div> -->

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection
