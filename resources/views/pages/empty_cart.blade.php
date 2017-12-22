@extends('master')
@section('content')
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_25">Cart</h2>
                <!--cart table-->
                <p>No product in your cart. please add to cart your best choice.</p>
                <!--tabs-->
            </section>
            <!--right column-->
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <!--widgets-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Categories</h3>
                    </figcaption>
                    <div class="widget_content">
                        <!--Categories list-->
                        <ul class="categories_list">
                            <li class="active">
                                <a href="#" class="f_size_large scheme_color d_block relative">
                                    <b>Women</b>
                                    <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                </a>
                                <!--second level-->
                                <ul>
                                    <li class="active">
                                        <a href="#" class="d_block f_size_large color_dark relative">
                                            Dresses<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                        </a>
                                        <!--third level-->
                                        <ul>
                                            <li><a href="#" class="color_dark d_block">Evening Dresses</a></li>
                                            <li><a href="#" class="color_dark d_block">Casual Dresses</a></li>
                                            <li><a href="#" class="color_dark d_block">Party Dresses</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="d_block f_size_large color_dark relative">
                                            Accessories<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d_block f_size_large color_dark relative">
                                            Tops<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="f_size_large color_dark d_block relative">
                                    <b>Men</b>
                                    <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                </a>
                                <!--second level-->
                                <ul class="d_none">
                                    <li>
                                        <a href="#" class="d_block f_size_large color_dark relative">
                                            Shorts<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                        </a>
                                        <!--third level-->
                                        <ul class="d_none">
                                            <li><a href="#" class="color_dark d_block">Evening</a></li>
                                            <li><a href="#" class="color_dark d_block">Casual</a></li>
                                            <li><a href="#" class="color_dark d_block">Party</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="f_size_large color_dark d_block relative">
                                    <b>Kids</b>
                                    <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </figure>
                <!--compare products-->
<!--                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Compare Products</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15 relative cw_product">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_1.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_25 relative cw_product">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_2.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <a href="#" class="color_dark"><i class="fa fa-files-o m_right_10"></i>Go to Compare</a>
                    </div>
                </figure>-->
                <!--wishlist-->
<!--                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Wishlist</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15 relative cw_product">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_1.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_25 relative cw_product">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_2.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <a href="#" class="color_dark"><i class="fa fa-heart-o m_right_10"></i>Go to Wishlist</a>
                    </div>
                </figure>-->
                
                <!--Bestsellers-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Bestsellers</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_1.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut dolor dapibus</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                            <p class="scheme_color">$61.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_2.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elementum vel</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                            <p class="scheme_color">$57.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_5">
                            <img src="{{URL::to('public/assets/images/bestsellers_img_3.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Crsus eleifend elit</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                            <p class="scheme_color">$24.00</p>
                        </div>
                    </div>
                </figure>
                <!--tags-->
                <!--New products-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">New Products</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/new_products_img_1.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Ut tellus dolor dapibus</a>
                            <p class="scheme_color">$61.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/new_products_img_2.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Elementum vel</a>
                            <p class="scheme_color">$57.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_5">
                            <img src="{{URL::to('public/assets/images/new_products_img_3.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Crsus eleifend elit</a>
                            <p class="scheme_color">$24.00</p>
                        </div>
                    </div>
                </figure>
                <!--Specials-->
                <!--Popular articles-->
                <!--Latest articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Latest Articles</h3>
                    </figcaption>
                    <div class="widget_content">
                        <article class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/article_img_4.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                            <p class="f_size_medium">25 January, 2013</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_15">
                            <img src="{{URL::to('public/assets/images/article_img_5.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                            <p class="f_size_medium">21 January, 2013</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_5">
                            <img src="{{URL::to('public/assets/images/article_img_6.jpg')}}" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                            <p class="f_size_medium">18 January, 2013</p>
                        </article>
                    </div>
                </figure>
            </aside>
        </div>
    </div>
</div>
@endsection