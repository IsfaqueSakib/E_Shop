@extends('layout')
@section('content')

<section>

      <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
          <div class="col-sm-5">
            <div class="view-product">
              <img src="{{URL::to($product_by_details->product_image)}}" alt="" />
              <h3>ZOOM</h3>
            </div>


          </div>
          <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
              <img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
              <h2>{{$product_by_details->product_name}}</h2>
              <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
              <span>
                <span>{{ $product_by_details->product_price }} TK</span>
                <form action="{{ url('/add_to_cart') }}" method="post">
                  {{ csrf_field() }}
                <label>Quantity:</label>
                <input type="text" name="qty" value="1" />{{$product_by_details->product_size}}
                <input type="hidden" name="product_id" value="{{ $product_by_details->product_id }}">
                <button type="submit" class="btn btn-fefault cart">
                  <i class="fa fa-shopping-cart"></i>
                  Add to cart
                </button>
              </form>
              </span>
              <p><b>Availability:</b> In Stock</p>

            </div><!--/product-information-->
          </div>
        </div><!--/product-details-->
      </div>
</section>

@endsection
