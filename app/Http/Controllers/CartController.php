<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $productID = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productID)->first();

        Cart::add([
            'id'        => $product_info->product_id,
            'name'      => $product_info->product_name,
            'qty'       => $quantity,
            'price'     => $product_info->product_price,
            'weight'    => 1,
            'options'   => ['image' => $product_info->product_image]
            ]);
        // dd();
        // dd($content);
            return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $content = cart::content();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('content',$content);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product);

    }
    public function update_cart(Request $request){
        $rowId= $request->rowId_cart;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
