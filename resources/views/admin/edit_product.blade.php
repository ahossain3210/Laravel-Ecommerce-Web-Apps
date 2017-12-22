@extends('admin.admin_master')
@section('title','Edit Product')
@section('admin_content')

<ul class="breadcrumb">
    <li>
        <i class="#"></i>
        <a href="#">Dashboard</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Edit Product</a>
    </li>
</ul>

{!! Form::open(['url'=>'/update-product','method'=>'post','name'=>'edit_product','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
<fieldset>
    <h3 style="color:green;">
        <?php
        $message=Session::get('message');
        if($message)
        {
            echo $message;
        Session::put('message',null);
        }
        ?>
    </h3>
    <div class="control-group">
        <label class="control-label" for="typeahead">Product Name</label>
        <div class="controls">
            <input type="text" name="product_name" value="{{$product_info->product_name}}" class="span6 typeahead" id="typeahead" required="required" data-provide="typeahead" data-items="4" >
            <input type="hidden" name="product_id" value="{{$product_info->product_id}}" class="span6 typeahead" id="typeahead" required="required" data-provide="typeahead" data-items="4" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="selectError">Manufacturer</label>
        <div class="controls">
            <select id="selectError" name="manufacturer_id" value="{{$product_info->manufacturer_id}}">
                @foreach($manufacturer_info as $v_manufacturer)
                <option value="{{$v_manufacturer->manufacturer_id}}" >{{$v_manufacturer->manufacturer_name}}</option>
                @endforeach
            </select>
        </div>  
    </div>
    <div class="control-group">
        <label class="control-label" for="selectError">Category Name</label>
        <div class="controls">
            <select id="selectError" name="category_id" value="{{$product_info->category_id}}">
                @foreach($category_info as $v_category)
                <option value="{{$v_category->category_id}}" >{{$v_category->category_name}}</option>
                @endforeach
            </select>
        </div>  
    </div>
    <div class="control-group">
        <label class="control-label" for="selectError">Sub-category</label>
        <div class="controls">
            <select id="selectError" name="sub_category_id" value="{{$product_info->sub_category_id}}">
                @foreach($sub_category_info as $v_category)
                <option value="{{$v_category->id}}" >{{$v_category->name}}</option>
                @endforeach
            </select>
        </div>  
    </div>
    <div class="control-group">
        <label class="control-label" for="selectError">Nested-category</label>
        <div class="controls">
            <select id="selectError" name="nested_category_id" value="{{$product_info->nested_category_id}}">
                @foreach($nested_category_info as $v_category)
                <option value="{{$v_category->nested_category_id}}" >{{$v_category->nested_category_name}}</option>
                @endforeach
            </select>
        </div>  
    </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Product Code</label>
        <div class="controls">
            <input type="text" name="product_code" value="{{$product_info->product_code}}">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Product Price</label>
        <div class="controls">
            <input type="text" name="product_price" value="{{$product_info->product_price}}">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Previous Price</label>
        <div class="controls">
            <input type="text" name="product_p_price" value="{{$product_info->product_p_price}}">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Quantity</label>
        <div class="controls">
            <input type="text" name="product_quantity" value="{{$product_info->product_quantity}}">
        </div>
    </div>
    <div class="control-group hidden-phone">
        <label class="control-label" for="textarea2">Product Description</label>
        <div class="controls">
            <textarea class="cleditor" name="product_description" id="textarea2" rows="3">{{$product_info->product_description}}</textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"  for="selectError">Product Image</label>
        <div class="controls">
            <input type="file" name="product_image"><img src="{{URL::to($product_info->product_image)}}" alt="" width="100" height="70">
            <input type="hidden" name="product_old_image" value="{{$product_info->product_image}}">
        </div>     
    </div>     
    <div class="control-group">
        <label class="control-label" for="selectError">Status</label>
        <div class="controls">
            <select id="selectError" name="feature_status">
                @if($product_info->feature_status==1)
                <option value="1" selected="true">Featured</option>
                <option value="0">Un-featured</option>
                @else
                <option value="1">Featured</option>
                <option value="0" selected="true">Un-featured</option>
                @endif
            </select>
        </div>  
    </div>  
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Product</button>
        <button type="reset" class="btn">Cancel</button>
    </div>
</fieldset>
{!! Form::close() !!}
<script type="text/javascript">
    document.forms['edit_product'].elements['manufacturer_id'].value={{$product_info->manufacturer_id}};
    document.forms['edit_product'].elements['category_id'].value={{$product_info->category_id}};
    document.forms['edit_product'].elements['sub_category_id'].value={{$product_info->sub_category_id}};
    document.forms['edit_product'].elements['nested_category_id'].value={{$product_info->nested_category_id}};
</script>
@endsection

