@extends('layout')
@extends('banner')
@section('content')

<div class="col-sm-12 mt_30">
 <div id="product-tab" class="mt_10">
    <div class="heading-part mb_10 ">
      <h2 class="main_title">Sản Phẩm</h2>
    </div>
    <ul class="nav text-right">
      <li class="active"> <a href="#nArrivals" data-toggle="tab">Sản phẩm mới nhất</a> </li>
      <li><a href="#Bestsellers" data-toggle="tab">Sản phẩm bán chạy</a> </li>
      <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
    </ul>
    <div class="tab-content clearfix box">
      <div class="tab-pane active" id="nArrivals">
        <div class="nArrivals owl-carousel">
        @foreach($all_product as $key => $product)
          <div class="product-grid">
            <div class="item">
              <div class="product-thumb">
                <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}"> <img data-name="product_image" src={{URL::to("public/uploads/product/".$product->product_image)}} height="220px" width="220px" alt="{{($product->product_name)}}" title="{{($product->product_name)}}" class="img-responsive"> <img src={{URL::to("public/uploads/product/".$product->product_image)}} height="220px" width="220px" alt="{{($product->product_name)}}" title="{{($product->product_name)}}" class="img-responsive"> </a>
                  <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>Thêm yêu thích</span></a></div>
                    <div class="quickview"><a href="#"><span>Chi tiết sản phẩm</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart"><a href="#"><span>Thêm giỏ hàng</span></a></div>
                  </div>
                </div>
                <div class="caption product-detail text-center">
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                  <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{($product->product_name)}}</a></h6>
                  <span class="price"><span class="amount"><span class="currencySymbol">Giá: </span>{{number_format($product->product_price).'VNĐ'}}</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="tab-pane" id="Bestsellers">
        <div class="Bestsellers owl-carousel">
          <div class="product-grid">
            <div class="item">
              <div class="product-thumb  mb_30">
                <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="public/frontend/images/product/product1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product1-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                  <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                    <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                  </div>
                </div>
                <div class="caption product-detail text-center">
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                  <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                  <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="Featured">
        <div class="Featured owl-carousel">
          <div class="product-grid">
            <div class="item">
              <div class="product-thumb  mb_30">
                <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="public/frontend/images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                  <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                    <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                  </div>
                </div>
                <div class="caption product-detail text-center">
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                  <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                  <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="cms_banner">
      <div class="col-xs-12 mt_60">
        <div id="subbanner4" class="sub-hover">
          <div class="sub-img"><a href="#"><img src="public/frontend/images/sub5.jpg" alt="Sub Banner5" class="img-responsive"></a></div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 mtb_10">
      <!-- =====  PRODUCT TAB  ===== -->
      <div class="mt_60">
        <div class="heading-part mb_10 ">
          <h2 class="main_title">Deals of the Week</h2>
        </div>
        <div class="latest_pro box">
          <div class="latest owl-carousel">
            <div class="product-grid">
              <div class="item">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="public/frontend/images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                    <div class="button-group text-center">
                      <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                      <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                      <div class="compare"><a href="#"><span>Compare</span></a></div>
                      <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                  </div>
                  <div class="caption product-detail text-center">
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
    <div class="col-sm-12 mtb_10">
      <!-- =====  Blog ===== -->
      <div id="Blog" class="mt_50">
        <div class="heading-part mb_10 ">
          <h2 class="main_title">Latest News</h2>
        </div>
        <div class="blog-contain box">
          <div class="blog owl-carousel ">
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="public/frontend/images/blog/blog_img_01.jpg" alt="themini"> </a>
                  <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="post-image-hover"> </div>
                  <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                      <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                      <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="public/frontend/images/blog/blog_img_02.jpg" alt="themini"> </a>
                  <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="post-image-hover"> </div>
                  <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                      <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                      <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="public/frontend/images/blog/blog_img_03.jpg" alt="themini"> </a>
                  <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="post-image-hover"> </div>
                  <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                      <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                      <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="public/frontend/images/blog/blog_img_04.jpg" alt="themini"> </a>
                  <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="post-image-hover"> </div>
                  <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                      <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                      <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- =====  Blog end ===== -->
      </div>
    </div>
  </div>
  <!-- =====  SUB BANNER END  ===== -->
  <div id="brand_carouse" class="ptb_60 text-center">
    <div class="type-01">
      <div class="heading-part mb_10 ">
        <h2 class="main_title">Đối tác liên kết</h2>
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

@endsection
