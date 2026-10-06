<?php

namespace App\Domains\CMS\Controllers;

use App\Domains\CMS\Resources\ContentBlockResource;
use App\Domains\CMS\Services\CmsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CmsController
{
    public function index(CmsService $cms): AnonymousResourceCollection
    {
        return ContentBlockResource::collection($cms->published());
    }
}
