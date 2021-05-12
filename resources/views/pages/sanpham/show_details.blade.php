@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
            <h1>Chi tiết sản phẩm...</h1>
            <ul>
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li><a href="category_page.html">Sản phẩm</a></li>
                <li class="active">...</li>
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
        <div class="col-sm-8 col-lg-9 mtb_20">
            @foreach($product_details as $key => $value)
            <div class="row mt_10 ">
                <form action="{{URL::to('/save-cart')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="img_product"><a class="thumbnails"> <img data-name="product_image" src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt=""  /></a></div>
                        <div id="product-thumbnail" class="owl-carousel">
                            @foreach($product_images as $key => $img)
                            <div class="item">
                                <div class="image-additional" style="width=90px; height=90px"><a class="thumbnail" href="images/product/product3.jpg" data-fancybox="group1"> <img src="{{URL::to('public/uploads/product_img/'.$img->product_image_1)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="images/product/product3.jpg" data-fancybox="group1"> <img src="{{URL::to('public/uploads/product_img/'.$img->product_image_2)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="images/product/product3.jpg" data-fancybox="group1"> <img src="{{URL::to('public/uploads/product_img/'.$img->product_image_3)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="images/product/product3.jpg" data-fancybox="group1"> <img src="{{URL::to('public/uploads/product_img/'.$img->product_image_4)}}" alt="" /></a></div>
                              </div>
                            @endforeach

                          </div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb">
                            <h4 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$value->product_name}}</a></h4>
                            <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                            </div>
                                <span class="price mb_20"><span class="amount"><span class="currencySymbol" >Giá: </span>{{number_format($value->product_price).'VNĐ'}}</span>
                                </span>
                                <hr>
                                <ul class="list-unstyled product_info mtb_20">
                                <li>
                                    <label>Thương hiệu:</label>
                                    <span> <a href="#">{{$value->brand_name}}</a></span></li>
                                <li>
                                    <label>Danh mục:</label>
                                    <span>{{$value->category_name}}</span></li>
                                <li>
                                    <label>Mã ID sản phẩm:</label>
                                    <span> {{$value->product_id}}</span></li>
                                <li>
                                    <label>Tình trạng:</label>
                                    <span> Còn hàng</span></li>
                                </ul>
                                <hr>
                                <p class="product-desc mtb_30">Mô tả sp: {{$value->product_desc}}</p>
                                <div id="product">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="Sort-by col-md-6">
                                        <label>Chất liệu dây:</label>
                                        <select name="product_size" id="select-by-size" class="selectpicker form-control">
                                        <option>Dây da</option>
                                        <option>Dây cao su</option>
                                        </select>
                                    </div>
                                    <div class="Color col-md-6">
                                        <label>Kích thước mặt đồng hồ:</label>
                                        <select name="product_color" id="select-by-color" class="selectpicker form-control">
                                        <option>Women’s Mini (đồng hồ nữ – size nhỏ): 23mm – 25mm</option>
                                        <option>Women’s Regular (đồng hồ nữ – size thông thường): 26mm – 29mm</option>
                                        <option>Midsize – Unisex (nam hoặc nữ đều đeo được): 34mm – 36mm</option>
                                        <option>Men’s Regular (đồng hồ nam – size thông thường): 37mm – 39mm</option>
                                        <option>Men’s Sport (đồng hồ nam – size thể thao): 40mm – 42mm</option>
                                        <option>Men’s XL (đồng hồ nam – size lớn, rất lớn): 45mm</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="qty mt_30 form-group2">
                                    <label>Số lượng:</label>
                                    <input name="qty" min="1" value="1" type="number">
                                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}">
                                </div>
                                <div class="button-group mt_30">
                                    <button tyle="submit" class="add-to-cart"><span>Thêm giỏ hàng</span></button>
                                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div id="exTab5" class="mtb_30">
                <ul class="nav nav-tabs">
                    <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                    <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
                    <li><a href="#3c" data-toggle="tab">Solution</a> </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active pt_20" id="1c">
                    <p>{{$value->product_desc}}</p>
                    </div>
                    <div class="tab-pane" id="2c">
                    <form class="form-horizontal">
                        <div id="review"></div>
                        <h4 class="mt_20 mb_30">Write a review</h4>
                        <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-name">Your Name</label>
                            <input name="name" value="" id="input-name" class="form-control" type="text">
                        </div>
                        </div>
                        <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-review">Your Review</label>
                            <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                            <div class="help-block"><span class="text-danger">Note:</span> Đánh giá phải khách quan, đừng đánh bừa, tội shop !</div>
                        </div>
                        </div>
                        <div class="form-group required">
                        <div class="col-md-6">
                            <label class="control-label">Đánh giá: </label>
                            <div class="rates"><span>&nbsp; Không hài lòng</span>
                            <input name="rating" value="1" type="radio">
                            <input name="rating" value="2" type="radio">
                            <input name="rating" value="3" type="radio">
                            <input name="rating" value="4" type="radio">
                            <input name="rating" value="5" type="radio">
                            <span>Hài Lòng</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="buttons pull-right">
                            <button type="submit" class="btn btn-md btn-link">Gửi đánh giá</button>
                            </div>
                        </div>
                        <div class="fb-comments" data-href="{{$url_canonical}}" data-width="870" data-numposts="5"></div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane pt_20" id="3c">
                    <p>{{$value->product_content}}</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Sản phẩm liên quan</h2>
                </div>
                <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    @foreach($relate as $key => $lienquan)
                    <div class="item">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$lienquan->product_id)}}"> <img data-name="product_image" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" class="img-responsive"><img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{($lienquan->product_name)}}</a></h6>
                        <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                        </div>
                        <span class="price"><span class="amount"><span class="currencySymbol">Giá sản phẩm: </span>{{number_format($lienquan->product_price).'VNĐ'}}</span>
                        </span>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
                </div>
            </div>
            </div>
            @endforeach
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

