<?php

namespace App\Services;

use App\Models\FormPosition;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormPositionService
{
    public function getAllFormPositions()
    {
        return FormPosition::get();
    }

    public function getAllFormPositionsByformId($id)
    {
        return FormPosition::where('form_id', $id)->get();
    }

    public function createFormPositions($request)
    {
     
        return FormPosition::create($request);
    }

}
