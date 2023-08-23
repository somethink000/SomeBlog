<?php

namespace App\Http\Services\v1;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class BlogService
{

    public function create(BlogStoreRequest $request): Blog
    {
        return Blog::create($request->all());
    }

    public function update(BlogUpdateRequest $request, Blog $blog): Blog
    {
        $blog->update($request->all());
        return $blog;
    }

    public function destroy(Blog $blog): ?bool
    {
        return $blog->delete();
    }
}
