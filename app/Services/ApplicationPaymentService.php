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
        return Application::where('id', $id)->first();
    }
    
    public function createApplicationPayment($request)
    {
        return ApplicationPayment::create($request);
    }

    public function arrangeData($app,$fee)
    {
        $data = [
                    'application_id' => $app->id,
                    'price' => $fee,
                    'amount_paid'=> $fee,
                    'quantity'=> 1, 
                    'currency' => 'NG'
                ];
       
        return $data;
    }


}
