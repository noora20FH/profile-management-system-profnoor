<?php

namespace App\Domains\Media\Controllers;

use App\Domains\Media\Resources\MediaAssetResource;
use App\Domains\Media\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MediaController
{
    public function index(
        Request $request,
        MediaService $media,
    ): AnonymousResourceCollection {
        return MediaAssetResource::collection(
            $media->collection(
                (string) $request->string("collection", "default"),
            ),
        );
    }
}
