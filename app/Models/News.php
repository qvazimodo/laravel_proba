<?php

namespace App\Models;



use App\Models\NewsCategory;

class News
{private NewsCategory $category;

    private array $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая про спорт!',
            'isPrivate' => false,
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А у нас новость 1 и она очень хорошая про спорт!',
            'isPrivate' => true,
            'category_id' => 1
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'А тут плохие новости про политику(((',
            'isPrivate' => false,
            'category_id' => 2
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Приватная про политику',
            'isPrivate' => true,
            'category_id' => 2
        ],
    ];

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
        return $this->news;
    }

    public function getNewsId($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }
}
