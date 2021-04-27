@extends("layout")
@section("content")

<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
                <h1>Tìm kiếm sản phẩm</h1>
                <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Products</li>
                <li class="active">Search</li>
                </ul>
            </div>
        </div>
            <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 ">
                <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                    <div class="nav-responsive">
                    <div class="heading-part">
                        <h2 class="main_title">Top category</h2>
                    </div>
                    <ul class="nav  main-navigation collapse in">
                        <li><a href="#">Appliances</a></li>
                        <li><a href="#">Mobile Phones</a></li>
                        <li><a href="#">Tablet PC &amp; Accessories</a></li>
                        <li><a href="#">Consumer Electronics</a></li>
                        <li><a href="#">Computers &amp; Networking</a></li>
                        <li><a href="#">Electrical &amp; Tools</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Bags &amp; Shoes</a></li>
                        <li><a href="#">Toys &amp; Hobbies</a></li>
                        <li><a href="#">Watches &amp; Jewelry</a></li>
                        <li><a href="#">Home &amp; Garden</a></li>
                        <li><a href="#">Health &amp; Beauty</a></li>
                        <li><a href="#">Outdoors &amp; Sports</a></li>
                    </ul>
                </div>
            </div>
            <div class="filter left-sidebar-widget mb_50">
                <div class="heading-part mtb_20 ">
                <h2 class="main_title">Refinr Search</h2>
                </div>
                <div class="filter-block">
                <p>
                    <label for="amount">Price range:</label>
                    <input type="text" id="amount" readonly="">
                </p>
                <div id="slider-range" class="mtb_20"></div>
                <div class="list-group">
                    <div class="list-group-item mb_10">
                    <label>Color</label>
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
                    <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                    <button type="button" id="list-view" class="btn btn-default list-view"></button>
                </div>
                </div>
                <div class="page-wrapper pull-right">
                <label class="control-label" for="input-limit">Show :</label>
                <div class="limit">
                    <select id="input-limit" class="form-control">
                    <option value="8" selected="selected">08</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
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
                    <option value="ASC">Price (Low &gt; High)</option>
                    <option value="DESC">Price (High &gt; Low)</option>
                    <option value="DESC">Rating (Highest)</option>
                    <option value="ASC">Rating (Lowest)</option>
                    <option value="ASC">Model (A - Z)</option>
                    <option value="DESC">Model (Z - A)</option>
                    </select>
                </div>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="product-layout product-grid col-md-4 col-xs-6 ">
                    @foreach($search_product as $key => $product)
                <div class="item">
                    <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="{{URL::to("public/uploads/product/".$product->product_image)}}" alt="iPod Classic" title="" class="img-responsive"></a>
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

