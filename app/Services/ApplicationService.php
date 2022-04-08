<?php

namespace App\Services;

use App\Models\Application;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ApplicationService
{
    public function getAllApplications()
    {
        return Application::get();
    }

    public function getApplicationbyId($id)
    {
        return Application::where('id', $id)->first();
    }

    public function getApplicationbyTransactionReference($trx)
    {
        return Application::where('reference', $trx)->first();
    }
    
    public function createApplication($request)
    {
        return Application::create($request);
    }

    public function updateStatus($txRef)
    {
        return Application::where('reference', $txRef)->update(['status'=> 1]);
    }

    public function arrangeData($request, $transaction_ref)
    {
        
        $data = $request;
        unset($data['attachment']);
        unset($data['image']);
        $data['reference'] = $transaction_ref;
        $data['status'] = 0; //not paid
       
        return $data;
    }

    public function paidApplications()
    {
        return Application::where('status', 1)->get();
    }

    public function unpaidApplications()
    {
        return Application::where('status', 0)->get();
    }


}
