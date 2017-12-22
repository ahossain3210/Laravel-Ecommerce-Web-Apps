@extends('master')
@section('title','All Products')
@section('content')

<h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>
<!--filter navigation of products-->
<ul class="horizontal_list clearfix tt_uppercase isotope_menu f_size_ex_large m_bottom_30 all_products">
    <li class="active m_right_5 m_bottom_5 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter="*">All</button></li>
    <li class="m_right_5 m_bottom_5 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".random">New</button></li>
    @foreach($all_publish_manufacturer_info as $v_manufacturer)
    <li class="m_right_5 m_bottom_5 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter=".{{$v_manufacturer->manufacturer_id}}">{{$v_manufacturer->manufacturer_name}}</button></li>
    @endforeach
</ul>
<!--products-->
<section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
    <!--product item-->
    @foreach($product_info as $v_product)
    <div class="product_item  {{$v_product->manufacturer_id}}" style="margin-bottom: 3em;">
        <figure class="r_corners photoframe shadow relative hit animate_ftb long">
            <!--product preview-->
            <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block relative pp_wrap">
                <!--hot product-->
                <span class="hot_stripe"><img src="{{URL::to('public/assets/images/hot_product.png')}}" alt=""></span>
                <img src="{{URL::to($v_product->product_image)}}" width="200px" height="150px;" class="tr_all_hover" alt="">
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
@endsection