@extends('admin.admin_master')
@section('admin_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Add Sub-category</a></li>
</ul>
<div class="row-fluid sortable">
    
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            {!! Form::open(['url' => '/save-sub-category','method'=>'post','class'=>'form-horizontal','role'=>'form']) !!}
                <fieldset>
                        <h3 style="color:green">
                            <?php
                            $confirm_message=Session::get('confirm_message');
                            if($confirm_message)
                            {
                                echo $confirm_message;
                                Session::put('confirm_message',null);
                            }
                            ?>
                        </h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Sub-category Name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="selectError3">Parent Category</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id">
                                <option selected="">Select</option>
                                @foreach($category_info as $v_category)
                                <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option selected="">Select</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save Sub-category</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            {!! Form::close() !!}  

        </div>
    </div><!--/span-->

</div>
@endsection