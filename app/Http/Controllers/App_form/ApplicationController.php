<?php

namespace App\Http\Controllers\App_form;

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

    public function post_form(Request $request)
    {
       
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'first_name' => "required",
                'last_name' => "required",
                'email' => "required",
                'phone_no' => "required",
                "date_of_birth" => "required",
                "form_id" => "required",
                "category_id" => "required",
                "position_id" => "required",
                "payment_type" => "required",
                "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096",
                "attachment" => "nullable|mimes:csv,txt,xlx,xls,pdf|max:2048"
            ]);

            $transaction_ref = uniqid('book_') . rand(10000, 999999);

            $request_data = $this->appService->arrangeData($request->all(), $transaction_ref);
            $application_id = $this->appService->createApplication($request_data)->id;
            $application = $this->appService->getApplicationbyId($application_id);
            
            $formPosition =  $this->formPositionService->getFormPositionbyParams($request_data['form_id'], $request['category_id'], $request['position_id']);
            $appPaymentData =  $this->appPaymentService->arrangeData($application, $formPosition->fee);
            $applicationPayment = $this->appPaymentService->createApplicationPayment($appPaymentData);
                
            if(isset($request->image))
            {
                $image_url =  $this->uploadService->uploadImage($request);  
                $this->appDocumentService->createApplicationDocument($application_id, $image_url);
            }

            if(isset($request->attachment))
            {
                $attach_url = $this->uploadService->uploadFile($request);     
                $this->appDocumentService->createApplicationDocument($application_id, $attach_url);
            }

            if($request->payment_type == "flutterwave")
            {
                $data = $this->paymentService->getFlutterwaveData($application, $formPosition->fee, $transaction_ref);
                $redirect_url = $this->paymentService->processFL($data);
            }

            DB::commit();
            session()->flash('alert-success', "Form created successfully");
            return redirect()->to($redirect_url);
        } catch (\Exception $e) {

            DB::rollback(); 
            dd($e);
            session()->flash('alert-danger', "Couldnt complete this action. Something went wrong");
            return back();
        }
    }

    public function payment_confirmation(Request $request)
    {
      
        $txRef = $request->tx_ref;
        $response =  $this->paymentService->confirm_flutterwave($txRef);
        $data_response = json_decode($response);
        
        if (isset($data_response->data->status) && ($data_response->data->status == "successful")) {
            //update status
            $this->appService->updateStatus($txRef);
         
            return redirect()->to('/form/success?b=' . $txRef);
        }

        return redirect()->to('/form/failed?b=' . $txRef);
    }

    public function success_form(Request $request)
    {
       
        $application = $this->appService->getApplicationbyTransactionReference($request->b);
        return view('forms.success')->with(compact('application'));
    }

    public function failed_form(Request $request)
    {

        $application =$this->appService->getApplicationbyTransactionReference($request->b);
        return view('forms.failed')->with(compact('application'));
    }

    public function test()
    {
        // $request =[
            
        //     "public_key"=>  env('BEMA_TEST_PUBLIC_KEY',"FLWSECK_TEST-516babb36b12f7f60ae0a118dcc9482a-X"),
        //     "charge_type"=>"card",
        //     "transaction_reference"=>"2URIO090OPNRYUR0120L045",
        //     "email"=>"tony@386konsult.com",
        //     "amount"=>1000,
        //     "currency"=>"NGN",
        //     "medium"=>"web",
        //     "redirect_url"=>"https://bemaswitch-beta-prod.herokuapp.com/v1/charges/validate_redirect"
        // ];

        // $ch = curl_init();
        // $headr = array();
        // $headr[] = 'Content-type: application/json';
    
        // curl_setopt($ch, CURLOPT_URL, "http://dashboard.teflonhub.com/v1/charges/initiate");
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $server_output = curl_exec($ch);

        // curl_close($ch);
        // try {
        //     $server_output = json_decode($server_output);
          
        // }catch (\Exception $e){
        //     dd(json_decode($server_output));
        // }

        $data =[
            
            "public_key"=>  "bspk_test_fc4f7bb0b4",
            "charge_type"=>"card",
            "uuid"=> $server_output->data->uuid ?? "KAS530243421BC245574FC4",
            "card_number" => "4187427415564246",
            "expiry_month" => "09",
            "expiry_year" => "32",
            "card_expiry" => "09/32",
            "cvv"=>"828",
            "suggested_auth"=> "PIN",
            "pin"=>"3310"          
        ];
       
        try {
            $ch = curl_init();
            $headr = array();
            $headr= [
                
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Encoding: gzip, deflate',
                'Cache-Control: no-cache',
                'Content-Type: application/json'
            ];
            curl_setopt($ch, CURLOPT_URL,"https://dashboard.teflonhub.com/v1/charges/authorize");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
            curl_setopt($ch, CURLOPT_POST, 1);
            if(env('APP_ENV') == "local"){
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            }
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $server_output = curl_exec($ch);
            dd($server_output, env('BEMA_TEST_PUBLIC_KEY',"FLWSECK_TEST-516babb36b12f7f60ae0a118dcc9482a-X"), curl_error($ch), curl_errno($ch));
            curl_close($ch);
        
                // $server_output = json_decode($server_output);
            
        }catch (\Exception $e){
            dd($e);
        }
    }
}
