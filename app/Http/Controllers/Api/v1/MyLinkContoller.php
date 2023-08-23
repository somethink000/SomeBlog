<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\v1\MyLinkService;
use App\Models\MyLink;
use Illuminate\Http\Request;

class MyLinkContoller extends Controller
{
    public function __construct(protected readonly MyLinkService $myLinkService)
    {
    }

    public function index()
    {
        return MyLink::get();
    }

    public function store(Request $request): MyLink
    {
        return $this->myLinkService->create($request);
    }

    public function destroy(MyLink $blog)
    {
        
    }
}
