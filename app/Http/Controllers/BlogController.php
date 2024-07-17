<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogArticleRequest;
use App\Http\Requests\EditBlogArticleRequest;
use App\Http\Resources\BlogArticleResource;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    )
    {}

    public function index(): JsonResource {
        $articles = $this->blogService->get();

        return BlogArticleResource::collection($articles);
    }

    public function edit(EditBlogArticleRequest $request, Blog $article): JsonResource {

        $article = $this->blogService->update($article, $request->all());

        return new BlogArticleResource($article);
    }

    public function create(CreateBlogArticleRequest $request): JsonResource {
        $article =  $this->blogService->create($request->all());

        return new BlogArticleResource($article);
    }

    public function delete(Blog $article): JsonResponse
    {
        $this->blogService->delete($article);

        return response()->json(null, 204);
    }
}
