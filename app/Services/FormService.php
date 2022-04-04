<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormService
{
    public function getAllForms()
    {
        return Form::get();
    }

    public function createForms($request)
    {
     
        return Form::create($request);
    }

}
