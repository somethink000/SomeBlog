<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\v1\LinkService;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkContoller extends Controller
{
    public function __construct(protected readonly LinkService $linkService)
    {
    }

    public function index()
    {
        return Link::get();
    }

    public function store(Request $request): Link
    {
        return $this->linkService->create($request);
    }

    public function destroy(Link $link): ?bool
    {
        return $this->linkService->destroy($link);
    }
}
