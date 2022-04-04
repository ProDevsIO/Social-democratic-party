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

    public function getUniqueCategoryByformId($id)
    {
        $form =  FormPosition::where('form_id', $id)->get();
        if(count($form) > 0) {
         return $form->unique('category_id');;
        }else{
            return false;
        }
    }

    public function getPositionsByformId($form_id, $category_id)
    {
        return FormPosition::where([
                                    'form_id' => $form_id,
                                    'category_id' => $category_id
                                    ])->get();
    }

    public function createFormPositions($request)
    {
        return FormPosition::create($request);
    }

}
