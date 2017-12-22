@extends('master')
@section('title','Payment')
@section('content')

<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <!--tabs-->
                <div class="tabs m_bottom_45">
                    <section class="tabs_content shadow r_corners">
                        <h2 class="tt_uppercase color_dark m_bottom_30">Payment</h2>
                        <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
                            {!! Form::open(['url'=>'/place-order','method'=>'post']) !!}
                            <figure class="block_select clearfix relative m_bottom_15">
                                <input type="radio" checked name="payment_method" value="Paypal" class="d_none">
                                <figcaption class="d_table d_sm_block">
                                    <div class="d_table_cell d_sm_block p_sm_right_0 p_right_45 m_mxs_bottom_5">
                                        <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Paypal</h5>
                                        <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turp. Donec sit amet eros. </p>
                                    </div>
                                    <!--                                    <div class="d_table_cell d_sm_block discount">
                                                                            <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_0">Discount/Fee</h5>
                                                                            <p class="color_dark">$8.48</p>
                                                                        </div>-->
                                </figcaption>
                            </figure>
                            <hr class="m_bottom_20">
                            <figure class="block_select clearfix relative m_bottom_20">
                                <input type="radio" name="payment_method" value="Cash_on_delivery" class="d_none">
                                <figcaption>
                                    <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Cash On Delivery</h5>
                                    <p>Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. 
                                        Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
                                </figcaption>
                            </figure>
                            <button class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Place Order</button>
                            {!! Form::close() !!}
                        </div>
                        <h2 class="tt_uppercase color_dark m_bottom_25">Cart Preview</h2>
                <!--cart table-->
                <table class="table_type_4 responsive_table full_width r_corners wraper shadow t_align_l t_xs_align_c m_bottom_0">
                    <thead>
                        <tr class="f_size_large">
                            <!--titles for td-->
                            <th>Product Image &amp; Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <?php
                    $contents = Cart::content();

//                        echo"<pre>";
//                        print_r($contents);
                    //exit();
                    ?>
                    <tbody>
                        @foreach($contents as $v_content)
                        <tr>
                            <!--Product name and image-->
                            <td data-title="Product Image &amp; name" class="t_md_align_c">
                                <img src="{{URL::to($v_content->options['image'])}}" height="100%;" width="30%" alt="" class="m_md_bottom_5 d_xs_block d_xs_centered">
                                <a href="#" class="d_inline_b m_left_5 color_dark">{{$v_content->name}}</a>
                            </td>
                            <!--product key-->
                            <!--product price-->
                            <td data-title="Code">
                                <p class="f_size_large color_dark">M-101</p>
                            </td>
                            <td data-title="Price">
                                <p class="f_size_large color_dark">Tk. {{$v_content->price}}</p>
                            </td>
                            <!--quanity-->
                            {!! Form:: open(['url'=>'/update-cart','method'=>'post'])!!}
                            <td data-title="Quantity">
                                <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">
                                    <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                    <input type="text" name="qty" value="{{$v_content->qty}}" class="f_left">
                                    <input type="hidden" name="row_id" value="{{$v_content->rowId}}" class="f_left">
                                    <button class="bg_tr d_block f_left" data-direction="up">+</button>
                                </div>
                                <div>
                                    <button style="width: 65px;" type="submit"><a href="#" class="color_dark"><i class="fa fa-check f_size_medium m_right_5"></i>Update</a></button>
                                    <br>
                                    {!! Form::close() !!}
                                    <a href="{{URL::to('/delete-cart/'.$v_content->rowId)}}" class="color_dark"><i class="fa fa-times f_size_medium m_right_5"></i>Remove</a><br>
                                </div>
                            </td>

                            <!--subtotal-->
                            <td data-title="Subtotal">
                                <p class="f_size_large fw_medium scheme_color">Tk. 
                                    <?php
                                    $sub_total = $v_content->price * $v_content->qty;
                                    echo $sub_total;
                                    ?>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        <!--                        prices
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Coupon Discount:</p>
                                                    </td>
                                                    <td colspan="1">
                                                        <p class="fw_medium f_size_large color_dark">$-74.96</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Subtotal:</p>
                                                    </td>
                                                    <td colspan="1">
                                                        <p class="fw_medium f_size_large color_dark">$95.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Payment Fee:</p>
                                                    </td>
                                                    <td colspan="1">
                                                        <p class="fw_medium f_size_large color_dark">$6.05</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Shipment Fee:</p>
                                                    </td>
                                                    <td colspan="1">
                                                        <p class="fw_medium f_size_large color_dark">$0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Tax Total:</p>
                                                    </td>
                                                    <td colspan="1">
                                                        <p class="fw_medium f_size_large color_dark">$17.54</p>
                                                    </td>
                                                </tr>
                                                total-->
                        <tr>
                            <td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
                                <!--coupon-->
                                <form class="d_ib_offset_0 d_inline_middle half_column d_xs_block w_xs_full m_xs_bottom_5">
                                    <input type="text" placeholder="Enter your coupon code" name="" class="r_corners f_size_medium">
                                    <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Save</button>
                                </form>
                                <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Grand Total:</p>
                            </td>
                            <td colspan="1" class="v_align_m">
                                <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">Tk. {{Cart::total()}}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    </section>
                </div>
                
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
                <!--Bestsellers-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Bestsellers</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15">
                            <img src="images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
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
                            <img src="images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
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
                            <img src="images/bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
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
                <!--                <figure class="widget shadow r_corners wrapper m_bottom_30">
                                    <figcaption>
                                        <h3 class="color_light">New Products</h3>
                                    </figcaption>
                                    <div class="widget_content">
                                        <div class="clearfix m_bottom_15">
                                            <img src="images/new_products_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Ut tellus dolor dapibus</a>
                                            <p class="scheme_color">$61.00</p>
                                        </div>
                                        <hr class="m_bottom_15">
                                        <div class="clearfix m_bottom_15">
                                            <img src="images/new_products_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Elementum vel</a>
                                            <p class="scheme_color">$57.00</p>
                                        </div>
                                        <hr class="m_bottom_15">
                                        <div class="clearfix m_bottom_5">
                                            <img src="images/new_products_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Crsus eleifend elit</a>
                                            <p class="scheme_color">$24.00</p>
                                        </div>
                                    </div>
                                </figure>-->
                <!--Popular articles-->
                <!--                <figure class="widget shadow r_corners wrapper m_bottom_30">
                                    <figcaption>
                                        <h3 class="color_light">Popular Articles</h3>
                                    </figcaption>
                                    <div class="widget_content">
                                        <article class="clearfix m_bottom_15">
                                            <img src="images/article_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                                            <p class="f_size_medium">50 comments</p>
                                        </article>
                                        <hr class="m_bottom_15">
                                        <article class="clearfix m_bottom_15">
                                            <img src="images/article_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                                            <p class="f_size_medium">34 comments</p>
                                        </article>
                                        <hr class="m_bottom_15">
                                        <article class="clearfix m_bottom_5">
                                            <img src="images/article_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                                            <p class="f_size_medium">21 comments</p>
                                        </article>
                                    </div>
                                </figure>-->
            </aside>
        </div>
    </div>
</div>
@endsection