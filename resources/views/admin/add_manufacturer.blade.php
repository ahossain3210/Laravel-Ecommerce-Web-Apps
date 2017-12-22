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
        <a href="#">Add Manufacturer </a>
    </li>
</ul>

{!! Form::open(['url'=>'/save-manufacturer','method'=>'post','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
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
            <label class="control-label" for="typeahead">Manufacturer Name</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" id="typeahead" required="required" name="manufacturer_name" data-provide="typeahead" data-items="4" >
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
                <select id="selectError" name="sub_cat_id">
                    <option>Select</option>
                    @foreach($sub_category_info as $v_cat)
                    <option value="{{$v_cat->id}}">{{$v_cat->name}}</option>
                    @endforeach
                </select>
            </div>  
        </div> 
        <div class="control-group hidden-phone">
            <label class="control-label" for="textarea2">Manufacturer Description</label>
            <div class="controls">
                <textarea class="cleditor" name="manufacturer_description" id="textarea2" rows="3"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"  for="selectError">Manufacturer Image</label>
            <div class="controls">
                <input type="file" name="manufacturer_image" multiple="multiple">
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
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
        </div>
    </fieldset>
{!! Form::close() !!}
@endsection

