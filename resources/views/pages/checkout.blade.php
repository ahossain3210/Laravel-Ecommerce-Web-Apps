@extends('master')
@section('title','Checkout')
@section('content')

<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <!--tabs-->
                <div class="tabs m_bottom_45">
                    <!--tabs navigation-->
                    <nav>
                        <ul class="tabs_nav horizontal_list clearfix">
                            <li><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Login</a></li>
                            <li><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Register</a></li>
                        </ul>
                    </nav>
                    <section class="tabs_content shadow r_corners">
                        <div id="tab-1">
                            <!--login form-->
                            <h5 class="fw_medium m_bottom_15">I am Already Registered</h5>
                            <h5 class="m_bottom_15" style="color:red">
                            <?php
                            $message=Session::get('message');
                            if($message)
                            {
                                echo $message;
                                Session::put('message',null);
                            }
                            
                            ?>
                            </h5>
                            
                            {!! Form::open(['url'=>'/customer-login-check','method'=>'post']) !!}
                                <ul>
                                    <li class="clearfix m_bottom_15">
                                        <div class="half_column type_2 f_left">
                                            <label for="username" class="m_bottom_5 d_inline_b">Username/Email</label>
                                            <input type="text" id="username" name="customer_email" class="r_corners full_width m_bottom_5">
                                            <a href="#" class="color_dark f_size_medium">Forgot your username?</a>
                                        </div>
                                        <div class="half_column type_2 f_left">
                                            <label for="pass" class="m_bottom_5 d_inline_b">Password</label>
                                            <input type="password" id="pass" name="customer_password" class="r_corners full_width m_bottom_5">
                                            <a href="#" class="color_dark f_size_medium">Forgot your password?</a>
                                        </div>
                                    </li>
<!--                                    <li class="m_bottom_15">
                                        <input type="checkbox" class="d_none" name="checkbox_4" id="checkbox_4"><label for="checkbox_4">Remember me</label>
                                    </li>-->
                                    <li><button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Log In</button></li>
                                </ul>
                            {!! Form::close() !!}
                        </div>
                        <div id="tab-2">
                            {!! Form::open(['url'=>'/save-customer','method'=>'post']) !!}
                                <ul>
                                    <li class="m_bottom_25">
                                        <label for="d_name" class="d_inline_b m_bottom_5 required">Name</label><br>
                                        <input type="text" id="d_name" name="customer_name" class="r_corners half_column">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_email" class="d_inline_b m_bottom_5 required">Email</label><br>
                                        <input type="email" id="u_email" name="customer_email" class="r_corners half_column">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_pass" class="d_inline_b m_bottom_5 required">Password</label><br>
                                        <input type="password" id="u_pass" name="customer_password" class="r_corners half_column">
                                    </li>
                                    <li>
                                        <label for="u_repeat_pass" class="d_inline_b m_bottom_5 required">Confirm Password</label><br>
                                        <input type="password" id="u_repeat_pass" name="" class="r_corners half_column m_bottom_15">
                                    </li>
                                    <li>
                                        <button type="submit" class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Register Now</button>
                                    </li>
                                </ul>
                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            </section>
            <!--right column-->
            @yield('sidebar')
        </div>
    </div>
</div>
@endsection