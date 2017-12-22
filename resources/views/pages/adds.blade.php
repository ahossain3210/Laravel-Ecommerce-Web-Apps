@extends('master')
@section('adds')
<div class="row clearfix">
        <?php
        $product_info=DB::table('tbl_product')
                ->where('nested_category_id',32)
                ->orderBy('product_id','DESC')
                ->take(1)
                ->get();
        foreach ($product_info as $v_product)
        {
        ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
            <span class="d_inline_middle">
                <img class="d_inline_middle m_md_bottom_5" src="{{URL::to($v_product->product_image)}}" width="50" height="50" alt="">
                <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                    <b>{{$v_product->product_name}}</b><br><span class="color_dark">Shop now!</span>
                </span>
            </span>
        </a>
    </div>
        <?php }?>
    <?php
        $product_info=DB::table('tbl_product')
                ->where('nested_category_id',30)
                ->orderBy('product_id','DESC')
                ->take(1)
                ->get();
        foreach ($product_info as $v_product)
        {
    ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
            <span class="d_inline_middle">
                <img class="d_inline_middle m_md_bottom_5" src="{{URL::to($v_product->product_image)}}" width="50" height="50" alt="">
                <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                    <b>{{$v_product->product_name}}</b><br><span class="color_dark">Shop now!</span>
                </span>
            </span>
        </a>
    </div>
        <?php }?>
        <?php
        $product_info=DB::table('tbl_product')
                ->where('nested_category_id',43)
                ->orderBy('product_id','DESC')
                ->take(1)
                ->get();
        foreach ($product_info as $v_product)
        {
        ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="d_block animate_ftb h_md_auto banner_type_2 r_corners orange t_align_c tt_uppercase vc_child n_sm_vc_child">
            <span class="d_inline_middle">
                <img class="d_inline_middle m_md_bottom_5" src="{{URL::to($v_product->product_image)}}" width="50" height="50" alt="">
                <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                    <b>{{$v_product->product_name}}</b><br><span class="color_dark">Shop Now!</span>
                </span>
            </span>
        </a>
    </div>
        <?php }?>
</div>
@endsection