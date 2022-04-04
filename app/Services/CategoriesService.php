<?php

namespace App\Services;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoriesService
{
    
    public function getAllCategory()
    {
        return Categories::get();
    }

    public function createCategory($request)
    {
        return Categories::create($request);
    }

}
