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

{!! Form::open(['url'=>'/update-manufacturer','method'=>'post','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
    <fieldset>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Manufacturer Name</label>
            <div class="controls">
                <input type="text" name="manufacturer_name" value="{{$manufacturer_info->manufacturer_name}}" class="span6 typeahead" id="typeahead" required="required" data-provide="typeahead" data-items="4" >
                <input type="hidden" name="manufacturer_id" value="{{$manufacturer_info->manufacturer_id}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="selectError">Category Name</label>
            <div class="controls">
                <select id="selectError" name="category_id">
                    @foreach($category_info as $v_category)
                    @if($v_category->category_id==$manufacturer_info->category_id)
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
                <select id="selectError" name="sub_cat_id">
                    @foreach($sub_category_info as $v_cat)
                    @if($v_cat->id==$manufacturer_info->sub_cat_id)
                    <option value="{{$v_cat->id}}" selected="">{{$v_cat->name}}</option>
                    @else 
                    <option value="{{$v_cat->id}}">{{$v_cat->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>  
        </div> 
        <div class="control-group hidden-phone">
            <label class="control-label" for="textarea2">Manufacturer Description</label>
            <div class="controls">
                <textarea class="cleditor" name="manufacturer_description" id="textarea2" rows="3">{{$manufacturer_info->manufacturer_description}}</textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"  for="selectError">Manufacturer Image</label>
            <div class="controls">
                <input type="file" name="manufacturer_image">
                <input type="hidden" name="manufacturer_old_image" value="{{$manufacturer_info->manufacturer_image}}">
                <img src="{{asset($manufacturer_info->manufacturer_image)}}" width="80px" height="30px">
            </div>     
        </div>     
        <div class="control-group">
            <label class="control-label" for="selectError">Publication Status</label>
            <div class="controls">
                <select id="selectError" name="publication_status">
                    @if($manufacturer_info->publication_status==1)
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
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
        </div>
    </fieldset>
{!! Form::close() !!}
@endsection

