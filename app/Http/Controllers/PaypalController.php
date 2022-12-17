<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PaypalController extends Controller
{

    public  function donate(Request $request) {

        $request -> validate([
           'price' => 'required'
        ]);

        $data= [];

        $data['items'] = [
            [
                'name' => Setting::first()->display_name(),
                'price' => $request -> price,
                'description' => 'نْ تُبْدُوا الصَّدَقَاتِ فَنِعِمَّا هِيَ وَإِنْ تُخْفُوهَا وَتُؤْتُوهَا الْفُقَرَاءَ فَهُوَ خَيْرٌ لَكُمْ وَيُكَفِّرُ عَنْكُمْ مِنْ سَيِّئَاتِكُمْ وَاللَّهُ بِمَا تَعْمَلُونَ خَبِيرٌ',
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request -> price;


        $provider = new ExpressCheckout;

        $response = $provider -> setExpressCheckout($data);

        $response  = $provider -> setExpressCheckout($data,true);

        return redirect($response['paypal_link']);
    }

    public function payment() {
        $data= [];


            $data['items'] = [
                [
                    'name' => 'apple',
                    'price' => 100,
                    'description' => 'macbook pro 14',
                    'qty' => 1
                ]
            ];

            $data['invoice_id'] = 1;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');
            $data['total'] = 100;


        $provider = new ExpressCheckout;

        $response = $provider -> setExpressCheckout($data);

        $response  = $provider -> setExpressCheckout($data,true);

        return redirect($response['paypal_link']);

    }

    public function cancel() {
        dd('your payment is canceled');
    }

    public function success(Request $request) {
        $provider = new ExpressCheckout;
        $response = $provider -> getExpressCheckoutDetails($request -> token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return view('payment-success');
        }

        dd('please try again later.');

    }


}
