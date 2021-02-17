@extends('layout')

@section('content')


  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="left-sidebar">

          <h2><a href="{{URL::to('/user_profile/'.Session::get('customer_id'))}}">Dashboard</a></h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->

      							<div class="panel panel-default">

      								<div class="panel-heading">
      									<h4 class="panel-title"><a href="{{URL::to('/edit_profile')}}">Edit Profile</a></h4>
                        <h4 class="panel-title"><a href="{{URL::to('/change_password')}}">Password</a></h4>
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
                  <p>Edit Profile</p>
                  <div class="form-one">

                    <?php
                        $customer_id=Session::get('customer_id');
                        $customer=DB::table('tbl_customer')
                                      ->select('tbl_customer.*')
                                      ->where('tbl_customer.customer_id',$customer_id)
                                      ->first();
                     ?>

                    <form action="{{url('/save_profile')}}" method="post">
                        {{ csrf_field() }}

                      <label>Name</label><input type="text" name="name" placeholder="Name *" value={{ $customer->customer_name }}>
                      <!-- <label>Email</label><input type="text" name="email" placeholder="Email*" value={{ $customer->customer_email }}> -->
                      <!-- <input type="text" name="shipping_last_name" placeholder="Last Name *"> -->
                      <label>Contact</label><input type="text" name="mobile_number" placeholder="Mobile Number *" value={{ $customer->mobile_number }}>
                      <?php if( $customer->address == NULL ){ ?>
                            <label>Address</label><input type="text" name="address" placeholder="Address *">
                      <?php } else{ ?>
                            <label>Address</label><input type="text" name="address" placeholder="Address *" value={{ $customer->address }}>
                      <?php } ?>
                      <?php if( $customer->city == NULL ){ ?>
                            <label>City</label><input type="text" name="city" placeholder="City">
                      <?php } else{ ?>
                            <label>City</label><input type="text" name="city" placeholder="City" value={{ $customer->city }}>
                      <?php } ?>
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


@endsection
