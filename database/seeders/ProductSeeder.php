<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
        ['name'=>'Anillo Oro 18k','slug'=>'anillo-oro-18k','price_cents'=>350000,'stock'=>5,'images'=>['/img/anillo1.jpg']],
        ['name'=>'Collar Perlas','slug'=>'collar-perlas','price_cents'=>220000,'stock'=>8,'images'=>['/img/collar1.jpg']],
        ['name'=>'Aretes Plata','slug'=>'aretes-plata','price_cents'=>90000,'stock'=>12,'images'=>['/img/aretes1.jpg']],
        ];
        foreach($items as $i){ \App\Models\Product::updateOrCreate(['slug'=>$i['slug']],$i); }
    }
}
