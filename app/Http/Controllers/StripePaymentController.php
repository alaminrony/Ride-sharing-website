<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\DriverPaymentInfo;
use App\PassengerPaymentInfo;

class StripePaymentController extends Controller {

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe() {
        return view('stripe.cardAdd');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request) {
//         echo "<pre>";print_r($request->all());exit;
        $previousUrl = explode('?', url()->previous())[1];
        $cus_id_string = explode('&', $previousUrl)[0];
        $cus_type_string = explode('&', $previousUrl)[1];

        $cus_id = explode('=', $cus_id_string)[1];
        $cus_type = explode('=', $cus_type_string)[1];

        // echo "<pre>";print_r($cus_id);
        
         if ($cus_type == '1') {
            $description = 'Driver id is: '.$cus_id;
         } else {
              $description = 'Passenger id is: '.$cus_id;
         }

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create([
                    'email' => $request->email,
                    'description' => $description,
                    'source' => $request->stripeToken
        ]);

        // echo "<pre>";print_r($customer);exit;
//        $intent = \Stripe\PaymentIntent::create([
//                    'amount' => 1099,
//                    'currency' => 'usd',
//                    'customer' => $customer->id,
//        ]);
//        $card = Stripe\Stripe::createSource(
//                $customer->id,
//                ['source' => $request->stripeToken]
//        );
        $actionType = 'create';
        return $this->fetchCard($customer, $cus_id, $cus_type, $actionType);


//        Stripe\Charge::create([
//            "amount" => 100 * 100,
//            "currency" => "usd",
//            "source" => $request->stripeToken,
//            "description" => "Test payment by alamin rony"
//        ]);
    }

    public function stripeThanks() {
        return view('stripe.thanks');
    }

    public function stripeFailed() {
        return view('stripe.failed');
    }
    public function canceledStripe() {
        return view('stripe.canceled');
    }

    public function stripeCardEdit() {
        return view('stripe.updateCard');
    }

    public function stripeCardUpdate(Request $request) {
        $previousUrl = explode('?', url()->previous())[1];
        $cus_id_string = explode('&', $previousUrl)[0];
        $cus_type_string = explode('&', $previousUrl)[1];

        $cus_id = explode('=', $cus_id_string)[1];
        $cus_type = explode('=', $cus_type_string)[1];

        if ($cus_type == '1') {
            $cusInfo = DriverPaymentInfo::where('driver_id', $cus_id)->first();
        } else {
            $cusInfo = PassengerPaymentInfo::where('passenger_id', $cus_id)->first();
        }


        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::update($cusInfo->customer_stripe_id, [
                    'email' => $request->email,
                    'source' => $request->stripeToken,
        ]);

        $actionType = 'update';

        return $this->fetchCard($customer, $cus_id, $cus_type, $actionType);
    }

    public function stripeChargeAdd() {

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = \Stripe\Charge::create(array(
                    'customer' => 'cus_JJ4jFAsmhQAywx',
                    'amount' => 3000,
                    'currency' => 'usd'
        ));

        if ($charge) {
            return response()->json(['response' => 'success', 'message' => 'Charge has benn added successfully']);
        }
    }

    public function fetchCard($customer, $cus_id, $cus_type, $actionType) {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $card = $stripe->customers->retrieveSource(
                $customer->id,
                $customer->default_source,
                []
        );


        if ($card) {
            if ($actionType == 'create' && $cus_type == '1') {
                $addInfo = new DriverPaymentInfo;
            } else if ($actionType == 'update' && $cus_type == '1') {
                $addInfo = DriverPaymentInfo::where('driver_id', $cus_id)->first();
            }


            if ($actionType == 'create' && $cus_type == '2') {
                $addInfo = new PassengerPaymentInfo;
            } else if ($actionType == 'update' && $cus_type == '2') {
                $addInfo = PassengerPaymentInfo::where('passenger_id', $cus_id)->first();
            }
            
            if($cus_type == '1'){
                $addInfo->driver_id = $cus_id;
            }else{
                $addInfo->passenger_id = $cus_id;
            }
            
            $addInfo->card_type = $card->brand;
            $addInfo->card_holder_email = $card->name;
            $addInfo->customer_stripe_id = $card->customer;
            $addInfo->stripe_card_id = $card->id;
            $addInfo->card_last_4_digit = $card->last4;
            $addInfo->expire_month = $card->exp_month;
            $addInfo->expire_year = $card->exp_year;
            $addInfo->expire_year = $card->exp_year;
            if ($addInfo->save()) {

                if ($cus_type == '1') {
                    $saveResponse = DriverPaymentInfo::findOrFail($addInfo->id);
                } else {
                    $saveResponse = PassengerPaymentInfo::findOrFail($addInfo->id);
                }
                $saveResponse->response_code = $addInfo;

                if ($saveResponse->save()) {
                    if ($actionType == 'create') {
                        Session::flash('success', 'Your Card has been saved successfully!!');
                    } else if ($actionType == 'update') {
                        Session::flash('success', 'Your Card has been updated successfully!!');
                    }
                    return redirect('thanks-stripe');
                } else {
                    Session::flash('error', 'Something went wrong !!');
                    return redirect('failed-stripe');
                }
            }
        }
    }

}
