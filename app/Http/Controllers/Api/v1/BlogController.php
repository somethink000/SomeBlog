<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\v1\BlogService;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    public function __construct(protected readonly BlogService $blogService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Blog::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return $blog;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
