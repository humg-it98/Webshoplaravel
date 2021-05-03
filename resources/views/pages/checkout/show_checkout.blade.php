@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
   <div class="row ">
     <!-- =====  BANNER STRAT  ===== -->
     <div class="col-sm-12">
       <div class="breadcrumb ptb_20">
         <h1>Show-checkout</h1>
         <ul>
           <li><a href="index.html">Trang chủ</a></li>
           <li class="active">Show-checkout</li>
         </ul>
       </div>
     </div>
     <!-- =====  BREADCRUMB END===== -->
     <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
       <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
         <div class="nav-responsive">
           <div class="heading-part">
             <h2 class="main_title">Danh mục</h2>
           </div>
           @foreach($category as $key => $cate)
           <ul class="nav  main-navigation collapse in">
               <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
           </ul>
           @endforeach
         </div>
         <br>
       </div>
       <div class="left-special left-sidebar-widget mb_50">
         <div class="heading-part mb_20 ">
           <h2 class="main_title">Thương hiệu</h2>
       </div>
           @foreach($brand as $key => $brand)
           <ul class="nav nav-pills nav-stacked">
               <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
           </ul>
           @endforeach
       </div>
     </div>
     <div class="col-sm-8 col-lg-9 mtb_20">
       <div class="panel-group" id="accordion">
           <form class="form-horizontal" action="{{URL::to('/save-checkout-customer')}}" method="POST">
            {{ csrf_field() }}
                <div class="panel panel-default ">
                    <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Bước 1: Chi tiết giao hàng <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div id="shipping-new" >
                                <div class="form-group required">
                                <label for="input-shipping-firstname" class="col-sm-2 control-label">Tên khách hàng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-shipping-firstname" placeholder="Nhập tên người nhận hàng" value="" name="shipping_name">
                                </div>
                                </div>
                                <div class="form-group required">
                                <label for="input-shipping-address-1" class="col-sm-2 control-label">Email nhận hàng:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-shipping-address-1" placeholder="Nhập email người nhận hàng" value="" name="shipping_address">
                                </div>
                                </div>
                                <div class="form-group required">
                                <label for="input-shipping-address-1" class="col-sm-2 control-label">Số điện thoại người nhận:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-address-1" placeholder="Nhập số điện thoại người nhận hàng" value=""  name="shipping_email">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-shipping-address-1" class="col-sm-2 control-label">Địa chỉ người nhận hàng:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-shipping-address-1" placeholder="Nhập địa chỉ người nhận hàng" value="" name="shipping_phone">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-shipping-country" class="col-sm-2 control-label">Thành phố</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="input-shipping-country" name="country_id">
                                    <option value="" > - Please Select - </option>
                                    <option selected="secleted" value="1">Hà Nội</option>
                                    <option value="2">TP Hồ Chí Minh</option>
                                </select>
                                </div>
                            </div>
                                <div class="form-group required">
                                <label for="input-shipping-country" class="col-sm-2 control-label">Quận,huyện</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="input-shipping-country" name="country_id">
                                    <option value=""> -- Please Select -- </option>
                                    <option value="1">Hoàn Kiếm</option>
                                    <option value="2">Hai Bà Trưng</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group required">
                                <label for="input-shipping-zone" class="col-sm-2 control-label">Phường, xã</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="input-shipping-zone" name="zone_id">
                                    <option value=""> --- Please Select --- </option>
                                    <option value="3121">Hàng trống</option>
                                    <option value="3122">Hàng Bè</option>
                                    </select>
                                </div>
                                </div>
                                <p><strong>Ghi chú thêm về đơn hàng</strong></p>
                                <p>
                                <textarea style="border-radius:10px" class="form-control" rows="10" name="shipping_note"></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">Bước 2: Phương thức giao hàng <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapsefour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Vui lòng chọn nhà cung cấp vận chuyển.</p>
                        <p><strong>Chọn</strong></p>
                        <div class="radio">
                        <label>
                            <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Giao hàng bưu điện VNPost</label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Giao hàng tiết kiệm</label>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">Bước 3: Xác nhận lại đơn hàng <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-left">Tên sản phẩm</td>
                                    <td class="text-left">ID sản phẩm</td>
                                    <td class="text-left">Số lượng</td>
                                    <td class="text-center">Giá</td>
                                    <td class="text-center">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $content = Cart::content();
                                ?>
                            @foreach($content as $item)
                                <tr>
                                    <td class="text-left"><a href="product.html"> {{$item->name}}</a></td>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td class="text-center">{{$item->qty}}</td>
                                    <td class="text-right">{{number_format($item->price).' VNĐ'}}</td>
                                    <td class="text-right">
                                        <?php
                                            $subtotal= $item->price * $item->qty;
                                            echo number_format($subtotal).' VNĐ';
                                        ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <td class="text-right" colspan="4"><strong>Tạm tính:</strong></td>
                                <td class="text-right">{{Cart::subtotal().' '.'vnđ'}}</td>
                                </tr>
                                <tr>
                                <td class="text-right" colspan="4"><strong>Tiền thuế:</strong></td>
                                <td class="text-right">0</td>
                                </tr>
                                <tr>
                                <td class="text-right" colspan="4"><strong>Tổng:</strong></td>
                                <td class="text-right">{{Cart::subtotal().' '.'vnđ'}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                        <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" data-loading-text="Loading..." name="send-order" class="btn" id="button-confirm" value="Xác nhận thanh toán">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
           </form>
       </div>
     </div>
   </div>
   <div id="brand_carouse" class="ptb_30 text-center">
     <div class="type-01">
       <div class="heading-part mb_20 ">
         <h2 class="main_title">Đối tác liên kết</h2>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <div class="brand owl-carousel ptb_20">
             <div class="item text-center"> <a href="#"><img src="public/frontend/images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
             <div class="item text-center"> <a href="#"><img src="public/frontend/images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- =====  CONTAINER END  ===== -->

@endsection

