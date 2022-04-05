<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UploadFileService
{
   
    public function uploadImage($request)
    {
        //rename image
        $imageName = time().'.'.$request->image->extension();  
        //move to path 
        $request->image->storeAs('/public', $imageName);

        $url = Storage::url($imageName);

        return $url;
    }

    public function uploadFile($request)
    {
        //rename file
        $attachName = time().'.'.$request->attachment->extension();  
        //move to path 
        $request->attachment->storeAs('/public/application', $attachName);

        $url = Storage::url($attachName);

        return $url;
    }

}
