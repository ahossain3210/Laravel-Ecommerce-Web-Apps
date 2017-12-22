<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->

    <!-- Mirrored from inthe7heaven.com/flatastic-html/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 17 Jun 2014 17:30:41 GMT -->
    <head>
        <title>@yield('title') | Shopin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!--meta info-->
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!--<link rel="icon" href="/favicon.ico" type="image/x-icon">-->
        <link rel="icon" type="image/ico" href="{{URL::to('public/assets/images/favicon.ico')}}">
        <!--stylesheet include-->
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/colorpicker.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/jquery.fancybox-1.3.4.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/camera.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/myStyle.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/owl.transitions.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/jquery.custom-scrollbar.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('public/assets/css/style.css')}}">
        <!--font include-->
        <link href="{{URL::to('public/assets/css/font-awesome.min.css')}}" rel="stylesheet">

        <script src="{{URL::to('public/assets/js/country.js')}}"></script>





    </head>
    <body>

        <!--boxed layout-->
        <div class="boxed_layout relative w_xs_auto">
            <!--[if (lt IE 9) | IE 9]>
                    <div style="background:#fff;padding:8px 0 10px;">
                    <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
            <![endif]-->
            <!--markup header-->
            <header role="banner">
                <!--header top part-->
                <section class="h_top_part">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-5 t_xs_align_c">
                                <?php
                                $customer_id = Session::get('customer_id');
                                ?>
                                @if($customer_id!=NULL)
                                <p class="f_size_small">Welcome <span class="color_green"><b>{{Session::get('customer_name')}}</b></span> | <a href="{{URL::to('/customer-logout')}}">Logout</a> </p>
                                @else
                                <p class="f_size_small"><a href="{{URL::to('/checkout')}}" data-popup="#login_popup">Log In</a> | <a href="{{URL::to('/checkout')}}#tab-2">Create an Account</a> </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-2 t_align_c t_xs_align_c">
                                <p class="f_size_small"><i class="fa fa-mobile"></i> <b class="color_dark">+88-01672-505856</b></p>
                            </div>
                            <nav class="col-lg-4 col-md-4 col-sm-5 t_align_r t_xs_align_c">
                                <ul class="d_inline_b horizontal_list clearfix f_size_small users_nav">
                                    <li><a href="{{URL::to('/order-list')}}" class="default_t_color">Orders List</a></li>
                                    <li><a href="{{URL::to('/wishlist')}}" class="default_t_color">Wishlist</a></li>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $billing_id = Session::get('billing_id');
                                    if ($customer_id != NULL && $billing_id == NULL) {
                                        ?>
                                        <li><a href="{{URL::to('/billing')}}" class="default_t_color">Checkout</a></li>
                                    <?php } else if ($customer_id != NULL && $billing_id != NULL) { ?>
                                        <li><a href="{{URL::to('/payment')}}" class="default_t_color">Checkout</a></li>
                                    <?php } else { ?>
                                        <li><a href="{{URL::to('/checkout')}}" class="default_t_color">Checkout</a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!--header bottom part-->
                <section class="h_bot_part container">
                    <div class="clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">
                            <a href="{{URL::to('/')}}" class="logo m_xs_bottom_15 d_xs_inline_b">
                                <img src="{{URL::to('public/assets/images/logo.png')}}" width="240px;" height="40px" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 t_align_r t_xs_align_c">
                            <ul class="d_inline_b horizontal_list clearfix t_align_l site_settings">
                                <!--like-->
                                <li>
                                    <a role="button" href="{{URL::to('/wishlist')}}" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none" title="Wishlist"><i class="fa fa-heart-o f_size_ex_large"></i><span class="count circle t_align_c">{{Cart::count()}}</span></a>
                                </li>
                                <!--language settings-->
                                <li class="m_left_5 relative container3d">
                                    <a role="button" href="#" class="button_type_2 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none" id="lang_button"><img class="d_inline_middle m_right_10 m_mxs_right_0" src="{{URL::to('public/assets/')}}images/flag_en.jpg" alt=""><span class="d_mxs_none">English</span></a>
                                    <ul class="dropdown_list top_arrow color_light">
                                        <li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="{{URL::to('public/assets/images/flag_en.jpg')}}" alt="">English</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="{{URL::to('public/assets/images/flag_fr.jpg')}}" alt="">French</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="{{URL::to('public/assets/images/flag_g.jpg')}}" alt="">German</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="{{URL::to('public/assets/images/flag_i.jpg')}}" alt="">Italian</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="{{URL::to('public/assets/images/flag_s.jpg')}}" alt="">Spanish</a></li>
                                    </ul>
                                </li>
                                <!--currency settings-->
                                <li class="m_left_5 relative container3d">
                                    <a role="button" href="#" class="button_type_2 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none" id="currency_button"><span class="scheme_color">$</span> <span class="d_mxs_none">US Dollar</span></a>
                                    <ul class="dropdown_list top_arrow color_light">
                                        <li><a href="#" class="tr_delay_hover color_light"><span class="scheme_color">$</span> US Dollar</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><span class="scheme_color">&#8364;</span> Euro</a></li>
                                        <li><a href="#" class="tr_delay_hover color_light"><span class="scheme_color">&#163;</span> Pound</a></li>
                                    </ul>
                                </li>
                                <!--shopping cart-->
                                <li class="m_left_5 relative container3d" id="shopping_button">
                                    <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
                                        <span class="d_inline_middle shop_icon m_mxs_right_0">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="count tr_delay_hover type_2 circle t_align_c">{{Cart::count()}}</span>
                                        </span>
                                        <b class="d_mxs_none">Tk.{{Cart::total()}}</b>
                                    </a>
                                    <div class="shopping_cart top_arrow tr_all_hover r_corners">
                                        <div class="f_size_medium sc_header">Recently added item(s)</div>
                                        <ul class="products_list">
<?php
$contents = Cart::content();
foreach ($contents as $v_content) {
    ?>
                                                <li>
                                                    <div class="clearfix">
                                                        <!--product image-->
                                                        <img class="f_left m_right_10" src="{{URL::to($v_content->options['image'])}}" width="14%" alt="">
                                                        <!--product description-->
                                                        <div class="f_left product_description">
                                                            <a href="#" class="color_dark m_bottom_5 d_block">{{$v_content->name}}</a>
                                                            <!--<span class="f_size_medium">Product Code PS34</span>-->
                                                        </div>
                                                        <!--product price-->
                                                        <div class="f_left f_size_medium">
                                                            <div class="clearfix">
                                                                {{$v_content->qty}} x <b class="color_dark">Tk. {{$v_content->price}}</b>
                                                            </div>
                                                            <a href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><button class="close_product color_dark tr_hover"><i class="fa fa-times"> </i></button></a>
                                                        </div>
                                                    </div>
                                                </li>
<?php } ?>
                                        </ul>
                                        <!--total price-->
                                        <ul class="total_price bg_light_color_1 t_align_r color_dark">
                                            <li class="m_bottom_10">Shipment Fee : 
                                                <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                                                    <?php 
                                                    $shipment_fee=100;
                                                    echo 'Tk. '.$shipment_fee;
                                                    ?>
                                                </span></li>
                                                        <li class="m_bottom_10">Discount (10%) :
                                                            <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                                                                <?php 
                                                                $total=Cart::total();
                                                                $discount=(10*$total)/100;
                                                                echo 'Tk. '.$discount;
                                                                ?>
                                                            </span></li>
                                            <li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">Tk. <?php echo ($total+$shipment_fee)-$discount;?></b></li>
                                        </ul>
                                        <div class="sc_footer t_align_c">
                                            <a href="{{URL::to('/view-cart')}}" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>
<?php
$customer_id = Session::get('customer_id');
$billing_id = Session::get('billing_id');
if ($customer_id != NULL && $billing_id == NULL) {
    ?>
                                                <a href="{{URL::to('/billing')}}" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
                                            <?php } else if ($customer_id != NULL && $billing_id != NULL) { ?>
                                                <a href="{{URL::to('/payment')}}" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
                                            <?php } else { ?>
                                                <a href="{{URL::to('/checkout')}}" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <!--main menu container-->
                <section class="menu_wrap relative" id="mainMenu">
                    <div class="container clearfix">
                        <!--button for responsive menu-->
                        <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_10">
                            <span class="centered_db r_corners"></span>
                            <span class="centered_db r_corners"></span>
                            <span class="centered_db r_corners"></span>
                        </button>
                        <!--main menu-->
                        <nav role="navigation" class="f_left f_xs_none d_xs_none">	
                            <ul class="horizontal_list main_menu clearfix">
                                <li class="relative f_xs_none m_xs_bottom_5">
                                    <a href="{{URL::to('/')}}" class="tr_delay_hover color_light tt_uppercase"><b>Home</b></a>
                                </li>
                                <li class="relative f_xs_none m_xs_bottom_5">
                                    <a href="{{URL::to('/all-products')}}" class="tr_delay_hover color_light tt_uppercase"><b>All Products</b></a>
                                </li>
<?php
$all_publish_category = DB::table('tbl_category')
        ->where('publication_status', 1)
        ->get();
foreach ($all_publish_category as $v_category) {
    ?>
                                    <li class="relative f_xs_none m_xs_bottom_5"><a href="{{URL::to('/category-product/'.$v_category->category_id)}}" class="tr_delay_hover color_light tt_uppercase"><b>{{$v_category->category_name}} <i class="fa fa-angle-down"></i></b></a>
                                        <!--sub menu-->
                                        <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                                    <?php
                                    $category_id = $v_category->category_id;
                                    $sub_category_info = DB::table('tbl_sub_category')
                                            ->where('publication_status', 1)
                                            ->where('category_id', $category_id)
                                            ->get();
                                    ?>
                                            @foreach($sub_category_info as $v_category)
                                            <div class="f_left f_xs_none">
                                                <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">{{$v_category->name}}</b>
                                                <ul class="sub_menu first">
                                            <?php
                                            $sub_category_id = $v_category->id;
                                            $nested_category_info = DB::table('tbl_nested_category')
                                                    ->where('publication_status', 1)
                                                    ->where('sub_category_id', $sub_category_id)
                                                    ->get();
                                            foreach ($nested_category_info as $v_nested) {
//                                                            echo"</pre>";
//                                                            print_r($v_catogory);
//                                                            exit();
                                                ?>
                                                        <li><a href="{{URL::to('/nested-category-product/'.$v_nested->nested_category_id)}}" class="color_dark tr_delay_hover"><?php echo $v_nested->nested_category_name; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </li>
                                                <?php } ?>

                                <li class="relative f_xs_none m_xs_bottom_5">
                                    <a href="{{URL::to('/contact')}}" class="tr_delay_hover color_light tt_uppercase"><b>Contact</b></a>
                                </li>
                            </ul>
                        </nav>
                        <button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!--search form-->
                    <div class="searchform_wrap tf_xs_none tr_all_hover">
                        <div class="container vc_child h_inherit relative">
                            {!! Form::open(['url'=>'/search-product','method'=>'post']) !!}
                            <input role='search' type="text" style="height: 51px; border: none;" name="search_item" placeholder="Type and hit enter" class=" full_width f_size_large scheme_color">
                            {!! Form::close () !!}</form>
                            <button class="close_search_form tr_all_hover d_xs_none color_dark">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </section>
            </header>
            <!--slider-->
            @yield('slider')
            <!--content-->
            <div class="page_content_offset">
                <div class="container">
                    @yield('content')
                    <!--product brands-->
                    @yield('product_brand')
                    <!-- Add -->
                    @yield('add')
                    <!--blog-->
                    @yield('from_the_blog')
                    <!--banners-->
                    @yield('adds')
                </div>
            </div>
            <!--markup footer-->
            <footer id="footer">
                <div class="footer_top_part">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                                <h3 class="color_light_2 m_bottom_20">About</h3>
                                <p class="m_bottom_25">Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac, scelerisque.</p>
                                <!--social icons-->
                                <ul class="clearfix horizontal_list social_icons">
                                    <li class="facebook m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Facebook</span>
                                        <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Twitter</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="google_plus m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Google Plus</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="rss m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Rss</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-rss"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Pinterest</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="instagram m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Instagram</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="linkedin m_bottom_5 m_sm_left_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">LinkedIn</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="vimeo m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Vimeo</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-vimeo-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Youtube</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                    <li class="flickr m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Flickr</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-flickr"></i>
                                        </a>
                                    </li>
                                    <li class="envelope m_left_5 m_bottom_5 relative">
                                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Contact Us</span>
                                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                                <h3 class="color_light_2 m_bottom_20">The Services</h3>
                                <ul class="vertical_list">
                                    <li><a class="color_light tr_delay_hover" href="#">About us<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/new-collection')}}">New collection<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="#">Best sellers<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/men-collection')}}">Men's collection<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/women-collection')}}">Women's collection<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/featured-product')}}">Featured products<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                                <h3 class="color_light_2 m_bottom_20">Information</h3>
                                <ul class="vertical_list">
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/checkout')}}">My account<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/wishlist')}}">Wishlist<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/order-list')}}">Order history<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="{{URL::to('/manufacturers')}}">Manufacturers<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="#">Privacy policy<i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="color_light tr_delay_hover" href="#">Terms &amp; condition<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h3 class="color_light_2 m_bottom_20">Newsletter</h3>
                                <p class="f_size_medium m_bottom_15">Sign up to our newsletter and get exclusive deals you won't find anywhere else straight to your inbox!</p>
                                {!! Form::open(['url'=>'/save-customer','method'=>'post']) !!}
                                <input type="text" name="customer_name" placeholder="Your name" class="m_bottom_20 r_corners f_size_medium full_width" required="">
                                <input type="email" name="customer_email" placeholder="Your email address" class="m_bottom_20 r_corners f_size_medium full_width" required="">
                                <input type="password" name="customer_password" placeholder="Confirm password" class="m_bottom_20 r_corners f_size_medium full_width" required="">
                                <button type="submit" class="button_type_8 r_corners bg_scheme_color color_light tr_all_hover">Subscribe</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!--copyright part-->
                <div class="footer_bottom_part">
                    <div class="container clearfix t_mxs_align_c">
                        <p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2017 <span class="color_light">Shopin</span>. All Rights Reserved.</p>
                        <ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
                            <li><img src="{{URL::to('public/assets/images/payment_img_1.png')}}" alt=""></li>
                            <li class="m_left_5"><img src="{{URL::to('public/assets/images/payment_img_2.png')}}" alt=""></li>
                            <li class="m_left_5"><img src="{{URL::to('public/assets/images/payment_img_3.png')}}" alt=""></li>
                            <li class="m_left_5"><img src="{{URL::to('public/assets/images/payment_img_4.png')}}" alt=""></li>
                            <li class="m_left_5"><img src="{{URL::to('public/assets/images/payment_img_5.png')}}" alt=""></li>
                        </ul>
                    </div>
                    <button class="t_align_c r_corners tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-double-up"></i></button>
                </div>
            </footer>
        </div>
        <!--social widgets-->

        <ul class="social_widgets d_xs_none">
            <!--facebook-->
            <li class="relative">
                <button class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20"><b>Join Us on Facebook</b></h3>
                    <!--<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=235&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=438889712801266" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>-->
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fitxpertsbd%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
            </li>
            <!--contact form-->
            <li class="relative">
                <button class="sw_button t_align_c contact"><i class="fa fa-envelope-o"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">Contact Us</h3>
                    <p class="f_size_medium m_bottom_15">Always Stay Connected With Our Largest Community</p>
                    {!! Form::open(['url'=>'/save-message','method'=>'post']) !!}
                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="c_name" placeholder="Your name" required="">
                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="c_email" placeholder="Email" required="">
                        <textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="c_message" required=""></textarea>
                        <button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>
                    {!! Form::close() !!}
                </div>	
            </li>
            <!--contact info-->
            <li class="relative">
                <button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">E-Shopper Location</h3>
                    <ul class="c_info_list">
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_15">
                                <i class="fa fa-map-marker f_left color_dark"></i>
                                <p class="contact_e">Bashundhara Shopping Complex<br>Level #01 (Block-A),<br>Panthopath, Dhaka-1215</p>
                            </div>
                            <!--<iframe class="r_corners full_width" id="gmap_mini" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=Manhattan,+New+York,+NY,+United+States&amp;aq=0&amp;oq=monheten&amp;sll=37.0625,-95.677068&amp;sspn=65.430355,129.814453&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%9C%D0%B0%D0%BD%D1%85%D1%8D%D1%82%D1%82%D0%B5%D0%BD,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E+%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA&amp;ll=40.790278,-73.959722&amp;spn=0.015612,0.031693&amp;z=13&amp;output=embed"></iframe>-->
                            <iframe class="r_corners full_width" id="gmap_mini" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.894847422034!2d90.38866281426533!3d23.751128884589004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bcd681372b%3A0x5c2b8755e4327004!2sBashundhara+City+Shopping+Complex!5e0!3m2!1sen!2sin!4v1505754299231" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-phone f_left color_dark"></i>
                                <p class="contact_e">800-559-65-80</p>
                            </div>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-envelope f_left color_dark"></i>
                                <a class="contact_e default_t_color" href="mailto:#">info@companyname.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="clearfix">
                                <i class="fa fa-clock-o f_left color_dark"></i>
                                <p class="contact_e">Monday - Friday: 08.00-20.00 <br>Saturday: 09.00-15.00<br> Sunday: closed</p>
                            </div>
                        </li>
                    </ul>
                </div>	
            </li>
        </ul>
        <!--login popup-->
        <div class="popup_wrap d_none" id="login_popup">
            <section class="popup r_corners shadow">
                <button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
                <h3 class="m_bottom_20 color_dark">Log In</h3>
                {!! Form::open(['url'=>'/customer-login-check','method'=>'post']) !!}
                    <ul>
                        <li class="m_bottom_15">
                            <label for="username" class="m_bottom_5 d_inline_b">Username</label><br>
                            <input type="text" name="customer_email" id="username" class="r_corners full_width">
                        </li>
                        <li class="m_bottom_25">
                            <label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
                            <input type="password" name="customer_password" id="password" class="r_corners full_width">
                        </li>
                        <li class="m_bottom_15">
                            <input type="checkbox" class="d_none" id="checkbox_10"><label for="checkbox_10">Remember me</label>
                        </li>
                        <li class="clearfix m_bottom_30">
                            <button class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Log In</button>
                            <div class="f_right f_size_medium f_mxs_none">
                                <a href="#" class="color_dark">Forgot your password?</a><br>
                                <a href="#" class="color_dark">Forgot your username?</a>
                            </div>
                        </li>
                    </ul>
                {!! Form::close() !!}
                <footer class="bg_light_color_1 t_mxs_align_c">
                    <h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New Customer?</h3>
                    <a href="{{URL::to('/checkout')}}#tab-2" role="button" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a>
                </footer>
            </section>
        </div>
        <!--custom popup-->
        <div class="popup_wrap d_none" id="#quick_view_product">
            <section class="popup r_corners shadow">
                <button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
                <div class="clearfix">
                    <div class="custom_scrollbar">
                        <!--left popup column-->
                        <div class="f_left half_column">
                            <div class="relative d_inline_b m_bottom_10 qv_preview">
                                <span class="hot_stripe"><img src="{{URL::to('public/assets/images/sale_product.png')}}" alt=""></span>
                                <img src="{{URL::to('public/assets/images/quick_view_img_1.jpg')}}" class="tr_all_hover" alt="">
                            </div>
                            <!--carousel-->
                            <div class="relative qv_carousel_wrap m_bottom_20">
                                <button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_prev">
                                    <i class="fa fa-angle-left "></i>
                                </button>
                                <ul class="qv_carousel d_inline_middle">
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_1.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_4.jpg')}}" alt=""></li>
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_2.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_5.jpg')}}" alt=""></li>
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_3.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_6.jpg')}}" alt=""></li>
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_1.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_4.jpg')}}" alt=""></li>
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_2.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_5.jpg')}}" alt=""></li>
                                    <li data-src="{{URL::to('public/assets/images/quick_view_img_3.jpg')}}"><img src="{{URL::to('public/assets/images/quick_view_img_6.jpg')}}" alt=""></li>
                                </ul>
                                <button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_next">
                                    <i class="fa fa-angle-right "></i>
                                </button>
                            </div>
                            <div class="d_inline_middle">Share this:</div>
                            <div class="d_inline_middle m_left_5">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                    <a class="addthis_button_preferred_1"></a>
                                    <a class="addthis_button_preferred_2"></a>
                                    <a class="addthis_button_preferred_3"></a>
                                    <a class="addthis_button_preferred_4"></a>
                                    <a class="addthis_button_compact"></a>
                                    <a class="addthis_counter addthis_bubble_style"></a>
                                </div>
                                <!-- AddThis Button END -->
                            </div>
                        </div>
                        <!--right popup column-->
                        <div class="f_right half_column">
                            <!--description-->
                            <h2 class="m_bottom_10"><a href="#" class="color_dark fw_medium">Eget elementum vel</a></h2>
                            <div class="m_bottom_10">
                                <!--rating-->
                                <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                </ul>
                                <a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
                            </div>
                            <hr class="m_bottom_10 divider_type_3">
                            <table class="description_table m_bottom_10">
                                <tr>
                                    <td>Manufacturer:</td>
                                    <td><a href="#" class="color_dark">Chanel</a></td>
                                </tr>
                                <tr>
                                    <td>Availability:</td>
                                    <td><span class="color_green">in stock</span> 20 item(s)</td>
                                </tr>
                                <tr>
                                    <td>Product Code:</td>
                                    <td>PS06</td>
                                </tr>
                            </table>
                            <h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>
                            <table class="description_table m_bottom_5">
                                <tr>
                                    <td>Product Length:</td>
                                    <td><span class="color_dark">10.0000M</span></td>
                                </tr>
                                <tr>
                                    <td>Product Weight:</td>
                                    <td>10.0000KG</td>
                                </tr>
                            </table>
                            <hr class="divider_type_3 m_bottom_10">
                            <p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </p>
                            <hr class="divider_type_3 m_bottom_15">
                            <div class="m_bottom_15">
                                <s class="v_align_b f_size_ex_large">$152.00</s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">$102.00</span>
                            </div>
                            <table class="description_table type_2 m_bottom_15">
                                <tr>
                                    <td class="v_align_m">Size:</td>
                                    <td class="v_align_m">
                                        <div class="custom_select f_size_medium relative d_inline_middle">
                                            <div class="select_title r_corners relative color_dark">s</div>
                                            <ul class="select_list d_none"></ul>
                                            <select name="product_name">
                                                <option value="s">s</option>
                                                <option value="m">m</option>
                                                <option value="l">l</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="v_align_m">Quantity:</td>
                                    <td class="v_align_m">
                                        <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                                            <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                            <input type="text" name="" readonly value="1" class="f_left">
                                            <button class="bg_tr d_block f_left" data-direction="up">+</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="clearfix m_bottom_15">
                                <button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover f_left f_size_large">Add to Cart</button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-heart-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span></button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-files-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span></button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!--scripts include-->
        <script src="{{URL::to('public/assets/js/jquery-2.1.0.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/retina.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/elevatezoom.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/camera.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/styleswitcher.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery.fancybox-1.3.4.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{URL::to('public/assets/js/styleswitcher.js')}}"></script>
        <script src="{{URL::to('public/assets/js/colorpicker.js')}}"></script>
        <script src="{{URL::to('public/assets/js/waypoints.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery.isotope.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery.tweet.min.js')}}"></script>
        <script src="{{URL::to('public/assets/js/jquery.custom-scrollbar.js')}}"></script>
        <script src="{{URL::to('public/assets/js/scripts.js')}}"></script>

        <script type="text/javascript" src="{{URL::to('public/assets/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c')}}"></script>
    </body>

    <!-- Mirrored from inthe7heaven.com/flatastic-html/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 17 Jun 2014 17:33:38 GMT -->
</html>