<?php

namespace App\Http\Controllers;

use App\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Login; //sử dụng model Login
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Validator;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin_layout');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();


        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return view('admin.dashboard');
        }else
        {
            Session::put('message','Tai khoan hoac mat khẩu bi sai, vui lòng kiểm tra lai');
            return Redirect::to('/admin');
        }
    }
    public function logout(){

        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');

    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            return redirect('/admin-dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_login',$account_name->admin_name);
             Session::put('admin_id',$account_name->admin_id);
            return redirect('/admin-dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }
    public function customer_register(Request $request){

        $data = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_address' => 'required',
            'customer_phone' => 'required',
           'g-recaptcha-response' => new Captcha(), 		//dòng kiểm tra Captcha
        ]);

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];

        $customer->customer_email = $data['customer_email'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_address = $data['customer_address'];
        $customer->customer_password = md5($data['customer_password']);
        $customer->customer_date = now();
        $customer->save();

        return redirect('/dang-nhap')->with('message', 'Đăng ký tài khoản thành công,làm ơn đăng nhập');
    }


}
