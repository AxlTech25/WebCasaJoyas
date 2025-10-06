<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([
            ['name' => 'Collares', 'slug' => 'collares'],
            ['name' => 'Pulseras', 'slug' => 'pulseras'],
            ['name' => 'Anillos',  'slug' => 'anillos'],
        ] as $c) \App\Models\Category::firstOrCreate(['slug'=>$c['slug']], $c);
    }
}
