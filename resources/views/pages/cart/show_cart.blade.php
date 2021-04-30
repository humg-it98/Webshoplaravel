@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
            <h1>Giỏ hàng mua sắm...</h1>
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
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
            </div>
            <div class="left-special left-sidebar-widget mb_50">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Thương hiệu</h2>
            </div>
                @foreach($brand as $key => $brand)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                </ul>
            @endforeach
            </div>
        </div>
        <div class="col-sm-12 col-lg-9 mtb_20">
            <form enctype="multipart/form-data" method="get" action="{{URL::to('/update-cart-quantity')}}">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">Hình ảnh sản phẩm</td>
                      <td class="text-left">Tên sản phẩm</td>
                      <td class="text-left">ID sản phẩm</td>
                      <td class="text-left">Số lượng</td>
                      <td class="text-right">Giá</td>
                      <td class="text-right">Thành tiền</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $content = Cart::content();
                    ?>
                    @foreach($content as $item)
                    <tr>
                      <td class="text-center"><a href="#"><img src="{{URL::to('public/uploads/product/'.$item->options->image)}}" height="80px" width="80px" alt=" {{$item->name}}" title=" {{$item->name}}"></a></td>
                      <td class="text-left"><a href="product.html"> {{$item->name}}</a></td>
                      <td class="text-left">{{$item->id}}</td>
                      <td class="text-left">
                        <form action="{{URL::to('/update-cart-quantity')}}" method="get">
                            {{ csrf_field() }}
                            <div style="max-width: 150px;" class="input-group btn-block">
                            <input type="text" class="form-control quantity" size="1" value={{$item->qty}} name="qty">
                            <input type="hidden" value="{{$item->rowId}}" name="rowId_cart" class="form-control">
                            <span class="input-group-btn">
                            <button class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update" ><i class="fa fa-refresh"></i></a></button>
                            {{-- <a  href="{{URL::to('/update-cart-quantity/'. $item->rowId)}}"> --}}
                            <button class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><a  href="{{URL::to('/delete-to-cart/'. $item->rowId)}}"><i class="fa fa-times-circle"></i></a></button>
                            </span></div>
                        </form>
                      </td>
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
                </table>
              </div>
            </form>
            <h3 class="mtb_10">Bạn muốn làm gì tiếp theo?</h3>
            <p>Chọn xem bạn có mã giảm giá hoặc điểm thưởng muốn sử dụng hay xem ước tính chi phí giao hàng.</p>
            <div class="panel-group mt_20" id="accordion">
              <div class="panel panel-default pull-left">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Sử dụng phiếu giảm giá <i class="fa fa-caret-down"></i></a></h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <label for="input-coupon" class="col-sm-4 control-label">Nhập mã giảm giá tại đây</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="input-coupon" placeholder="Nhập mã giảm giá" value="" name="coupon">
                      <span class="input-group-btn">
                    <input type="button" class="btn" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                    </span> </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default pull-left">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Sử dụng phiếu quà tặng <i class="fa fa-caret-down"></i></a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <label for="input-voucher" class="col-sm-4 control-label">Nhập mã quà tặng tại đây</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="input-voucher" placeholder="Nhập mã quà tặng" value="" name="voucher">
                      <span class="input-group-btn">
                    <input type="button" class="btn" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
                    </span> </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default pull-left">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Phí vận chuyển và &amp; Thuế <i class="fa fa-caret-down"></i></a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>Vui lòng điền thông tin người nhận hàng.</p>
                    <form class="form-horizontal">
                      <div class="form-group required">
                        <label for="input-country" class="col-sm-2 control-label">Thành phố</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="input-country" name="country_id">
                            <option value=""> - Chọn - </option>
                            <option value="244">Hà Nội</option>
                            <option value="1">Tp Hồ Chí Minh</option>
                            <option value="2">Đà Nẵng</option>
                            <option value="3">Thái Bình</option>

                          </select>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Quận/Huyện</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="input-zone" name="zone_id">
                            <option value=""> --- Chọn --- </option>
                            <option value="3513">Hai Bà Trưng</option>
                            <option value="3514">Hoàn Kiếm</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">Mã bưu chính:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="input-postcode" placeholder="Nhập mã bưu chính" value="" name="postcode">
                        </div>
                      </div>
                      <input type="button" class="btn pull-right" data-loading-text="Loading..." id="button-quote" value="Tính ">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-8">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Tạm tính:</strong></td>
                      <td class="text-right">{{Cart::subtotal().' '.'vnđ'}}</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Thuế (VAT):</strong></td>
                      <td class="text-right">0</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Tiền ship:</strong></td>
                      <td class="text-right">0</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total:</strong></td>
                      <td class="text-right">{{Cart::subtotal().' '.'vnđ'}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="{{URL::to('/trang-chu')}}">
              <input class="btn pull-left mt_30" type="submit" value="Tiếp tục mua sắm" />
            </form>
            <form action="{{URL::to('/login-checkout')}}">
              <input class="btn pull-right mt_30" type="submit" value="Thanh toán" />
            </form>
          </div>
        </div>
        <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
            <div class="heading-part mb_10 ">
            <h2 class="main_title">Đối tác liên kết:</h2>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                <div class="item text-center"> <a href="#"><img src={{asset("public/frontend/images/brand/brand1.png")}} alt="Disney" class="img-responsive" /></a> </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection

