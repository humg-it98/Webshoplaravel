<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
        public function AuthLogin(){
            $admin_id = Session::get('admin_id');
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_product (){
            $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        }
        public function all_product(){
            $this->AuthLogin();
            $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')->get();
            $manager_product  = view('admin.all_product')->with('all_product',$all_product);
            return view('admin_layout')->with('admin.all_product', $manager_product);

        }
        public function save_product(Request $request){
            $this->AuthLogin();
            $data = array();

            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            $path = 'public/uploads/product/';

            if($get_image){

                $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'product_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'product_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]);
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->insert($data);
                Session::put('message','Thêm sản phẩm thành công');
                return Redirect::to('add-product');
            }
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        public function inactive_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
            Session::put('message','Khong kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }
        public function active_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
            Session::put('message','Kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }

        public function edit_product($product_id){
            $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
            $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
            return view('admin_layout')->with('admin.edit_product', $manager_product);
        }


        public function update_product(Request $request, $product_id){
            $this->AuthLogin();
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            if($get_image){
                        $get_name_image = $get_image->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                        $get_image->move('public/uploads/product',$new_image);
                        $data['product_image'] = $new_image;
                        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                        Session::put('message','Cập nhật sản phẩm thành công');
                        return Redirect::to('all-product');
            }
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }


        public function delete_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->delete();
            Session::put('message','Đã xóa sản phẩm thành công');
            return Redirect::to('all-product');
        }
        ///chi tiet sp
        public function details_product(Request $request, $product_id){
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $details_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_id',$product_id)->get();

            //seo
            $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
            $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
            $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
            $url_canonical = $request->url();
            //seo
            foreach($details_product  as $key =>$value){
            $category_id = $value-> category_id;
            }


            $related_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();


            return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }

}
