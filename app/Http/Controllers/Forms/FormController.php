<?php

namespace App\Http\Controllers\Forms;

use App\Services\FormService;
use App\Services\StateService;
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
        $stateService = new StateService;
        $forms = $formService->getAllForms();
        $states =  $stateService->getAllStates();
        return view('forms.form')->with(compact('forms','states'));
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
                    'form_position_id' => $position->id,
                    'name' => $position->position->name,
                    'fee' => number_format($position->fee)
                ];
            }
        }else{
            $data['status'] = false;
        }

        return $data;
    }

    public function get_requirements_for_position($id)
    {
        $formPositionService = new FormPositionService;
        $formPositions = $formPositionService->getFormPositionsById($id);
        $data = [];
        if($formPositions != null){

                $data[] = [
                    'requirements' => $formPositions->requirements,
                ];
        
        }else{
            $data['status'] = false;
        }

        return $data;
    }

    public function get_Lga_by_state_id($id)
    {
        $stateService = new StateService;
       
        $lgas =  $stateService->getlgaByStateId($id); 
        $data = [];
        if(count($lgas) > 0){
            foreach($lgas as $lga){
                $data[] = [
                    'id' => $lga->id,
                    'name' => $lga->name,
                ];
            }
        }else{
            $data['status'] = false;
        }

        return $data;
    }
    
}
