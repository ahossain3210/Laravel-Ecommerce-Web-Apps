@extends('master')
@section('from_the_blog')

<div class="row clearfix m_bottom_45 m_sm_bottom_35">
    <div class="col-lg-6 col-md-6 col-sm-12 m_sm_bottom_35 blog_animate animate_ftr">
        <div class="clearfix m_bottom_25 m_sm_bottom_20">
            <h2 class="tt_uppercase color_dark f_left">From The Blog</h2>
            <div class="f_right clearfix nav_buttons_wrap">
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners blog_prev"><i class="fa fa-angle-left"></i></button>
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners blog_next"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <!--blog carousel-->
        <div class="blog_carousel">
            <div class="clearfix">
                <!--image-->
                <a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
                    <img class="tr_all_long_hover" src="{{URL::to('public/assets/images/blog_img_1.jpg')}}" alt="">
                </a>
                <!--post content-->
                <div class="mini_post_content">
                    <h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>Ut tellus dolor, dapibus eget, elementum vel</b></a></h4>
                    <p class="f_size_medium m_bottom_10 animate_ftr">25 January, 2013, 5 comments</p>
                    <p class="m_bottom_10 animate_ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
                    <a class="tt_uppercase f_size_large animate_ftr" href="#">Read More</a>
                </div>
            </div>
            <div class="clearfix">
                <!--image-->
                <a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
                    <img class="tr_all_long_hover" src="{{URL::to('public/assets/images/blog_img_2.jpg')}}" alt="">
                </a>
                <!--post content-->
                <div class="mini_post_content">
                    <h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>Cursus eleifend, elit aenean set amet lorem</b></a></h4>
                    <p class="f_size_medium m_bottom_10 animate_ftr">30 January, 2013, 6 comments</p>
                    <p class="m_bottom_10 animate_ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
                    <a class="tt_uppercase f_size_large animate_ftr" href="#">Read More</a>
                </div>
            </div>
            <div class="clearfix">
                <!--image-->
                <a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
                    <img class="tr_all_long_hover" src="{{URL::to('public/assets/images/blog_img_3.jpg')}}" alt="">
                </a>
                <!--post content-->
                <div class="mini_post_content">
                    <h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>In pede mi, aliquet sit ut tellus dolor</b></a></h4>
                    <p class="f_size_medium m_bottom_10 animate_ftr">1 February, 2013, 12 comments</p>
                    <p class="m_bottom_10 animate_ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
                    <a class="tt_uppercase f_size_large animate_ftr" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!--testimonials-->
    <div class="col-lg-6 col-md-6 col-sm-12 ti_animate animate_ftr">
        <div class="clearfix m_bottom_25 m_sm_bottom_20">
            <h2 class="tt_uppercase color_dark f_left f_mxs_none m_mxs_bottom_15">What Our Customers Say</h2>
            <div class="f_right clearfix nav_buttons_wrap f_mxs_none">
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners ti_prev"><i class="fa fa-angle-left"></i></button>
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners ti_next"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <!--testimonials carousel-->
        <div class="testiomials_carousel">
            <div>
                <blockquote class="r_corners shadow f_size_large relative m_bottom_15 animate_ftr">Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</blockquote>
                <img class="circle m_left_20 d_inline_middle animate_ftr" src="{{URL::to('public/assets/images/testimonial_img_1.jpg')}}" alt="">
                <div class="d_inline_middle m_left_15 animate_ftr">
                    <h5 class="color_dark"><b>Marta Healy</b></h5>
                    <p>Los Angeles</p>
                </div>
            </div>
            <div>
                <blockquote class="r_corners shadow f_size_large relative m_bottom_15">Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.</blockquote>
                <img class="circle m_left_20 d_inline_middle" src="{{URL::to('public/assets/images/testimonial_img_2.jpg')}}" alt="">
                <div class="d_inline_middle m_left_15">
                    <h5 class="color_dark"><b>Alan Smith</b></h5>
                    <p>New York</p>
                </div>
            </div>
            <div>
                <blockquote class="r_corners shadow f_size_large relative m_bottom_15">Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt.</blockquote>
                <img class="circle m_left_20 d_inline_middle" src="{{URL::to('public/assets/images/testimonial_img_3.jpg')}}" alt="">
                <div class="d_inline_middle m_left_15">
                    <h5 class="color_dark"><b>Anna Johnson</b></h5>
                    <p>Detroid</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection