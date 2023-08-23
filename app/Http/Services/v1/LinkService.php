<?php

namespace App\Http\Services\v1;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class LinkService
{
    
    public function create(Request $request): Link
    {

        return Link::create($request->all());
    }

    public function destroy(Link $link): ?bool
    {
        return $link->delete();
    }
}
