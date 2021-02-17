@extends('layout')

@section('content')


  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <div class="left-sidebar">

          <h2><a href="{{URL::to('/user_profile/'.$user_info->customer_id)}}">Dashboard</a></h2>
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


      <div class="col-sm-9 padding-left">
        <div class="features_items"><!--features_items-->

          <div class="container col-sm-8">

            <div class="total_area">

              <ul>
                <li>Name <span>{{ $user_info->customer_name }}</span></li>
                <li>Email <span>{{ $user_info->customer_email }}</span></li>
                <li> Contact <span>{{ $user_info->mobile_number }}</span></li>
                <?php if( $user_info->address == NULL ) { ?>
                      <li> Address <span>---</span></li>
                <?php } else { ?>
                      <li> Address <span>{{ $user_info->address }}</span></li>
                <?php } ?>

                <?php if( $user_info->address == NULL ) { ?>
                      <li> City <span>---</span></li>
                <?php } else { ?>
                      <li> City <span>{{ $user_info->city }}</span></li>
                <?php } ?>

              </ul>

            </div>
            </div>
          </div>

            </div>
          </div>

      </div><!--features_items-->

      </div>


@endsection
