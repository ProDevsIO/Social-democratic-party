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
}
