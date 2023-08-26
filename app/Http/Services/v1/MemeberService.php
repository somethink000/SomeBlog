<?php

namespace App\Http\Services\v1;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Memeber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class MemberService
{

    public function update(Request $request, Memeber $member): Memeber
    {
        $member->update($request->all());
        return $member;
    }

}
