<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use Session;

class DeliveryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function delivery(Request $request){
        $this->AuthLogin();
        $city = City::orderby('matp','ASC')->get();
        $province = DB::table('tbl_quanhuyen')
        ->join('tbl_tinhthanhpho','tbl_quanhuyen.matp','=','tbl_tinhthanhpho.matp')
        ->where('tbl_quanhuyen.matp',$city)
        ->get();
        // $wards = DB::table('tbl_xaphuongthitran')
        // ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_xaphuongthitran.maqh')
        // ->where('tbl_xaphuongthitran.maqh',$province)
        // ->get();
        return view('admin.delivery.add_delivery')->with(compact('city'))->with('province',$province);
    }
}
