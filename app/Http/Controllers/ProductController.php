<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
      return view('admin.add_product');
    }

    public function save_product(Request $request){

        $data = array();

        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['discount'] = $request->discount;
        $data['from_date'] = $request->from_date;
        $data['to_date'] = $request->to_date;
        $data['publication_status'] = $request->publication_status;
        $image = $request->file('product_image');

        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if($success){
              $data['product_image'] = $image_url;
              DB::table('tbl_products')->insert($data);
              Session::put('message','Product added successfully !!!');
              return Redirect::to('/addProduct');
            }

        }

        $data['product_image'] = '';
        DB::table('tbl_products')->insert($data);
        Session::put('message','Product added successfully !!!');
        return Redirect::to('/addProduct');
    }

    public function all_product(){
        $this->AdminAuthCheck();

      $all_product_info=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->get();
      $manage_product=view('admin.all_product')
              ->with('all_product_info',$all_product_info);

      return view('admin.admin_layout')
              ->with('admin.all_product',$manage_product);

    }

    public function inactive_product($product_id)
    {
      DB::table('tbl_products')
          ->where('product_id',$product_id)
          ->update(['publication_status'=>0]);
      Session::put('message','Product Deactivated Successfully !!!');
      return Redirect::to('/allProduct');
    }

    public function active_product($product_id)
    {
      DB::table('tbl_products')
          ->where('product_id',$product_id)
          ->update(['publication_status'=>1]);
      Session::put('message','Product Activated Successfully !!!');
      return Redirect::to('/allProduct');
    }

    public function edit_product($product_id)
    {
      $this->AdminAuthCheck();
        $product_info=DB::table('tbl_products')
                        ->where('product_id',$product_id)
                        ->first();

        $manage_product=view('admin.edit_product')
                        ->with('product_info',$product_info);

        return view('admin.admin_layout')
                    ->with('admin.edit_product',$manage_product);
    }

    public function update_product(Request $request,$product_id)
    {
      $this->AdminAuthCheck();

      $data = array();

      $data['product_name'] = $request->product_name;
      $data['category_id'] = $request->category_id;
      $data['product_short_description'] = $request->product_short_description;
      $data['product_long_description'] = $request->product_long_description;
      $data['product_price'] = $request->product_price;
      $data['product_size'] = $request->product_size;
      $data['product_color'] = $request->product_color;
      $data['discount'] = $request->discount;
      $data['from_date'] = $request->from_date;
      $data['to_date'] = $request->to_date;
      $data['publication_status'] = $request->publication_status;
      $image = $request->file('product_image');

      if($image){
          $image_name = str_random(20);
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$ext;
          $upload_path = 'image/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);

          if($success){
            $data['product_image'] = $image_url;
            DB::table('tbl_products')
                ->where('tbl_products.product_id',$product_id)
                ->update($data);
            Session::put('message','Product added successfully !!!');
            return Redirect::to('/allProduct');
          }

      }

      $data['product_image'] = '';
      DB::table('tbl_products')
          ->where('tbl_products.product_id',$product_id)
          ->update($data);
      Session::put('message','Product updated successfully !!!');
      return Redirect::to('/allProduct');

    }

    public function delete_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();

        Session::put('message','Product deleted Successfully !!!');
        return Redirect::to('/allProduct');
    }

    public function AdminAuthCheck()
    {
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }
      else{
        return Redirect::to('/admin')->send();
      }
    }

    public function admin_allProduct_search()
    {
      $key=Input::get('search');

      $all_product_info=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.product_name', 'LIKE', '%' .$key. '%')
                        ->get();
      $manage_product=view('admin.all_product')
              ->with('all_product_info',$all_product_info);

      return view('admin.admin_layout')
              ->with('admin.all_product',$manage_product);
    }

    public function filter_by_category($category_id)
    {
      $all_product_info=DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->where('tbl_products.category_id',$category_id)
                        ->get();
      $manage_product=view('admin.all_product')
              ->with('all_product_info',$all_product_info);

      return view('admin.admin_layout')
              ->with('admin.all_product',$manage_product);

    }


}
