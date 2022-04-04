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

}
