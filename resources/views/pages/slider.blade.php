@extends('master')
@section('slider')

<div class="camera_wrap m_bottom_0">
    <?php
    $featured_product=DB::table('tbl_product')
            ->where('feature_status',1)
            ->orderBy('product_id','DESC')
            ->take(7)
            ->get();
    foreach($featured_product as $v_product)
    {
    ?>
    <div data-src="{{URL::to($v_product->product_image)}}" data-custom-thumb="{{URL::to($v_product->product_image)}}">
        <div class="camera_caption_2 fadeIn t_align_c d_xs_none">
            <div class="f_size_large tt_uppercase slider_title_3 scheme_color f_weight_500">Shopin</div>
            <hr class="slider_divider type_2 m_bottom_5 d_inline_b">
            <div class="color_light slider_title tt_uppercase t_align_c m_bottom_15 m_sm_bottom_20"><b><span class="color_dark">{{$v_product->product_name}}</span></b></div>
            <div class="color_light slider_title t_align_c m_bottom_50 m_sm_bottom_20"><b><span class="scheme_color">Tk.{{$v_product->product_price}}</span></b></div>
            <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">BUY NOW !</a>
        </div>
    </div>
    <?php }?>
</div>
@endsection