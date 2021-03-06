@extends('layout')
@section('content')

<section id="cart_items">
  <div class="container">
    <div class="register-req">
      <p>Please Fill Up This Form</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
      <div class="row">

        <div class="col-sm-12 clearfix">
          <div class="bill-to">
            <p>Shipping Details</p>
            <div class="form-one">

              <?php
                  $customer_id=Session::get('customer_id');
                  $customer=DB::table('tbl_customer')
                                ->select('tbl_customer.*')
                                ->where('tbl_customer.customer_id',$customer_id)
                                ->first();
               ?>

              <form action="{{url('/save_shipping_details')}}" method="post">
                  {{ csrf_field() }}

                <label>Name</label><input type="text" name="shipping_first_name" placeholder="First Name *" value={{ $customer->customer_name }}>
                <label>Email</label><input type="text" name="shipping_email" placeholder="Email*" value={{ $customer->customer_email }}>
                <label>Contact</label><input type="text" name="shipping_mobile_number" placeholder="Mobile Number *" value={{ $customer->mobile_number }}>
                <!-- <input type="text" name="shipping_last_name" placeholder="Last Name *"> -->
                <?php if( $customer->address == NULL ){ ?>
                      <label>Address</label><input type="text" name="shipping_address" placeholder="Address *">
                <?php } else{ ?>
                      <label>Address</label><input type="text" name="shipping_address" placeholder="Address *" value={{ $customer->address }}>
                <?php } ?>

                <?php if( $customer->city == NULL ){ ?>
                      <label>City</label><input type="text" name="shipping_city" placeholder="City">
                <?php } else{ ?>
                      <label>City</label><input type="text" name="shipping_city" placeholder="City" value={{ $customer->city }}>
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

@endsection
