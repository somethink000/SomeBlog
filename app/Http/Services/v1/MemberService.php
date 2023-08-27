<?php

namespace App\Http\Services\v1;

use App\Models\Memeber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class MemberService
{

    public function update(Request $request, Memeber $member): Memeber
    {
        $data = $request->only(
            'name',
            'about',
        );

        if($request->image){
            $path = $request->file('image')->store('memeber_images');
            if ($member->image != $path) {
                $data['image'] = $path;
                Storage::disk('public')->delete($member->image);
            }
        }
        
        $member->update($data);

        return $member;
    }

}