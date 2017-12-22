@extends('admin.admin_master')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Products</a></li>
</ul>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product Table</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Nested Category</th>
                        <th>Manufacturer</th>
                        <th>Price</th>
                        <th>Status</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    
                        @foreach($product_info as $v_product)
                        
                    <tr>
                        <td>{{$v_product->product_id}}</td>
                        <td><img src="{{URL::to($v_product->product_image)}}" width="80" height="40"></td>
                        <td class="center">{{$v_product->product_name}}</td>
                        <td class="center">{{$v_product->category_name}}</td>
                        <td class="center">{{$v_product->name}}</td>
                        <td class="center">{{$v_product->nested_category_name}}</td>
                        <td class="center">{{$v_product->manufacturer_name}}</td>
                        <td class="center">Tk.{{$v_product->product_price}}</td>
                        <td class="center">
                            @if($v_product->feature_status==1)
                            <span class="label label-success">Feature</span>
                            @else
                            <span class="label label-important">Unfeature</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_product->feature_status==1)
                            <a class="btn btn-danger" href="{{URL::to('/unfeature-product/'.$v_product->product_id)}}" title="Unfeature">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                            @else
                            <a class="btn btn-success" href="{{URL::to('/feature-product/'.$v_product->product_id)}}" title="Feature">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                            @endif
                            <a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}" onclick="return checkDelete();" title="Delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>
@endsection