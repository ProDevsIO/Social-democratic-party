<?php

namespace App\Http\Controllers\Forms;

use App\Services\FormService;
use App\Services\FormPositionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function showForm()
    { 
        $formService = new FormService;
        $forms = $formService->getAllForms();
        return view('forms.form')->with(compact('forms'));
    }

    public function get_categories_for_form($id)
    {
        $formPositionService = new FormPositionService;
        $formPositions = $formPositionService->getUniqueCategoryByformId($id);
        $data = [];
        if($formPositions != false){
            foreach($formPositions as $position){
                $data[] = [
                    'id' => $position->category_id,
                    'name' => $position->category->name
                ];
            }
        }else{
            $data['status'] = false;
        }

        return $data;
    }

    public function get_positions_for_form($form_id, $category_id)
    {
        $formPositionService = new FormPositionService;
        $formPositions = $formPositionService->getPositionsByformId($form_id, $category_id);
        
        $data = [];
        if($formPositions != false){
            foreach($formPositions as $position){
                $data[] = [
                    'id' => $position->positon_id,
                    'name' => $position->position->name
                ];
            }
        }else{
            $data['status'] = false;
        }

        return $data;
    }
    
}
