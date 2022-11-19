<?php

namespace App\Models;



use Illuminate\Support\Facades\Storage;

class NewsCategory
{


    public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return null;
    }

    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategories(): array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
    }

    public function getCategoryById($id)
    {
        if (array_key_exists($id, $this->getCategories()))
            return json_decode(Storage::disk('local')->get('categories.json'), true)[$id];
        else
            return null;
    }
}
