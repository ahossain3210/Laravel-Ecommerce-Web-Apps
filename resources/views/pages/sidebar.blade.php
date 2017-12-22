@extends('master')
@section('sidebar')
<aside class="col-lg-3 col-md-3 col-sm-3">
    <!--widgets-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">Categories</h3>
        </figcaption>
        <div class="widget_content">
            <!--Categories list-->
            <ul class="categories_list">
                <?php
                $all_publish_category=DB::table('tbl_category')
                        ->where('publication_status',1)
                        ->get();
                foreach ($all_publish_category as $v_category)
                {
                ?>
                <li>
                    <a href="#" class="f_size_large color_dark d_block relative">
                        <b>{{$v_category->category_name}}</b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <!--second level-->
                    <ul class="d_none">
                        <?php
                        $cid=$v_category->category_id;
                        $sub_category_by_cat_id=DB::table('tbl_sub_category')
                                ->where('category_id', $cid)
                                ->where('publication_status',1)
                                ->get();
                        foreach ($sub_category_by_cat_id as $v_sub_category)
                        {
                        ?>
                        <li>
                            <a href="#" class="d_block f_size_large color_dark relative">
                                {{$v_sub_category->name}}<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                            </a>
                            <!--third level-->
                            <ul class="d_none">
                                <?php
                                $sub_cat_id=$v_sub_category->id;
                                $nested_category_by_sub_cat_id=DB::table('tbl_nested_category')
                                        ->where('sub_category_id', $sub_cat_id)
                                        ->where('publication_status',1)
                                        ->get();
                                foreach ($nested_category_by_sub_cat_id as $v_nested)
                                {
                                ?>
                                <li><a href="{{URL::to('/nested-category-product/'.$v_nested->nested_category_id)}}" class="color_dark d_block">{{$v_nested->nested_category_name}}</a></li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
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
                    <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                            <h3 class="color_light">Wishlist</h3>
                        </figcaption>
                        <div class="widget_content">
                            <?php
                            $contents=Cart::content();
                            
                            foreach($contents as $v_content)
                            {
                            ?>
                            <div class="clearfix m_bottom_15 relative cw_product">
                                <img src="{{URL::to($v_content->options['image'])}}" width="70" height="75" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                <a href="#" class="color_dark d_block bt_link">{{$v_content->name}}</a>
                                <a href="{{URL::to('/delete-wishlist/'.$v_content->rowId)}}">
                                    <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                                </a>
                            </div>
                            <hr class="m_bottom_15">
                            <?php }?>
                            <a href="{{URL::to('/wishlist')}}" class="color_dark"><i class="fa fa-heart-o m_right_10"></i>Go to Wishlist</a>
                        </div>
                    </figure>

    <!--Bestsellers-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">Bestsellers</h3>
        </figcaption>
        <div class="widget_content">
            <?php
            $featured_product=DB::table('tbl_product')
                    ->where('feature_status',1)
                    ->orderBy('product_id','DESC')
                    ->take(3)
                    ->get();
            
            foreach ($featured_product as $v_product)
            {
            ?>
            <div class="clearfix m_bottom_15">
                <img src="{{URL::to($v_product->product_image)}}" width="70" height="75" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="color_dark d_block bt_link">{{$v_product->product_name}}</a>
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
                <p class="scheme_color">Tk.{{$v_product->product_price}}</p>
            </div>
            <hr class="m_bottom_15">
            <?php }?>
        </div>
    </figure>
    <!--tags-->
    <!--New products-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">New Products</h3>
        </figcaption>
        <div class="widget_content">
            <?php
            $latest_product=DB::table('tbl_product')
                    ->orderBy('product_id','DESC')
                    ->take(5)
                    ->get();
            
            foreach ($latest_product as $v_product)
            {
            ?>
            <div class="clearfix m_bottom_15">
                <img src="{{URL::to($v_product->product_image)}}" width="70" height="75" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" class="color_dark d_block m_bottom_5 bt_link">{{$v_product->product_name}}</a>
                <p class="scheme_color">Tk.{{$v_product->product_price}}</p>
            </div>
            <hr class="m_bottom_15">
            <?php }?>
        </div>
    </figure>
</aside>
@endsection

