<?php

namespace App\Http\Services\v1;

use App\Models\MyLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class MyLinkService
{
    
    public function create(Request $request): MyLink
    {

        return MyLink::create($request);
    }

    public function destroy(MyLink $myLink): ?bool
    {
        return $myLink->delete();
    }
}
