@extends('admin.admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders List</a></li>
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
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<!-- <h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2> -->
						<div class="box-icon">
							<!-- <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a> -->
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

							<?php
								$charges=DB::table('tbl_charges')
														->select('tbl_charges.*')
														->first();
							?>

					@foreach ($all_order as $v_order)

						  <tbody>
							<tr>
								<td>{{ $v_order->order_id }}</td>
								<td class="center">{{ $v_order->customer_name }}</td>
								<td class="center">{{ $v_order->order_total + $v_order->order_total*$charges->vat/100 - $v_order->order_total*$charges->discount/100 + $charges->delivery_charge }}</td>
                <td class="center">{{ $v_order->order_status }}</td>

								<td class="center">
                  @if($v_order->order_status=='Pending')
									<a class="btn btn-success" href="{{URL::to('/order_success/'.$v_order->order_id)}}">
                    <i class="halflings-icon white thumbs-up"></i>
									</a>
                  @else
									<a class="btn btn-danger" href="{{URL::to('/order_pending/'.$v_order->order_id)}}">
											<i class="halflings-icon white thumbs-down"></i>
									</a>
                  @endif
									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_order/'.$v_order->order_id)}}" id="delete">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>

						  </tbody>
						@endforeach
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection
