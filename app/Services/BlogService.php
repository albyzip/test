<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    public function get(): Collection
    {
        return Blog::query()->orderBy('created_at', 'desc')->get();
    }

    public function update(Blog $article, $payload): Blog
    {
        $article->update($payload);

        return $article;
    }

    public function create($payload): Blog
    {
        $article = Blog::query()->create($payload);

        return $article;
    }

    public function delete(Blog $article): bool
    {
        return $article->delete();
    }
}
