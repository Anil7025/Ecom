<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){


        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin'=>'1'])) {
                //echo 'success'; die;

                return redirect('/admin/dashboard');
            }else{
                //echo 'failed'; die;
                return redirect('admin_login')->with('flash_message_error','Invalid User or password');
            }
        }


    return view('admin.adminContent.admin_login');

    }

    public function dashboard(){

        return view('admin.adminContent.dashboard');
    }

    public function setting(){

        return view('admin.adminContent.settings');
    }

    public function checkPassword(Request $request){

        $data = $request>all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=> '1'])->first();
        if (Hash::check($current_password , $check_password->password)) {
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            $check_password = User::where(['email' => Auth::User()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password , $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('id', 1)->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password Update successfuly');
            }else{
                return redirect('/admin/settings')->with('flash_message_success','Incorrect current Password');
            }
        }
    }

    public function logout(){

        Session::flush();

        return redirect('admin_login')->with('flash_message_success','Logged Out successfuly');

    }
}
