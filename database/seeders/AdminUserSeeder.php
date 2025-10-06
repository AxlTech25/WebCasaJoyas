<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Verifica si ya existe un admin
        $admin = User::where('email', 'admin@casadelasjoyas.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Administrador Principal',
                'email' => 'jose@casadelasjoyas.com',
                'password' => Hash::make('jose1234'), // Cambia si quieres otra contraseña
                'is_admin' => 1,
                'email_verified_at' => now(),
            ]);

            $this->command->info('✅ Usuario administrador creado: admin@casadelasjoyas.com / admin1234');
        } else {
            $this->command->info('⚠️  El usuario admin ya existe, no se creó otro.');
        }
    }
}
