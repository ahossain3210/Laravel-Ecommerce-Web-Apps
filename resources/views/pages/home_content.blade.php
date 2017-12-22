@extends('master')
@section('title','Home')
@section('content')
<div class="clearfix m_bottom_35">
    <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Latest Collection <a href="{{URL::to('/new-collection')}}" class=" m_left_20 tt_none"><small style="font-size:13px;">[ See All ]</small></a> </h2>
</div>
<section class="products_container clearfix m_bottom_15 m_sm_bottom_15">
    
    <!--product item-->
    @foreach($latest_product as $v_product)
    <div class="product_item" style="margin-bottom: 3em;">
        <figure class="r_corners photoframe shadow relative hit animate_ftb long">
            <!--product preview-->
            <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block relative pp_wrap">
                <!--hot product-->
                <span class="hot_stripe"><img src="{{URL::to('public/assets/images/hot_product.png')}}" alt=""></span>
                <img src="{{URL::to($v_product->product_image)}}" width="200px" height="150px;" class="tr_all_hover" alt="">
<!--                <span data-popup="#quick_view_product" class="box_s_none button_type_5 color_light r_corners tr_all_hover d_xs_none">Quick View</span>-->
                <span class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">View Details</span>
            </a>
            <!--description and price of product-->
            <figcaption>
                <h6 class="m_bottom_5"><a href="#" class="color_dark ellipsis" title="{{$v_product->product_name}}">{{$v_product->product_name}}</a></h6>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">Tk.{{$v_product->product_price}}</p>
                    <p class="scheme_color f_left f_size_large m_bottom_15 m_left_10"><small><s>Tk.{{$v_product->product_p_price}}</s></small></p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                </div>
                {!! Form::open(['url'=>'/add-to-cart','method'=>'post']) !!}
                    <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
                    <input type="hidden" name="qty" value="1">
                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                {!! Form::close()!!}
            </figcaption>
        </figure>
    </div>
    @endforeach
</section>
<div class="clearfix m_bottom_20">
    <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">T-shirt Collection <a href="{{URL::to('/tshirt-collection')}}" class=" m_left_20 tt_none"><small style="font-size:13px;">[ See All ]</small></a></h2>
    <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>
    </div>
</div>
<div class="related_projects t_shirt_collection product_full_width col-md-7 m_bottom_40">
    <?php
    $product_info = DB::table('tbl_product')
                ->where('tbl_product.nested_category_id', 4)
                ->orderBy('product_id','DESC')
                ->get();
    ?>
    @foreach($product_info as $v_product)
    <figure class="col-md-11 r_corners photoframe shadow relative m_right_10  d_md_block d_xs_inline_b tr_all_hover" style="width: 85%; font-size: 13px;">
        <!--product preview-->
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block relative pp_wrap">
            <!--hot product-->
            <span class="hot_stripe type_2"><img src="{{URL::to('public/assets/images/hot_product_type_2.png')}}" alt=""></span>
            <img src="{{URL::to($v_product->product_image)}}" width="100%" height="100%" class="tr_all_hover photo" alt="">
            <span class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">View Details</span>
        </a>
        <!--description and price of product-->
        <figcaption class="t_xs_align_l">
            <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis" title="{{$v_product->product_name}}">{{$v_product->product_name}}</a></h5>
            <div class="clearfix">
                <p class="scheme_color f_left f_size_large m_bottom_15">Tk.{{$v_product->product_price}}</p>
                <p class="scheme_color f_left f_size_large m_bottom_15 m_left_10"><small><s>Tk.{{$v_product->product_p_price}}</s></small></p>
                
                <!--rating-->
                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
            </div>
            {!! Form::open(['url'=>'/add-to-cart','method'=>'post']) !!}
            <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
            <input type="hidden" name="qty" value="1">
            <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            {!! Form::close()!!}
        </figcaption>
    </figure>
    @endforeach
</div>
<div class="clearfix m_bottom_20">
    <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Mobile Collection <a href="{{URL::to('mobile-collection')}}" class=" m_left_20 tt_none"><small style="font-size:13px;">[ See All ]</small></a> </h2>
    <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners mc_prev"><i class="fa fa-angle-left"></i></button>
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners mc_next"><i class="fa fa-angle-right"></i></button>
    </div>
</div>
<div class="related_projects mobile_collection product_full_width col-md-7 m_bottom_45">
    <?php
    $product_info_by_sub_id=DB::table('tbl_product')
            ->where('tbl_product.sub_category_id',2)
            ->orderBy('product_id','DESC')
            ->get();
    ?>
    @foreach($product_info_by_sub_id as $v_product)
    <figure class="col-md-11 m_right_10 r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover" style="width: 85%; font-size: 13px;">
        <!--product preview-->
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block relative pp_wrap">
            <!--hot product-->
            <span class="hot_stripe type_2"><img src="{{URL::to('public/assets/images/hot_product_type_2.png')}}" alt=""></span>
            <img src="{{URL::to($v_product->product_image)}}" width="180" height="180" class="tr_all_hover" alt="">
            <span class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
        </a>
        <!--description and price of product-->
        <figcaption class="t_xs_align_l">
            <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis" title="{{$v_product->product_name}}">{{$v_product->product_name}}</a></h5>
            <div class="clearfix">
                <p class="scheme_color f_left f_size_large m_bottom_15">Tk.{{$v_product->product_price}}</p>
                <p class="scheme_color f_left f_size_large m_bottom_15 m_left_10"><small><s>Tk.{{$v_product->product_p_price}}</s></small></p>
                <!--rating-->
                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
            </div>
            {!! Form::open(['url'=>'/add-to-cart','method'=>'post']) !!}
                <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
                <input type="hidden" name="qty" value="1">
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            {!! Form::close()!!}
        </figcaption>
    </figure>
    @endforeach
</div>
<div class="clearfix m_bottom_20 ">
    <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Punjabi Collection <a href="{{URL::to('/panjabi-collection')}}" class=" m_left_20 tt_none"><small style="font-size:13px;">[ See All ]</small></a> </h2>
    <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pc_prev"><i class="fa fa-angle-left"></i></button>
        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pc_next"><i class="fa fa-angle-right"></i></button>
    </div>
</div>
<div class="related_projects punjabi_collection product_full_width col-md-7 m_bottom_45">
    <?php
    $product_info_by_nested_id=DB::table('tbl_product')
            ->where('tbl_product.nested_category_id',5)
            ->orderBy('product_id','DESC')
            ->get();
    ?>
    @foreach($product_info_by_nested_id as $v_product)
    <figure class="col-md-11 m_right_10 r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover" style="width: 85%; font-size: 13px;">
        <!--product preview-->
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block relative pp_wrap">
            <!--hot product-->
            <span class="hot_stripe type_2"><img src="{{URL::to('public/assets/images/hot_product_type_2.png')}}" alt=""></span>
            <img src="{{URL::to($v_product->product_image)}}" width="100%" height="180" class="tr_all_hover" alt="">
            <span class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
        </a>
        <!--description and price of product-->
        <figcaption class="t_xs_align_l">
            <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis" title="{{$v_product->product_name}}">{{$v_product->product_name}}</a></h5>
            <div class="clearfix">
                <p class="scheme_color f_left f_size_large m_bottom_15">Tk.{{$v_product->product_price}}</p>
                <p class="scheme_color f_left f_size_large m_bottom_15 m_left_10"><small><s>Tk.{{$v_product->product_p_price}}</s></small></p>
                <!--rating-->
                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
            </div>
            {!! Form::open(['url'=>'/add-to-cart','method'=>'post']) !!}
                <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
                <input type="hidden" name="qty" value="1">
                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
            {!! Form::close()!!}
        </figcaption>
    </figure>
    @endforeach
</div>
<!--banners-->


@endsection