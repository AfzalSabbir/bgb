<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Admin Dashboard 
    */
    public function index()
    {
      return view('backend.pages.index');
    }

    public function chart()
    {
    	return view('backend.pages.demo.chart');
    }

    public function form()
    {
    	return view('backend.pages.demo.form');
    }

    public function table()
    {
    	return view('backend.pages.demo.table');
    }


    /*
     * Change password form
    */
    public function chnagePasswordForm()
    {
        return view('backend.pages.changePasswordForm');
    }


    /*
    * Change password with matching old one
    */
    public function chnagePassword(Request $request)
    {
        $this->validate($request, [
          'old_password' => 'required',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required'
        ]);

        $admin = Auth::guard('admin')->user();

        if(Hash::check($request->old_password, $admin->password)){
          $admin->password = Hash::make($request->password);
          $admin->save();

          session()->flash('success', 'Password changed successfully');
          return back();
        }
        else{
          session()->flash('old_password', 'Old password does not match');
          return back();
        }
    }
}
