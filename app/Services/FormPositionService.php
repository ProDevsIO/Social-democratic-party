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

    public function getFormPositionbyParams($form_id, $category_id, $position_id)
    {
        
        return FormPosition::where([
                                    'form_id' => $form_id,
                                    'category_id' => $category_id,
                                    'positon_id' => $position_id
                                    ])->first();
    }

    public function getAllFormPositionsByformId($id)
    {
        return FormPosition::where('form_id', $id)->get();
    }

    public function getFormPositionsById($id)
    {
        return FormPosition::where('id', $id)->first();
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

   public function updateFormPositions($request,$id)
   {
    unset($request['_token']);
       return FormPosition::where('id', $id)->update($request);
   }

   public function deleteFormPositions($id)
   {
       return FormPosition::where('id', $id)->delete();
   }

}
