<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_checkout()
    {
        
        $sidebar=view('pages.sidebar');
        
        $checkout=view('pages.checkout')
                ->with('sidebar',$sidebar);
        
        return view('master')
        ->with('content',$checkout);
    }
    public function save_customer(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=$request->customer_password;
        
//        echo "<pre>";
//        print_r($data);
//        exit();
        
        $customer_id=DB::table('tbl_customer')->insertGetId($data);
        
        Session::put('customer_id',$customer_id);
        
        return Redirect::to('/billing');
    }
    public function billing()
    {
        $sidebar=view('pages.sidebar');
        
        $billing=view('pages.billing')
                ->with('sidebar',$sidebar);
        
        return view('master')
        ->with('content',$billing);
    }
    public function save_billing(Request $request)
    {
        $data=array();
        
        $data['customer_id']=Session::get('customer_id');
        $data['company_name']=$request->company_name;
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['mobile_number']=$request->mobile_number;
        $data['customer_address']=$request->customer_address;
        $data['city']=$request->city;
        $data['country']=$request->country;
        $data['zip_code']=$request->zip_code;
        
//        echo "<pre>";
//        print_r($data);
//        exit();
        
        
        $billing_id=DB::table('tbl_billing')->insertGetId($data);
        
        Session::put('billing_id',$billing_id);
        
        return Redirect::to('/payment');
    }
    
    public function payment()
    {
        $payment=view('pages.payment');
        
        return view('master')
        ->with('content',$payment);
    }
    public function place_order(Request $request)
    {
        $payment_method=$request->payment_method;
//        echo $payment_method;
//        exit();
        $data=array();
        $data['payment_method']=$payment_method;
        $payment_id=DB::table('tbl_payment')->insertGetId($data);
        
         /* Save Order Here */
            
            $order_data=array();
            $order_data['customer_id']=Session::get('customer_id');
            $order_data['billing_id']=Session::get('billing_id');
            $order_data['payment_id']=$payment_id;
            $order_total=  str_replace(",", "",Cart::total());
            $order_data['order_total']=$order_total;
            
            $order_id=DB::table('tbl_order')->insertGetId($order_data);
            
            /* Save Order End */
            
            /* Save Order-Details Here */
            $oddata=array();
            $contents=Cart::content();
            foreach($contents as $v_content)
            {
                $oddata['order_id']=$order_id;
                $oddata['product_id']=$v_content->id;
                $oddata['product_name']=$v_content->name;
                $oddata['product_price']=$v_content->price;
                $oddata['product_sales_quantity']=$v_content->qty;
                
                DB::table('tbl_order_details')->insert($oddata);
                
            }
            
            /* Save Order-Details End */
        
        if($payment_method=='Paypal')
        {
           return view('pages.htmlWebsiteStandardPayment');
        }
        if($payment_method=='Cash_on_delivery')
        {
            Cart::destroy();
            
            return Redirect::to('/success-order');
        }
    }
    public function success_order()
    {
       $success_order=view('pages.success_order');
        return view('master')->with('content',$success_order);
        
    }
    public function customer_login_check(Request $request)
    {
        $customer_email=$request->customer_email;
        $customer_password=$request->customer_password;
        
        $result=DB::table('tbl_customer')
                ->where('tbl_customer.customer_email',$customer_email)
                ->where('tbl_customer.customer_password',$customer_password)
                ->join('tbl_billing','tbl_customer.customer_id','=','tbl_billing.customer_id')
                ->select('tbl_customer.*','tbl_billing.billing_id')
                ->first();
        
//        echo "</pre>";
//        print_r($result);
//        exit();
        
        if($result)
        {
            
            $customer_id=$result->customer_id;
            $customer_name=$result->customer_name;
            $billing_id=$result->billing_id;
            
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$customer_name);
            Session::put('billing_id',$billing_id);
            
            return Redirect::to('/');
        }
         else {
             Session::put('message','Email or Password Invalid !');
             return Redirect::to('/checkout');
         }
    }
    public function customer_logout()
    {
        Session::put('customer_id',null);
        Session::put('customer_name',null);
        
        return Redirect::to('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
