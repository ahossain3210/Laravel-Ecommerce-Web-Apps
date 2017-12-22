@extends('master')
@section('title','Billing')
@section('content')

<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <!--tabs-->
                <div class="tabs m_bottom_45">
                    <section class="tabs_content shadow r_corners">
                        <h2 class="color_dark tt_uppercase m_bottom_25" style="margin-bottom: 10px;">Billing Information</h2>
                        <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
                            <div class="row clearfix">
                                <div class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                                    <article class="m_bottom_20">Fill the following billing information carefully.</article>
                                    {!! Form::open(['url'=>'/save-billing','method'=>'post']) !!}
                                    <ul>
                                        <li class="m_bottom_10">
                                            <label for="d_name" class="d_inline_b m_bottom_5 required">Company Name</label><br>
                                            <input type="text" id="d_name" name="company_name" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="d_name" class="d_inline_b m_bottom_5 required">Customer Name</label><br>
                                            <input type="text" id="d_name" name="customer_name" required="" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="u_email" class="d_inline_b m_bottom_5 required">Email</label><br>
                                            <input type="email" id="u_email" name="customer_email" required="" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="mobile" class="d_inline_b m_bottom_5 required">Mobile</label><br>
                                            <input type="text" id="u_email" name="mobile_number" required="" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="address" class="d_inline_b m_bottom_5 required">Adddress</label><br>
                                            <input type="text" id="u_email" name="customer_address" required="" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="city" class="d_inline_b m_bottom_5 required">City</label><br>
                                            <input type="text" id="u_email" name="city" class="r_corners full_width">
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="country" class="d_inline_b m_bottom_5 required">Country</label><br>
                                            <div class="controls">
                                                <select name="country" class="select_title type_2 r_corners relative color_dark mw_0 full_width">
                                                    <option selected="">Select</option>
<!--                                                    <option>Australia</option>
                                                    <option>Afghanistan</option>
                                                    <option>India</option>
                                                    <option>Bangladesh</option>
                                                    <option>New Zealand</option>
                                                    <option>Singapore</option>
                                                    <option>Canada</option>
                                                    <option>Germany</option>
                                                    <option>China</option>
                                                    <option>USA</option>
                                                    <option>UK</option>
                                                    <option>Pakistan</option>
                                                    <option>Sri Lanka</option>
                                                    <option>Italy</option>
                                                    <option>France</option>
                                                    <option>Swizerland</option>
                                                    <option>England</option>
                                                    <option>Nepal</option>
                                                    <option>Bhutan</option>-->
                                                    <script type="text/javascript">
                                                        printCountryOptions();
                                                    </script>
                                                </select>
                                                
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <label for="zip_code" class="d_inline_b m_bottom_5 required">Postal/Zip Code</label><br>
                                            <input type="text" id="u_email" name="zip_code" required="" class="r_corners full_width">
                                        </li>
                                        <li>
                                            <button type="submit" class="button_type_4 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Complete Billing</button>
                                        </li>
                                    </ul>
                                    {!! Form::close() !!}
                                </div>
                            </div>
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