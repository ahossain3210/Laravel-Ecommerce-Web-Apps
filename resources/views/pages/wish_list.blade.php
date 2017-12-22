@extends('master')
@section('title','Wishlist')
@section('content')
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_25">Wishlist</h2>
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
                                <p class="f_size_large color_dark"></p>
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
                        <tr>
<!--                            <td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
                                
                            </td>
                            <td colspan="1" class="v_align_m">
                            </td>-->
                        </tr>
                    </tbody>
                </table>
                <div class="col-lg-12 col-md-12 col-sm-12 m_top_5" style="padding: 0;">
                    <ul>
<!--                        <li style="float: left;">
                            <a href="#">
                                <button class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Continue Shopping</button>
                            </a>
                        </li>-->
                        <li>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $billing_id=Session::get('billing_id');
                            if ($customer_id !=NULL && $billing_id==NULL) {
                                ?>
                                <a href="{{URL::to('/billing')}}">
                                    <button class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Checkout</button>
                                </a>
                            <?php } else if($customer_id!=NULL && $billing_id!=NULL){?>
                                <a href="{{URL::to('/payment')}}">
                                    <button class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Checkout</button>
                                </a>
                            <?php } else {?>
                            <a href="{{URL::to('/checkout')}}">
                                    <button class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Checkout</button>
                                </a>
                            <?php }?>
                        </li>
                    </ul>
                </div>
            </section>
            <!--right column-->
            @yield('sidebar')
        </div>
    </div>
</div>
@endsection