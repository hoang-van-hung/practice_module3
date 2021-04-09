<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Ca phe den';
        $category->description = 'Ca phe den xay nho';
        $category->save();

        $category = new Category();
        $category->name = 'Sinh to trai cay';
        $category->description = 'Trai cay theo mua';
        $category->save();

        $category = new Category();
        $category->name = 'Ca phe sua';
        $category->description = 'Ca phe ket hop voi sua tuoi nguyen chat';
        $category->save();

    }
}
