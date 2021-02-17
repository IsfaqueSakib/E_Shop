<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Input;
use DB;
use Session;

class HomeController extends Controller
{

    public function index()
    {
      $all_published_product=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.publication_status',1)
                        ->limit(9)
                        ->get();
      $manage_published_product=view('pages.home_content')
              ->with('all_published_product',$all_published_product);

      return view('layout')
              ->with('pages.home_content',$manage_published_product);
        //return view('pages.home_content');
    }

    public function show_product_by_category($category_id)
    {
      $product_by_category=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_category.category_id',$category_id)
                        ->where('tbl_products.publication_status',1)
                        ->limit(18)
                        ->get();
      $manage_product_by_category=view('pages.product_by_category')
              ->with('product_by_category',$product_by_category);

      return view('layout')
              ->with('pages.product_by_category',$manage_product_by_category);
    }

    public function view_product_by_id($product_id)
    {
      $product_by_details=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.product_id',$product_id)
                        ->where('tbl_products.publication_status',1)
                        ->first();
      $manage_product_by_details=view('pages.product_details')
              ->with('product_by_details',$product_by_details);

      return view('layout')
              ->with('pages.product_details',$manage_product_by_details);
    }

    public function home_search()
    {
      $key=Input::get('search');
      if($key != ""){
        $all_published_product=DB::table('tbl_products')
                          ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                          ->select('tbl_products.*','tbl_category.category_name')
                          ->where('tbl_products.product_name', 'LIKE', '%' .$key. '%')
                          ->where('tbl_products.publication_status',1)
                          ->limit(9)
                          ->get();
        $manage_published_product=view('pages.home_content')
                ->with('all_published_product',$all_published_product);

        return view('layout')
                ->with('pages.home_content',$manage_published_product);
      }
    }

    public function user_profile($customer_id)
    {
      $user_info = DB::table('tbl_customer')
                        ->select('tbl_customer.*')
                        ->where('tbl_customer.customer_id',$customer_id)
                        ->first();

      $manage_user_profile = view('pages.user_profile')
                              ->with('user_info',$user_info);
      return view('layout')->with('pages.user_profile',$manage_user_profile);
    }

    public function edit_profile()
    {
      return view('pages.edit_profile');
    }

    public function save_profile(Request $request)
    {
      $customer_id = Session::get('customer_id');
      $data=array();
      $data['customer_name']=$request->name;
      $data['mobile_number']=$request->mobile_number;
      $data['address']=$request->address;
      $data['city']=$request->city;

      DB::table('tbl_customer')
          ->where('tbl_customer.customer_id',$customer_id)
          ->update($data);
      return Redirect::to('/user_profile/'.$customer_id);
    }

    public function change_password()
    {
      return view('pages.change_password');
    }

    public function save_password(Request $request)
    {
      $customer_id = Session::get('customer_id');
      $customer_password=md5($request->current_password);
      $result=DB::table('tbl_customer')
              ->where('customer_id',$customer_id)
              ->where('password',$customer_password)
              ->first();

      $data=array();
      $data['password']=md5($request->new_password);

      if($result){

        DB::table('tbl_customer')
                ->update($data);

        Session::put('message','Password changed successfully !!!');
        return Redirect::to('/change_password');
      }

      else{
        Session::put('message','Enter your current password correctly !!!');
        return Redirect::to('/change_password');
      }

    }

    public function filter_by_price()
    {
      $all_published_product=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.publication_status',1)
                        ->orderby('tbl_products.product_price','ASC')
                        ->limit(9)
                        ->get();
      $manage_published_product=view('pages.home_content')
              ->with('all_published_product',$all_published_product);

      return view('layout')
              ->with('pages.home_content',$manage_published_product);
    }

    public function filter_by_discount()
    {
      $all_published_product=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.publication_status',1)
                        ->orderby('tbl_products.discount','DESC')
                        ->limit(9)
                        ->get();
      $manage_published_product=view('pages.home_content')
              ->with('all_published_product',$all_published_product);

      return view('layout')
              ->with('pages.home_content',$manage_published_product);
    }

}
