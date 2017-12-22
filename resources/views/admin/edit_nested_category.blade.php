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
        <a href="#">Edit Nested-category </a>
    </li>
</ul>

{!! Form::open(['url'=>'/update-nested-category','method'=>'post','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="typeahead">Nested-category Name</label>
            <div class="controls">
                <input type="text" name="nested_category_name" value="{{$nested_category_info->nested_category_name}}" class="span6 typeahead" id="typeahead" required="required" data-provide="typeahead" data-items="4" >
                <input type="hidden"  name="nested_category_id" value="{{$nested_category_info->nested_category_id}}" class="span6 typeahead" id="typeahead" required="required" data-provide="typeahead" data-items="4" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="selectError">Manufacturer Name</label>
            <div class="controls">
                <select id="selectError" name="manufacturer_id">
                    <option>Select</option>
                    @foreach($manufacturer_info as $v_manufacturer)
                    @if($v_manufacturer->manufacturer_id==$nested_category_info->manufacturer_id)
                    <option value="{{$v_manufacturer->manufacturer_id}}" selected="true">{{$v_manufacturer->manufacturer_name}}</option>
                    @else
                    <option value="{{$v_manufacturer->manufacturer_id}}">{{$v_manufacturer->manufacturer_name}}</option>
                    @endif
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
                    @if($v_category->category_id==$nested_category_info->category_id)
                    <option value="{{$v_category->category_id}}" selected="">{{$v_category->category_name}}</option>
                    @else
                    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                    @endif
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
                    @if($v_cat->id==$nested_category_info->sub_category_id)
                    <option value="{{$v_cat->id}}" selected="">{{$v_cat->name}}</option>
                    @else
                    <option value="{{$v_cat->id}}">{{$v_cat->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>  
        </div>  
        <div class="control-group">
            <label class="control-label" for="selectError">Publication Status</label>
            <div class="controls">
                <select id="selectError" name="publication_status">
                    @if($nested_category_info->publication_status==1)
                    <option value="1" selected="">Published</option>
                    <option value="0">Unpublished</option>
                    @else
                    <option value="1">Published</option>
                    <option value="0" selected="">Unpublished</option>
                    @endif
                </select>
            </div>  
        </div>  
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Info</button>
            <button type="reset" class="btn">Cancel</button>
        </div>
    </fieldset>
{!! Form::close() !!}
@endsection

