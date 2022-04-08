<?php

namespace App\Services;

use App\Models\Position;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PositionService
{
    public function getAllPositions()
    {
        return Position::get();
    }

    public function createPositions($request)
    {
        return Position::create($request);
    }

    public function updatePositions($request, $id)
    {
        unset($request['_token']);
        return Position::where('id', $id)->update($request);
    }

    public function deletePositions($id)
    {
        return Position::where('id', $id)->delete();
    }

}
