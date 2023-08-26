<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\v1\MemberService;
use App\Models\Memeber;
use Illuminate\Http\Request;

class MemeberController extends Controller
{

    public function __construct(protected readonly MemberService $memeberService)
    {
    }

    public function index()
    {
        return Memeber::get();
    }

    public function show(Memeber $member): Memeber
    {
        return $member;
    }

    public function update(Request $request, Memeber $member): Memeber
    {
        $this->memeberService->update($request, $member);
        return $member;
    }

    
}
