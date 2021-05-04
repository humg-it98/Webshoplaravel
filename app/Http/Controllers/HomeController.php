<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        //seo
        $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
        $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
        $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
        $url_canonical = $request->url();
        //

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(10)->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function search(Request $request){
        $keyword = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
