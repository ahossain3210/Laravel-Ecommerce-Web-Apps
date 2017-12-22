<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $latest_product=DB::table('tbl_product')
                ->orderBy('product_id','DESC')
                ->take(10)
                ->get();
        
        $slider = view('pages.slider');
        
        $home_content = view('pages.home_content')
                ->with('latest_product',$latest_product);
        
        $product_brand = view('pages.product_brand');
//        $from_the_blog = view('pages.from_the_blog');
        $adds = view('pages.adds');
        $add = view('pages.add');

//        $sub_category_info=DB::table('tbl_sub_category')
//                ->where('publication_status',1)
//                ->get();
//        echo"</pre>";
//        print_r($sub_category_info);
//        exit();

        return view('master')
                ->with('slider', $slider)
                ->with('content', $home_content)
                ->with('product_brand', $product_brand)
                
                ->with('title', $home_content)
                ->with('add', $add)
                ->with('adds', $adds);
    }

    public function contact()
    {
        $sidebar=view('pages.sidebar');
        $contact_page=view('pages.contact')
                ->with('sidebar',$sidebar);
        
        return view('master')
            ->with('content',$contact_page);
    }

    public function product_details($product_id) {
        
        $product_info_by_id = DB::table('tbl_product')
                ->where('tbl_product.product_id',$product_id)
                ->join('tbl_manufacturer','tbl_product.manufacturer_id','=','tbl_manufacturer.manufacturer_id')
                ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                ->select('tbl_product.*','tbl_manufacturer.manufacturer_name','tbl_category.category_name')
                ->first();
        
//        echo '<pre>';
//        print_r($product_info_by_id);
//        exit();

        $product_details = view('pages.product_details')
                ->with('product_info', $product_info_by_id);

        return view('master')
                        ->with('content', $product_details)
                        ->with('title', $product_details);
    }

    public function all_products() {
        $product_info = DB::table('tbl_product')
                ->orderBy('product_id','DESC')
                ->get();
        $all_publish_manufacturer_info=DB::table('tbl_manufacturer')
                ->where('publication_status',1)
                ->orderBy('manufacturer_id','ASC')
                ->get();
        $all_products = view('pages.all_products')
                ->with('product_info', $product_info)
                ->with('all_publish_manufacturer_info', $all_publish_manufacturer_info);

        return view('master')
                ->with('content', $all_products);
    }

    public function category_product($category_id) {
        $product_info_by_category_id = DB::table('tbl_product')
                ->where('category_id', $category_id)
                ->get();
//        $product_info_by_category_id=$product_info->category_id;
        $manufacturer_info = DB::table('tbl_manufacturer')
                ->where('category_id', $category_id)
                ->where('publication_status', 1)
                ->get();

        $category_product = view('pages.category_product')
                ->with('product_info', $product_info_by_category_id)
                ->with('manufacturer_info', $manufacturer_info);

        return view('master')
                        ->with('content', $category_product);
    }

    public function nested_category_product($nested_category_id) {
        $product_info_by_nested_id = DB::table('tbl_product')
                ->join('tbl_nested_category', 'tbl_product.nested_category_id', '=', 'tbl_nested_category.nested_category_id')
                ->select('tbl_product.*', 'tbl_nested_category.nested_category_name')
                ->where('tbl_product.nested_category_id', $nested_category_id)
                ->get();
        
//        echo "</pre>";
//        print_r($product_info_by_nested_id);
//        exit();

        $nested_category_info=DB::table('tbl_nested_category')
                ->where('nested_category_id',$nested_category_id)
                ->first();
        $nested_category_product = view('pages.nested_category_product')
                ->with('product_info', $product_info_by_nested_id)
                ->with('nested_category_info', $nested_category_info);
//                ->with('manufacturer_info',$manufacturer_info);

        return view('master')
                        ->with('content', $nested_category_product)
                        ->with('title', $nested_category_product);
    }
    public function manufacturer_product($manufacturer_id)
    {
        $manufacturer_info=DB::table('tbl_manufacturer')
                ->where('manufacturer_id',$manufacturer_id)
                ->first();
        $manufacturer_product_info=DB::table('tbl_product')
//                ->join('tbl_manufacturer','tbl_product.manufacturer_id','=','tbl_manufacturer.manufacturer_id')
//                ->select('tbl_product.*','tbl_manufacturer.manufacturer_name','tbl_product_image.*')
                ->where('manufacturer_id',$manufacturer_id)
                ->get();
        
//        echo "<pre>";
//        print_r($manufacturer_product_info);
//        exit();
        
        $manufacturer_product=  view('pages.manufacturer_product')
                ->with('manufacturer_info',$manufacturer_info)
                ->with('manufacturer_product_info',$manufacturer_product_info);
        return view('master')
             ->with('manufacturer_product',$manufacturer_product);
    }
    public function search_product(Request $request)
    {
        $search_item=$request->search_item;
        $search_product_item=DB::table('tbl_product')
                ->where('product_name','like','%'.$search_item.'%')
                ->get();
        
//        echo '<pre>';
//        print_r($search_product);
//        exit();
        
        
//        if($search_product_item==NULL)
//        {
//            $empty_search_product=view('pages.empty_search_product');
//            
//            return view('master')
//                ->with('content',$empty_search_product);
//            
//        }
//        else {
//            $search_product=$search_product_item;
            
            $search_product_page=view('pages.search_product')
                        ->with('search_product',$search_product_item);
        
            return view('master')
                ->with('content',$search_product_page);
            
    }
    public function new_collection()
    {
        $new_collection=DB::table('tbl_product')
                ->orderBy('product_id','DESC')
                ->take(33)
                ->get();
        
        $new_collection_page=view('pages.new_collection')
                ->with('new_collection',$new_collection);
        return view('master')
            ->with('content',$new_collection_page);
    }
    public function tshirt_collection()
    {
        $tshirt_info = DB::table('tbl_product')
                ->where('tbl_product.nested_category_id', 4)
                ->orderBy('product_id','DESC')
                ->get();
        
        $tshirt_page=view('pages.tshirt')
                ->with('tshirt_info',$tshirt_info);
        return view('master')
            ->with('content',$tshirt_page);
    }
    public function mobile_collection()
    {
        $mobile_info=DB::table('tbl_product')
            ->where('tbl_product.sub_category_id',2)
            ->orderBy('product_id','DESC')
            ->get();
        
        $mobile_collection_page=view('pages.mobile')
                ->with('mobile_info',$mobile_info);
        return view('master')
            ->with('content',$mobile_collection_page);
    }
    public function panjabi_collection()
    {
        $panjabi_info=DB::table('tbl_product')
            ->where('tbl_product.nested_category_id',5)
            ->orderBy('product_id','DESC')
            ->get();
        
        $panjabi_collection_page=view('pages.panjabi_collection')
                ->with('panjabi_info',$panjabi_info);
        return view('master')
            ->with('content',$panjabi_collection_page);
    }
    public function man_products()
    {
        $men_product_info=DB::table('tbl_product')
            ->where('tbl_product.sub_category_id',1)
            ->orderBy('product_id','DESC')
            ->get();
        
        $men_collection_page=view('pages.men_collection')
                ->with('mans_product_info',$men_product_info);
        return view('master')
            ->with('content',$men_collection_page);
    }
    public function woman_products()
    {
        $women_product_info=DB::table('tbl_product')
            ->where('tbl_product.sub_category_id',4)
            ->orderBy('product_id','DESC')
            ->get();
        
        $women_collection_page=view('pages.women_collection')
                ->with('womans_product_info',$women_product_info);
        return view('master')
            ->with('content',$women_collection_page);
    }
    public function manufacturers()
    {
        $all_manufacturer=DB::table('tbl_manufacturer')
                ->get();
        
        
        $manufacturer_page=view('pages.manufacturers')
                ->with('all_manufacturer',$all_manufacturer);
        
        $sidebar=view('pages.sidebar');
        
        return view('master')
            ->with('sidebar',$sidebar)
            ->with('content',$manufacturer_page);
    }
    public function wishlist()
    {
        $contents=Cart::content();
        
        $sidebar=view('pages.sidebar');
        
        $wishlist_page=view('pages.wish_list')
                ->with('sidebar',$sidebar)
                ->with('contents',$contents);
        
        
        return view('master')
//            ->with('sidebar',$sidebar)
            ->with('content',$wishlist_page);
    }
    public function order_list()
    {
        $customer_id=Session::get('customer_id');
//        echo $customer_id;
//        exit();
        $order_info=DB::table('tbl_order')
                ->where('tbl_order.customer_id',$customer_id)
                ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
                ->select('tbl_order.*','tbl_order_details.*','tbl_payment.*')
                ->get();
        
        $orderlist_page=view('pages.order_list')
                ->with('order_info',$order_info);
        
        return view('master')
            ->with('content',$orderlist_page);
    }

    public function save_message(Request $request)
    {
        $data=array();
        
        $data['c_name']=$request->c_name;
        $data['c_email']=$request->c_email;
        $data['c_message']=$request->c_message;
        
//        echo '<pre>';
//        print_r($data);
//        exit();
        
        DB::table('tbl_message')->insert($data);
        
        
        Session::put('message','Your message sent successfully. We will reach you soon.');
        
        return redirect::to('/contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
