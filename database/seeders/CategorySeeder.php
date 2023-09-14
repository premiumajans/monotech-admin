<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'first',
                'translation' => ['az' => 'ilk', 'en' => 'first', 'ru' => 'sdfnkjsdnf'],
            ],
            [
                'slug' => 'first1',
                'translation' => ['az' => 'ilk1', 'en' => 'first1', 'ru' => 'sdfnkjsdnf1'],
            ],
            [
                'slug' => 'first2',
                'translation' => ['az' => 'ilk12', 'en' => 'first12', 'ru' => 'sdfnkjsdnf12'],
            ],
        ];
        foreach ($categories as $cat) {
            $newCategory = new Category();
            $newCategory->slug = $cat['slug'];
            $newCategory->save();
            foreach (active_langs() as $lang) {
                $translation = new CategoryTranslation();
                $translation->locale = $lang->code;
                $translation->category_id = $newCategory->id;
                $translation->name = $cat['translation'][$lang->code];
                $translation->save();
            }
        }
    }
}
