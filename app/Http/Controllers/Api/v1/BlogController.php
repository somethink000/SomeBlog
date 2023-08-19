<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Http\Services\v1\BlogService;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    public function __construct(protected readonly BlogService $blogService)
    {
    }

    public function index()
    {
        return Blog::get();
    }

    public function store(BlogStoreRequest $request): Blog
    {
        return $this->blogService->create($request);
    }

    public function show(Blog $blog)
    {
        return $blog;
    }

    public function update(BlogUpdateRequest $request, Blog $blog): Blog
    {
        return $this->blogService->update($request, $blog);
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
