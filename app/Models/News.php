<?php

namespace App\Models;



use App\Models\NewsCategory;
use Illuminate\Support\Facades\Storage;

class News
{
    private NewsCategory $category;


    public function __construct(NewsCategory $category)
    {
        $this->category = $category;
    }

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoryIdBySlug($slug);
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNews(): array
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public function getNewsId($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }
}
