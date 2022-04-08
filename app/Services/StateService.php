<?php

namespace App\Services;

use App\Models\State;
use App\Models\Lga;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StateService
{
    public function getAllStates()
    {
        return State::get();
    }

    public function getlgaByStateId($id)
    {
        return Lga::where('state_id', $id)->get();  
    }

}
