<?php

namespace App\Http\Controllers\Admin;

use App\Services\FormService;
use App\Services\ApplicationService;
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
        $formService = new FormService;
        $forms = $formService->getAllForms()->count();  
        $categoryService = new CategoriesService;
        $categories = $categoryService->getAllCategory()->count(); 
        $positionService = new PositionService;
        $positions = $positionService->getAllPositions()->count();
        $applicationService = new ApplicationService;
        $applications =  $applicationService->getAllApplications()->count();
        $paidApplications = $applicationService ->paidApplications();

        return view('admin.dashboard')->with(compact('categories', 'applications', 'forms', 'positions', 'paidApplications'));
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

            session()->flash('alert-success', "Form created successfully");
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

    public function edit_category(Request $request, $id)
    {
      
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name' => "required",
            ]);

            $categoryService = new CategoriesService;
            $categoryService->updateCategory($request->all(), $id);
            DB::commit();

            session()->flash('alert-success', "Categeory updated successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
      
    }

    public function delete_category($id)
    {
      
        DB::beginTransaction();
        try {

            $categoryService = new CategoriesService;
            $categoryService->deleteCategory($id);
            DB::commit();

            session()->flash('alert-success', "Categeory deleted successfully");
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

            session()->flash('alert-success', "Subcategory created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
      
    }

    public function edit_positions(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name' => "required",
            ]);

            $positionService = new PositionService;
            $positionService->updatePositions($request->all(), $id);
            DB::commit();

            session()->flash('alert-success', "Subcategory updated successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
    }

    public function delete_positions($id)
    {
        DB::beginTransaction();
        try {
    
            $positionService = new PositionService;
            $positionService->deletePositions($id);
            DB::commit();

            session()->flash('alert-success', "Subcategory deleted successfully");
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
                'requirements' => "required",
                'fee' => "required|numeric|min:200"
            ]);

            $request_data = $request->all();
            $request_data['form_id'] = $id;
         
            $formPositionService = new FormPositionService;
            $formPositionService->createFormPositions($request_data);
            DB::commit();

            session()->flash('alert-success', "Form position created successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
           dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
    }

}
