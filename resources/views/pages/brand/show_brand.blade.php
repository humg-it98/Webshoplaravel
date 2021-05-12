@extends("layout")
@section("content")

<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
                @foreach($brand_name as $key => $name)
                <h1>{{$name->brand_name}}</h1>
                <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">{{$name->brand_name}}</li>
                <li class="active">Search</li>
                </ul>
                @endforeach
            </div>
        </div>
            <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 ">
                <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                    <div class="nav-responsive">
                    <div class="heading-part">
                        <h2 class="main_title">Thương hiệu</h2>
                    </div>
                    @foreach($brand as $key => $cate)
                    <ul class="nav  main-navigation collapse in">
                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$cate->brand_id)}}">{{$cate->brand_name}}</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="filter left-sidebar-widget mb_50">
                <div class="heading-part mtb_20 ">
                <h2 class="main_title">Tùy chọn tìm kiếm</h2>
                </div>
                <div class="filter-block">
                <p>
                    <label for="amount">Tầm giá:</label>
                    <input type="text" id="amount" readonly="">
                </p>
                <div id="slider-range" class="mtb_20"></div>
                <div class="list-group">
                    <div class="list-group-item mb_10">
                    <label>Theo màu:</label>
                    <div id="filter-group1">
                        <div class="checkbox">
                        <label>
                            <input value="" type="checkbox"> Red (10)</label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input value="" type="checkbox"> Green (06)</label>
                        </div>
                        <div class="checkbox ">
                        <label>
                            <input value="" type="checkbox"> Blue(09)
                        </label>
                        </div>
                    </div>
                    </div>
                    <div class="list-group-item mb_10">
                    <label>Size</label>
                    <div id="filter-group3">
                        <div class="checkbox">
                        <label>
                            <input value="" type="checkbox"> Big (3)</label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input value="" type="checkbox"> Medium (2)</label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input value="" type="checkbox"> Small (1)</label>
                        </div>
                    </div>
                    </div>
                    <button type="button" class="btn">Refine Search</button>
                </div>
                </div>
            </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
            <div class="category-page-wrapper mb_30">
                <div class="list-grid-wrapper pull-left">
                <div class="btn-group btn-list-grid">
                    <button type="button" id="list-view" class="btn btn-default list-view active"></button>
                    <button type="button" id="grid-view" class="btn btn-default grid-view "></button>

                </div>
                </div>
                <div class="page-wrapper pull-right">
                <label class="control-label" for="input-limit">Show :</label>
                <div class="limit">
                    <select id="input-limit" class="form-control">
                    <option value="3" selected="selected">3</option>
                    <option value="5">5</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    </select>
                </div>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div>
                <div class="sort-wrapper pull-right">
                <label class="control-label" for="input-sort">Sort By :</label>
                <div class="sort-inner">
                    <select id="input-sort" class="form-control">
                    <option value="ASC" selected="selected">Default</option>
                    <option value="ASC">Name (A - Z)</option>
                    <option value="DESC">Name (Z - A)</option>
                    </select>
                </div>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_30 ">
                    @foreach($brand_by_id as $key => $product)
                <div class="item  col-xs-12 col-lg-12">
                    <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}"> <img data-name="product_image" src="{{URL::to("public/uploads/product/".$product->product_image)}}" alt="iPod Classic" title="" class="img-responsive"><img  src="{{URL::to("public/uploads/product/".$product->product_image)}}"></a>
                        <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                    </div>
                    <div class="caption product-detail text-center">
                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{($product->product_name)}}</a></h6>
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <span class="price"><span class="amount"><span class="currencySymbol">Giá: </span>{{number_format($product->product_price).' VNĐ'}}</span>
                        </span>
                        <p class="product-desc mt_20 mb_60">{{($product->product_desc)}}</p>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>

            </div>
{{-- //
              <div class="col-md-12">
                <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Sản phẩm theo thương hi</h2>
                </div>
                <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    @foreach($brand_by_id as $key => $product)
                    <div class="item">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}"> <img data-name="product_image" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" class="img-responsive"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{($product->product_name)}}</a></h6>
                        <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                        </div>
                        <span class="price"><span class="amount"><span class="currencySymbol">Giá sản phẩm: </span>{{number_format($product->product_price).'VNĐ'}}</span>
                        </span>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
                </div>
            </div>
    --}}
            <div class="pagination-nav text-center mt_50">
                <ul>
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            </div>
        </div>
    </div>

@endsection

