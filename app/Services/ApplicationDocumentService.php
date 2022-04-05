<?php

namespace App\Services;

use App\Models\ApplicationDocument;
use Illuminate\Support\Facades\DB;

/**
 * Class CampaignRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ApplicationDocumentService
{
    public function getDocuments()
    {
        return ApplicationDocument::get();
    }

    public function getDocumentbyId($id)
    {
        return ApplicationDocument::where('id', $id)->first();
    }
    
    public function createApplicationDocument($id,$url)
    {
        $data =[
                'application_id' => $id,
                'url' => $url
        ];
        return ApplicationDocument::create($data);
    }



}
