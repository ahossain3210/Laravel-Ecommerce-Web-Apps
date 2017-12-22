<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $admin_id = Session::get('admin_id');
//        echo $admin_id;
        if ($admin_id == null) {
            return Redirect::to('/admin')->send();
        }

        $admin_home_content = view('admin.admin_home_content');

        return view('admin.admin_master')
                        ->with('admin_content', $admin_home_content);
    }

    public function logout() {
        Session::put('admin_id', null);
        Session::put('admin_name', null);

        Session::put('logout_mes', 'Your are successfully logouted !');
        return Redirect::to('/admin');
    }

    /* ............ Category Management Start Here.............. */

    public function add_category() {
        $category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();

        $add_catgory = view('admin.add_category')
                ->with('category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $add_catgory);
    }

    public function save_category(Request $request) {
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;


        DB::table('tbl_category')->insert($data);

        Session::put('confirm_message', 'Save Category Successfully');


        return Redirect::to('/add-category');
    }

    public function manage_category() {
        $category_info = DB::table('tbl_category')->get();

        $manage_catgory = view('admin.manage_category')
                ->with('category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_catgory);
    }

    public function unpublish_category($category_id) {
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-category');
    }

    public function publish_category($category_id) {
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-category');
    }

    public function delete_category($category_id) {
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->delete();

        return Redirect::to('/manage-category');
    }

    public function edit_category($category_id) {

        $category_info_by_id = DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->first();

        $edit_catgory = view('admin.edit_category')
                ->with('category_info', $category_info_by_id);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_catgory);
    }

    public function update_category(Request $request) {
        $data = array();

        $category_id = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);

        Session::put('message', 'Update Category Successfully !');

        return Redirect::to('/manage-category');
    }

    /* ............ Category Management End Here.............. */



    /* ............ Sub Category Management Start Here.............. */

    public function add_sub_category() {
        $category_info = DB::table('tbl_category')->get();


        $add_sub_catgory = view('admin.add_sub_category')
                ->with('category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $add_sub_catgory);
    }

    public function save_sub_category(Request $request) {
        $data = array();

        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['publication_status'] = $request->publication_status;


        DB::table('tbl_sub_category')->insert($data);

        Session::put('confirm_message', 'Save Sub-category Successfully');


        return Redirect::to('/add-sub-category');
    }

    public function manage_sub_category() {
        $sub_cat_info = DB::table('tbl_sub_category')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_sub_category.category_id')
                ->select('tbl_sub_category.*', 'tbl_category.category_name')
                ->get();

        $manage_sub_category = view('admin.manage_sub_category')
                ->with('sub_cat_info', $sub_cat_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_sub_category);
    }

    public function unpublish_sub_category($id) {
        DB::table('tbl_sub_category')
                ->where('id', $id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-sub-category');
    }

    public function publish_sub_category($id) {
        DB::table('tbl_sub_category')
                ->where('id', $id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-sub-category');
    }

    public function delete_sub_category($id) {
        DB::table('tbl_sub_category')
                ->where('id', $id)
                ->delete();

        return Redirect::to('/manage-sub-category');
    }

    public function edit_sub_category($id) {

        $sub_category_info_by_id = DB::table('tbl_sub_category')
                ->where('id', $id)
                ->first();
        $category_info = DB::table('tbl_category')->get();

        $edit_sub_category = view('admin.edit_sub_category')
                ->with('cat_info', $sub_category_info_by_id)
                ->with('category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_sub_category);
    }

    public function update_sub_category(Request $request) {
        $data = array();

        $id = $request->id;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['publication_status'] = $request->publication_status;


        DB::table('tbl_sub_category')
                ->where('id', $id)
                ->update($data);

        Session::put('confirm_message', 'Save Data Successfully !');


        return Redirect::to('/add-sub-category');
    }

    /* ............ Sub Category Management End Here.............. */



    /* ............ Manufacturer Management Start Here.............. */

    public function add_manufacturer() {
        $publish_category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $publish_sub_category_info = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();

        $add_manufacturer = view('admin.add_manufacturer')
                ->with('category_info', $publish_category_info)
                ->with('sub_category_info', $publish_sub_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $add_manufacturer);
    }

    public function save_manufacturer(Request $request) {
        $data = array();
        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['manufacturer_description'] = $request->manufacturer_description;
        $data['publication_status'] = $request->publication_status;

//        echo "<pre";
//        print_r($data);
//        exit();

        $image = $request->file('manufacturer_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'Manufacturer_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['manufacturer_image'] = $image_url;

                DB::table('tbl_manufacturer')->insert($data);



                Session::put('message', 'Save Manufacturer Successfully !');

                return Redirect::to('/add-manufacturer');
            } else {
                DB::table('tbl_manufacturer')->insert($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/add-manufacturer');
            }
        }
    }

    public function manage_manufacturer() {
        $manufacturer_info = DB::table('tbl_manufacturer')
                ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_manufacturer.category_id')
                ->join('tbl_sub_category', 'tbl_sub_category.id', '=', 'tbl_manufacturer.sub_cat_id')
                ->select('tbl_manufacturer.*', 'tbl_category.category_name', 'tbl_sub_category.name')
                ->get();

//        echo"<pre>";
//        print_r($manufacturer_info);
//        exit();

        $manage_manufacturer = view('admin.manage_manufacturer')
                ->with('manufacturer_info', $manufacturer_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_manufacturer);
    }

    public function unpublish_manufacturer($manufacturer_id) {
        DB::table('tbl_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-manufacturer');
    }

    public function publish_manufacturer($manufacturer_id) {
        DB::table('tbl_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-manufacturer');
    }

    public function delete_manufacturer($manufacturer_id) {
        DB::table('tbl_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->delete();

        return Redirect::to('/manage-manufacturer');
    }

    public function edit_manufacturer($manufacturer_id) {

        $manufacturer_info_by_id = DB::table('tbl_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->first();
        $category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $sub_category_info = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();

        $edit_manufacturer = view('admin.edit_manufacturer')
                ->with('category_info', $category_info)
                ->with('sub_category_info', $sub_category_info)
                ->with('manufacturer_info', $manufacturer_info_by_id);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_manufacturer);
    }

    public function update_manufacturer(Request $request) {
        $data = array();
        $mid = $request->manufacturer_id;
        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['manufacturer_description'] = $request->manufacturer_description;
        $data['publication_status'] = $request->publication_status;

//        echo "<pre";
//        print_r($data);
//        exit();

        $image = $request->file('manufacturer_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'Manufacturer_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {

//                File::delete($upload_path,$image_full_name);

                $data['manufacturer_image'] = $image_url;
                DB::table('tbl_manufacturer')
                        ->where('manufacturer_id', $mid)
                        ->update($data);
                @unlink($request->manufacturer_old_image);
                
                Session::put('message', 'Save Manufacturer Successfully !');

                return Redirect::to('/manage-manufacturer');
            } else {
                DB::table('tbl_manufacturer')
                        ->where('manufacturer_id', $mid)
                        ->update($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/manage-manufacturer');
            }
        }
    }

    /* ............ Manufacturer Management End Here.............. */

    /* ............ Nested Category Management Start Here.............. */

    public function add_nested_category() {
        $publish_category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $publish_sub_category_info = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();
        $publish_manufacturer_info = DB::table('tbl_manufacturer')
                ->where('publication_status', 1)
                ->get();

        $add_nested_category = view('admin.add_nested_category')
                ->with('category_info', $publish_category_info)
                ->with('manufacturer_info', $publish_manufacturer_info)
                ->with('sub_category_info', $publish_sub_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $add_nested_category);
    }

    public function save_nested_category(Request $request) {
        $data = array();
        $data['nested_category_name'] = $request->nested_category_name;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['publication_status'] = $request->publication_status;

//        echo"</pre>";
//        print_r($data);
//        exit();

        DB::table('tbl_nested_category')->insert($data);


        Session::put('message', 'Save Nested Category Successfully !');

        return Redirect::to('/add-nested-category');
    }

    public function manage_nested_category() {
        $nested_category_info = DB::table('tbl_nested_category')
                ->join('tbl_category', 'tbl_nested_category.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_sub_category', 'tbl_nested_category.sub_category_id', '=', 'tbl_sub_category.id')
                ->join('tbl_manufacturer', 'tbl_nested_category.manufacturer_id', '=', 'tbl_manufacturer.manufacturer_id')
                ->select('tbl_nested_category.*', 'tbl_category.category_name', 'tbl_sub_category.name', 'tbl_manufacturer.manufacturer_name')
                ->get();

        $manage_nested_category = view('admin.manage_nested_category')
                ->with('nested_category_info', $nested_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_nested_category);
    }

    public function unpublish_nested_category($nested_category_id) {
        DB::table('tbl_nested_category')
                ->where('nested_category_id', $nested_category_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-nested-category');
    }

    public function publish_nested_category($nested_category_id) {
        DB::table('tbl_nested_category')
                ->where('nested_category_id', $nested_category_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-nested-category');
    }

    public function delete_nested_category($nested_category_id) {
        DB::table('tbl_nested_category')
                ->where('nested_category_id', $nested_category_id)
                ->delete();

        return Redirect::to('/manage-nested-category');
    }

    public function edit_nested_category($nested_category_id) {
        $publish_category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $publish_sub_category_info = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();
        $publish_manufacturer_info = DB::table('tbl_manufacturer')
                ->where('publication_status', 1)
                ->get();
        $nested_category_info_by_id = DB::table('tbl_nested_category')
                ->where('nested_category_id', $nested_category_id)
                ->first();

        $edit_nested_category = view('admin.edit_nested_category')
                ->with('category_info', $publish_category_info)
                ->with('manufacturer_info', $publish_manufacturer_info)
                ->with('nested_category_info', $nested_category_info_by_id)
                ->with('sub_category_info', $publish_sub_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_nested_category);
    }

    public function update_nested_category(Request $request) {
        $nested_category_id = $request->nested_category_id;

        $data = array();
        $data['nested_category_name'] = $request->nested_category_name;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['publication_status'] = $request->publication_status;

//        echo"</pre>";
//        print_r($data);
//        exit();

        DB::table('tbl_nested_category')
                ->where('nested_category_id', $nested_category_id)
                ->update($data);


        Session::put('message', 'Update Nested Category Successfully !');

        return Redirect::to('/manage-nested-category');
    }

    /* ............ Nested Category Management End Here.............. */


    /* ............ Product Management Start Here ............... */

    public function add_product() {
        $publish_category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $publish_sub_category_info = DB::table('tbl_sub_category')
                ->where('publication_status', 1)
                ->get();
        $publish_nested_category_info = DB::table('tbl_nested_category')
                ->where('publication_status', 1)
                ->get();
        $publish_manufacturer_info = DB::table('tbl_manufacturer')
                ->where('publication_status', 1)
                ->get();

        $add_product = view('admin.add_product')
                ->with('category_info', $publish_category_info)
                ->with('manufacturer_info', $publish_manufacturer_info)
                ->with('sub_category_info', $publish_sub_category_info)
                ->with('nested_category_info', $publish_nested_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $add_product);
    }

    public function save_product(Request $request) {
        $data = array();

        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['nested_category_id'] = $request->nested_category_id;
        $data['product_code'] = $request->product_code;
        $data['product_price'] = $request->product_price;
        $data['product_p_price'] = $request->product_p_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_description'] = $request->product_description;
        $data['feature_status'] = $request->feature_status;

//        echo"<pre>";
//        print_r($data);
//        exit();

        $image = $request->file('product_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'Product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;

                DB::table('tbl_product')->insert($data);



                Session::put('message', 'Save Product Successfully !');

                return Redirect::to('/add-product');
            } else {
                DB::table('tbl_product')->insert($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/add-product');
            }
        }
    }

    
public function manage_product()
{
    $product_info=DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_sub_category','tbl_product.sub_category_id','=','tbl_sub_category.id')
            ->join('tbl_nested_category','tbl_product.nested_category_id','=','tbl_nested_category.nested_category_id')
            ->join('tbl_manufacturer','tbl_product.manufacturer_id','=','tbl_manufacturer.manufacturer_id')
            ->select('tbl_product.*','tbl_category.category_name','tbl_sub_category.name','tbl_nested_category.nested_category_name','tbl_manufacturer.manufacturer_name')
            ->get();
//    echo '<pre>';
//    print_r($product_info);
//    exit();
    
    $manage_product=  view('admin.manage_product')
            ->with('product_info',$product_info); 
    return view('admin.admin_master')
            ->with('admin_content', $manage_product);
}

public function unfeature_product($product_id)
{
    DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update(['feature_status' => 0]);

        return Redirect::to('/manage-product');
}
public function feature_product($product_id)
{
    DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update(['feature_status' => 1]);

        return Redirect::to('/manage-product');
}
public function delete_product($product_id)
{
    DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->delete();
    return Redirect::to('/manage-product');
}
public function edit_product($product_id)
{
    $product_info_by_id=DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->first();
//    echo "<pre>";
//    print_r($product_info_by_id);
//    exit();
    
    $all_publish_manufacturer_info=DB::table('tbl_manufacturer')
            ->where('publication_status',1)
            ->get();
    $all_publish_category_info=DB::table('tbl_category')
            ->where('publication_status',1)
            ->get();
    $all_publish_sub_category_info=DB::table('tbl_sub_category')
            ->where('publication_status',1)
            ->get();
    $all_publish_nested_category_info=DB::table('tbl_nested_category')
            ->where('publication_status',1)
            ->get();
    
    $edit_product=view('admin.edit_product')
            ->with('product_info',$product_info_by_id)
            ->with('manufacturer_info',$all_publish_manufacturer_info)
            ->with('category_info',$all_publish_category_info)
            ->with('sub_category_info',$all_publish_sub_category_info)
            ->with('nested_category_info',$all_publish_nested_category_info);
    
    return view('admin.admin_master')
            ->with('edit_product',$edit_product);
}
public function update_product(Request $request) {
        
        $data = array();
        $product_id=$request->product_id;
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['nested_category_id'] = $request->nested_category_id;
        $data['product_code'] = $request->product_code;
        $data['product_price'] = $request->product_price;
        $data['product_p_price'] = $request->product_p_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_description'] = $request->product_description;
        $data['feature_status'] = $request->feature_status;

//        echo"<pre>";
//        print_r($data);
//        exit();


         $image = $request->file('product_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'Product_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;

                DB::table('tbl_product')
                        ->where('product_id',$product_id)
                        ->update($data);
                @unlink($request->product_old_image);

                Session::put('message', 'Update Product Successfully !');

                return Redirect::to('/manage-product');
            } else {
                DB::table('tbl_product')
                        ->where('product_id',$product_id)
                        ->update($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/manage-product');
            }
        }
    }




    /* ............ Product Management Start Here ............... */

    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
