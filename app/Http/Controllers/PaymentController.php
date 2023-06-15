<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
    //

     public function Paymen($reference)
    {
    $curl = curl_init();
    $key='sk_test_3ec7e1532a394a9e974953b930e50cc61690c325';
  curl_setopt_array($curl, array(

    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_ENCODING => "",

    CURLOPT_MAXREDIRS => 10,
    CURLOPT_SSL_VERIFYHOST =>0,
    CURLOPT_SSL_VERIFYPEER =>0,

    CURLOPT_TIMEOUT => 30,

    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    CURLOPT_CUSTOMREQUEST => "GET",

    CURLOPT_HTTPHEADER => array(

      "Authorization: Bearer $key",
      "Cache-Control: no-cache",

    ),

  ));

  $response = curl_exec($curl);

  $err = curl_error($curl);


  curl_close($curl);
 $ma= json_decode($response);

  if ($ma->status==true) {
    
    $email=$ma->data->customer->email;
    $amount= $ma->data->amount;
    $pa=new Payment();
    $pa->email=$email;
    $pa->amount=$amount;
    $pa->status='Approved';
    $pa->save();
     // Alert('success','payment success');
     return redirect()->intended('success');
  }
// Alert('warning','payment not success');
        // return $response;
return redirect()->back();

    }

    public function showpayment(){
        return view('payment.payment');
    }
}
