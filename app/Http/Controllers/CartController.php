<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request)
    {
        $qty=$request->qty;
        $product_id=$request->product_id;
        $product_info=DB::table('tbl_product')
                ->where('product_id',$product_id)
                ->first();
//        echo"<pre>";
//        print_r($product_info);
//        exit();
        
        Cart::add(['id' =>$product_info->product_id, 'name' =>$product_info->product_name, 'qty' =>$qty, 'price' =>$product_info->product_price, 'options' => ['image' =>$product_info->product_image]]);
        
        return Redirect::to('/view-cart');
    }
    public function view_cart()
    {
        $contents = Cart::content();
        
        $sidebar=view('pages.sidebar');
        $cart_content = view('pages.cart')
            ->with('sidebar', $sidebar)
            ->with('contents', $contents);
        
        return view('master')
            ->with('content', $cart_content);
    }
    public function update_cart(Request $request)
    {
        $qty=$request->qty;
        $row_id=$request->row_id;
        
//        echo $qty;
//        echo "<br>";
//        echo $row_id;
        Cart::update($row_id,$qty);
        
        return Redirect::to('/view-cart');
    }
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        
        return Redirect::to('/view-cart');
    }
    public function delete_wishlist($rowId)
    {
        Cart::remove($rowId);
        
        return Redirect::to('/wishlist');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
