<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PaymentService
{
   
    function getFlutterwaveData($app,$price,$transaction_ref){

            $data = [
                //
                "tx_ref" => $transaction_ref,
                "amount" => $price,
                "currency" => "NGN",
                "redirect_url" => env('APP_URL', "https://uktraveltest.prodevs.io/") . "application/payment/confirmation",
                "customer" => [
                    'email' => $app->email,
                    'phonenumber' => $app->phone_no,
                    'name' => $app->first_name . " " . $app->last_name
                ],
                "customizations" => [
                    "title" => "Form Application payment"
                ]
            ];

        return $data;
    }

    public function processFL(array $request = [])
    {
        $ch = curl_init();
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: Bearer ' . env('RAVE_SECRET_KEY',"FLWSECK_TEST-516babb36b12f7f60ae0a118dcc9482a-X");
        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/payments");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        try {
            $server_output = json_decode($server_output);
            // dd($server_output);
            return $server_output->data->link;
        }catch (\Exception $e){
            dd(json_decode($server_output));
        }
    }

    public function confirm_flutterwave($txRef)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('RAV_VERIFY_URL', "https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            "txref=" . $txRef . "&SECKEY=" . env('RAVE_SECRET_KEY', 'FLWSECK_test-516babb36b12f7f60ae0a118dcc9482a-X')
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        return $response;
    }

    public function getTeflonhubData($request, $amount)
    {
        $data = [
            
            "public_key"=>  env('BEMA_TEST_PUBLIC_KEY',"FLWSECK_TEST-516babb36b12f7f60ae0a118dcc9482a-X"),
            "charge_type"=>"card",
            "transaction_reference"=>"2URIO090OPNRYUR0120L045",
            "email"=> $request->email,
            "amount"=> $amount,
            "currency"=>"NGN",
            "medium"=>"web",
            "redirect_url"=>"https://bemaswitch-beta-prod.herokuapp.com/v1/charges/validate_redirect"
        ];

        return $request;
       
    }

    public function initiateTeflonhubCharge()
    {
        $ch = curl_init();
        $headr = array();
        $headr[] = 'Content-type: application/json';
    
        curl_setopt($ch, CURLOPT_URL, "http://dashboard.teflonhub.com/v1/charges/initiate");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        try {
           return $server_output = json_decode($server_output);
          
        }catch (\Exception $e){
            return $server_output;
        }
    }

    public function getTeflonhubAuthoriseData($request, $amount)
    {
        $data =[
            "public_key"=>  "bspk_test_fc4f7bb0b4",
            "charge_type"=>"card",
            "uuid"=> $request->uuid ?? "KAS530243421BC245574FC4",
            "card_number" => $request->card,
            "expiry_month" => $request->month,
            "expiry_year" => $request->year,
            "card_expiry" => $request->expire,
            "cvv"=> $request->cvv,
            "suggested_auth"=> "PIN",
            "pin" => $request->pin          
        ];

        return $data; 
    }

    public function TeflonhubPayAuthorise($request, $amount)
    {
        $ch = curl_init();
        $headr = array();
        $headr= [
            
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Encoding: gzip, deflate',
            'Cache-Control: no-cache',
            'Content-Type: application/json'
        ];
        curl_setopt($ch, CURLOPT_URL,"https://dashboard.teflonhub.com/v1/charges/authorize");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POST, 1);
        if(env('APP_ENV') == "local"){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
      
        curl_close($ch);
    
        try {
            return $server_output = json_decode($server_output); 
         }catch (\Exception $e){
             return $server_output;
         }
    }

}
