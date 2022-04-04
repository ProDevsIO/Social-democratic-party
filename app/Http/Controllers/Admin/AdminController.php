<?php

namespace App\Http\Controllers\Admin;
use App\Services\FormService;
use App\Services\PositionService;
use App\Services\CategoriesService;
use App\Services\FormPositionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function view_forms()
    {
        $formService = new FormService;
        $forms = $formService->getAllForms();
        return view('admin.view_forms')->with(compact('forms'));
    }

    public function add_forms(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name' => "required",
            ]);

            $formService = new FormService;
            $forms = $formService->createForms($request->all());
            DB::commit();

            session()->flash('alert-success', "form created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
      
    }
    public function view_categories()
    {
        $categoryService = new CategoriesService;
        $categories = $categoryService->getAllCategory();
      
        return view('admin.view_categories')->with(compact('categories'));
    }

    public function add_categories(Request $request)
    {
      
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name' => "required",
            ]);

            $categoryService = new CategoriesService;
            $forms =  $categoryService->createCategory($request->all());
            DB::commit();

            session()->flash('alert-success', "Categeory created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
      
    }

    public function view_positions()
    {
       
        $positionService = new PositionService;
        $positions = $positionService->getAllPositions();
        return view('admin.view_positions')->with(compact('positions'));
    }

    public function add_positions(Request $request)
    {
      
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name' => "required",
            ]);

            $positionService = new PositionService;
            $positionService->createPositions($request->all());
            DB::commit();

            session()->flash('alert-success', "Position created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
      
    }

    public function view_form_positions($id)
    {
        $formPositionService = new FormPositionService;
        $positionService = new PositionService;
        $categoryService = new CategoriesService;
        $formService = new FormService;
        $form = $formService->getFormbyId($id);
        $formPositions = $formPositionService->getAllFormPositionsByformId($id);
        $positions = $positionService->getAllPositions();
        $categories = $categoryService->getAllCategory();
        return view('admin.view_form_positions')->with(compact('formPositions', 'positions', 'categories', 'form'));
    }

    public function add_form_positions(Request $request, $id)
    {
        
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'category_id' => "required",
                'positon_id' => "required",
                'fee' => "required|numeric|min:5000"
            ]);

            $request_data = $request->all();
            $request_data['form_id'] = $id;
          
            $formPositionService = new FormPositionService;
            $formPositionService->createFormPositions($request_data);
            DB::commit();

            session()->flash('alert-success', "form position created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
    }

}
