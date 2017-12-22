@extends('master')
@section('title','All manufacturers')
@section('content')
<div class="container">
    <div class="clearfix">
        <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
            <h2 class="tt_uppercase color_dark m_bottom_30">Our all Manufacturers</h2>
            <div class="bg_light_color_3 r_corners shadow manufacturers t_xs_align_c">
                <div class="row clearfix m_bottom_25 m_xs_bottom_0 m_bottom_25" style="margin-bottom: 25px;">
                    @foreach($all_manufacturer as $v_manufacturer)
                    <figure class="col-lg-3 col-md-3 col-sm-3 col-xs-6 m_xs_bottom_15 m_bottom_25">
                        <a href="{{URL::to('/manufacturer-product/'.$v_manufacturer->manufacturer_id)}}" class="m_image_wrap d_block m_bottom_15 d_xs_inline_b d_mxs_block">
                            <img src="{{URL::to($v_manufacturer->manufacturer_image)}}" width="140" height="60" alt="">
                        </a>
<!--                        <figcaption>
                            <h5><a href="" class="color_dark fw_medium t_align_c">{{$v_manufacturer->manufacturer_name}}</a></h5>
                        </figcaption>-->
                    </figure>
                    @endforeach
                </div>
            </div>
        </section>
        @yield('sidebar')
    </div>
</div>
@endsection