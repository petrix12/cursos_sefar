<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Genealogía'
        ]);

        Category::create([
            'name' => 'Bibliotecología'
        ]);

        Category::create([
            'name' => 'Gerencial'
        ]);

        Category::create([
            'name' => 'Sistemas'
        ]);

        Category::create([
            'name' => 'Ventas'
        ]);

        Category::create([
            'name' => 'Atención al cliente'
        ]);

        Category::create([
            'name' => 'Herramienta informática'
        ]);
    }
}