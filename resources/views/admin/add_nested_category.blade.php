@extends('admin.admin_master')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="#"></i>
        <a href="#">Dashboard</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add Nested-category </a>
    </li>
</ul>

{!! Form::open(['url'=>'/save-nested-category','method'=>'post','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
    <fieldset>
        <h3 style="color:green">
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
            <label class="control-label" for="typeahead">Nested-category Name</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" id="typeahead" required="required" name="nested_category_name" data-provide="typeahead" data-items="4" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="selectError">Manufacturer Name</label>
            <div class="controls">
                <select id="selectError" name="manufacturer_id">
                    <option>Select</option>
                    @foreach($manufacturer_info as $v_manufacturer)
                    <option value="{{$v_manufacturer->manufacturer_id}}">{{$v_manufacturer->manufacturer_name}}</option>
                    @endforeach
                </select>
            </div>  
        </div> 
        <div class="control-group">
            <label class="control-label" for="selectError">Category Name</label>
            <div class="controls">
                <select id="selectError" name="category_id">
                    <option>Select</option>
                    @foreach($category_info as $v_category)
                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                    @endforeach
                </select>
            </div>  
        </div> 
        <div class="control-group">
            <label class="control-label" for="selectError">Sub-category Name</label>
            <div class="controls">
                <select id="selectError" name="sub_category_id">
                    <option>Select</option>
                    @foreach($sub_category_info as $v_cat)
                    <option value="{{$v_cat->id}}">{{$v_cat->name}}</option>
                    @endforeach
                </select>
            </div>  
        </div>  
        <div class="control-group">
            <label class="control-label" for="selectError">Publication Status</label>
            <div class="controls">
                <select id="selectError" name="publication_status">
                    <option>select</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>  
        </div>  
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="reset" class="btn">Cancel</button>
        </div>
    </fieldset>
{!! Form::close() !!}
@endsection

