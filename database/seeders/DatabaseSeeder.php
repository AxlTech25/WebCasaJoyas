<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
<<<<<<< HEAD
=======
        $this->call(ProductSeeder::class);
>>>>>>> master

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
<<<<<<< HEAD
=======

        User::firstOrCreate(
            ['email' => 'admin@casadelasjoyas.com'],
            ['name'=>'Admin','password'=>bcrypt('admin12345'),'is_admin'=>true]
        );
>>>>>>> master
    }
}
