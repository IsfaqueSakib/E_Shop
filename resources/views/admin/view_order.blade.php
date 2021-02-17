@extends('admin.admin_layout')
@section('admin_content')

<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<!-- <h4><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h4>  -->
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Mobile</th>
                    <th>Email</th>
								  </tr>
							  </thead>
							  <tbody>
								<tr>

                  @foreach($order_by_id as $v_order)
                  @endforeach

									<td>{{ $v_order->customer_name }}</td>
									<td>{{ $v_order->mobile_number }}</td>
                  <td>{{ $v_order->customer_email }}</td>
								</tr>

							  </tbody>
						 </table>
					</div>
				</div><!--/span-->

				<div class="box span6">
					<div class="box-header">
						<!-- <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2> -->
					</div>
					<div class="box-content">
						<table class="table table-striped">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
								  </tr>
							  </thead>
							  <tbody>
								<tr>

                  @foreach($order_by_id as $v_order)
                  @endforeach

									<td>{{ $v_order->shipping_first_name." ".$v_order->shipping_last_name }}</td>
									<td>{{ $v_order->shipping_address }}</td>
									<td>{{ $v_order->shipping_mobile_number }}</td>
                  <td>{{ $v_order->shipping_email }}</td>
								</tr>
							  </tbody>
						 </table>

					</div>
				</div><!--/span-->
			</div><!--/row-->

      <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<!-- <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2> -->
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>Product Name</th>
									  <th>Product Price</th>
									  <th>Sales Quantity</th>
                    <th>Sub Total</th>
								  </tr>
							  </thead>
							  <tbody>

									<?php
									$total_discount=0;
										$charges=DB::table('tbl_charges')
																->select('tbl_charges.*')
																->first();
									?>

                  @foreach($order_by_id as $v_order)
								<tr>
									<td>{{ $v_order->order_id }}</td>
									<td>{{ $v_order->product_name }}</td>
									<td>{{ $v_order->product_price }}</td>
                  <td>{{ $v_order->product_sales_quantity }}</td>
									<td>{{ $v_order->product_price*$v_order->product_sales_quantity }}</td>
								</tr>

								<?php
										$discount=DB::table('tbl_products')
												->select('tbl_products.discount','tbl_products.from_date','tbl_products.to_date')
												->where('tbl_products.product_id',$v_order->product_id)
												->first();

												$per_discount=$discount->discount;
												$current_date = new DateTime();
							          $from = new DateTime($discount->from_date);
							          $to  = new DateTime($discount->to_date);
							            if($current_date<$from || $current_date>$to){
														$per_discount=0;
													}

										$total_discount=$total_discount + $v_order->product_price*$v_order->product_sales_quantity*$per_discount/100;
								 ?>

                  @endforeach
							  </tbody>

								<tfoot>
									<tr>
										<td colspan="4"><strong>Total(Inc. VAT)</strong></td>
										<td><strong>{{ ceil($v_order->order_total + $v_order->order_total*$charges->vat/100 + $charges->delivery_charge - $total_discount) }} TK</strong></td>
									</tr>
								</tfoot>

                <tfoot>
                  <tr>
                    <td colspan="4"><strong>Order Total</strong></td>
                    <td><strong>{{ ceil($v_order->order_total) }} TK</strong></td>
                  </tr>
                </tfoot>

								<tfoot>
									<tr>
										<td colspan="4"><strong>VAT</strong></td>
										<td><strong>+{{ ceil($v_order->order_total*$charges->vat/100) }} TK</strong></td>
									</tr>
								</tfoot>

								<tfoot>
                  <tr>
                    <td colspan="4"><strong>Delivery Charge</strong></td>
                    <td><strong>+{{ $charges->delivery_charge }} TK</strong></td>
                  </tr>
                </tfoot>

								<tfoot>
                  <tr>
                    <td colspan="4"><strong>Discount</strong></td>
                    <td><strong>-{{ ceil($total_discount) }} TK</strong></td>
                  </tr>
                </tfoot>



						 </table>

					</div>
				</div><!--/span-->
			</div><!--/row-->

@endsection
