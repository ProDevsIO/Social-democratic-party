<?php

namespace App\Services;

use App\Models\ApplicationPayment;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ApplicationPaymentService
{
    public function getPayments()
    {
        return ApplicationPayment::get();
    }

    public function getPaymentbyId($id)
    {
        return ApplicationPayment::where('id', $id)->first();
    }
    
    public function createApplicationPayment($request)
    {
        return ApplicationPayment::create($request);
    }

    public function updateApplicationPaymentChargeId($app_id,$charge_id )
    {
        return ApplicationPayment::where('application_id', $app_id)->update([
                'charge_id' => $charge_id
        ]);
    }

    public function arrangeData($app,$fee,$request)
    {
        $data = [
                    'application_id' => $app->id,
                    'price' => $fee,
                    'amount_paid'=> $fee,
                    'quantity'=> 1, 
                    'currency' => 'NG'
                ];

        if(isset($request['charge_type']))
        {
            $data['charge_type'] = $request['charge_type'] ;
        }

        return $data;
    }


}
