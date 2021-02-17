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
                  <p>
                      <h4>{{ Session::get('message') }}</h4>
                  </p>
                  <p>Change Password</p>
                  <div class="form-one">

                    <form action="{{url('/save_password')}}" method="post">
                        {{ csrf_field() }}

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


@endsection
