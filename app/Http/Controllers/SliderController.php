<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class SliderController extends Controller
{
    public function index()
    {
      return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
      $data = array();
      $data['publication_status'] = $request->publication_status;
      $image = $request->file('slider_image');

      if($image){
          $image_name = str_random(20);
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$ext;
          $upload_path = 'slider/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);

          if($success){
            $data['slider_image'] = $image_url;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slider added successfully !!!');
            return Redirect::to('/addSlider');
          }

      }

      $data['slider_image'] = '';
      DB::table('tbl_slider')->insert($data);
      Session::put('message','Slider added successfully without image !!!');
      return Redirect::to('/addSlider');
    }

    public function all_slider()
    {
      $this->AdminAuthCheck();

        $all_slider=DB::table('tbl_slider')->get();
        $managslider=view('admin.all_slider')
                ->with('all_slider',$all_slider);

        return view('admin.admin_layout')
                ->with('admin.all_slider',$managslider);
    }

    public function inactive_slider($slider_id)
    {
      DB::table('tbl_slider')
          ->where('slider_id',$slider_id)
          ->update(['publication_status'=>0]);
      Session::put('message','Slider Inactivated Successfully !!!');
      return Redirect::to('/allSlider');
    }

    public function active_slider($slider_id)
    {
      DB::table('tbl_slider')
          ->where('slider_id',$slider_id)
          ->update(['publication_status'=>1]);
      Session::put('message','Slider Activated Successfully !!!');
      return Redirect::to('/allSlider');
    }

    public function delete_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();

        Session::put('message','Slider deleted Successfully !!!');
        return Redirect::to('/allSlider');
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

}
