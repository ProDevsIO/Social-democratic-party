<?php

namespace App\Http\Controllers\Admin;

use App\Services\FormPositionService;
use App\Services\ApplicationService;
use App\Services\ApplicationPaymentService;
use App\Services\ApplicationDocumentService;
use App\Services\UploadFileService;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    public $appService;
    public $uploadService;
    public $paymentService;
    public $appPaymentService;
    public $appDocumentService;
    public $formPositionService;

    public function __construct()
    {
        $this->appService = new ApplicationService;
        $this->formPositionService = new FormPositionService;
        $this->uploadService = new UploadFileService;
        $this->paymentService = new PaymentService;
        $this->appPaymentService = new ApplicationPaymentService;
        $this->appDocumentService = new ApplicationDocumentService;
    }

    public function view_paid_application()
    {
        $applications = $this->appService->paidApplications();
        return view('admin.view_paid_application')->with(compact('applications'));
    }

    public function view_unpaid_application()
    {
        $applications = $this->appService->unpaidApplications();
        return view('admin.view_unpaid_application')->with(compact('applications'));

    }

    public function view_single_application($id)
    {
        $application = $this->appService->getApplicationbyId($id);
        return view('admin.view_single_application')->with(compact('application'));
    }
}
