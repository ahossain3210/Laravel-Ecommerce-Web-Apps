@extends('master')
@section('add')

<section class="row clearfix m_bottom_45 m_sm_bottom_35">
    <?php
    $product_info=DB::table('tbl_product')
            ->where('nested_category_id',31)
            ->orderBy('product_id','DESC')
            ->take(1)
            ->get();
    foreach ($product_info as $v_product)
    {
    ?>
    <div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
            <img src="{{URL::to($v_product->product_image)}}" height="230" width="100%" alt="">
            <span class="banner_caption d_block vc_child t_align_c w_sm_auto">
                <span class="d_inline_middle">
                    <span class="d_block scheme_color tt_uppercase m_bottom_5 let_s"><b>New Collection!</b></span>
                    <span class="d_block divider_type_2 m_bottom_5"></span>
                    <span class="d_block scheme_color m_bottom_25 m_xs_bottom_10 banner_title"><b>{{$v_product->product_name}}</b></span>
                    <span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
                </span>
            </span>
        </a>
    </div>
    <?php }?>
    <?php
    $product_info=DB::table('tbl_product')
            ->where('nested_category_id',2)
            ->orderBy('product_id','DESC')
            ->take(1)
            ->get();
    foreach ($product_info as $v_product)
    {
    ?>
    <div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block banner wrapper r_corners type_2 relative">
            <img src="{{URL::to($v_product->product_image)}}" width="100%" height="230" alt="">
            <span class="banner_caption d_block t_align_c vc_child w_sm_auto">
                <span class="d_inline_middle">
                    <span class="d_block scheme_color banner_title type_2 m_bottom_5 m_mxs_bottom_5"><b>-15%</b></span>
                    <span class="d_block divider_type_2 m_bottom_5 d_sm_none"></span>
                    <span class="d_block color_dark m_bottom_15 banner_title_3 m_md_bottom_5 d_mxs_none"><b>{{$v_product->product_name}}</b></span>
                    <span class="button_type_6 bg_dark_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
                </span>
            </span>
        </a>
    </div>
    <?php }?>
</section>
@endsection