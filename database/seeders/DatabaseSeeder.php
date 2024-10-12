<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin')
            ],
        );
        DB::table('employees')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'code' => 'ADM-1',
            'gender' => 'F',
            'user_id' => 1
        ]);

        DB::table('types')->insert([
            'name' => 'Inventario inicial',
            'transaction' => 'Entrada',
        ]);

        DB::table('types')->insert([
            'name' => 'Compra',
            'transaction' => 'Entrada',
        ]);

        DB::table('types')->insert([
            'name' => 'Venta',
            'transaction' => 'Salida',
        ]);

        DB::table('types')->insert([
            'name' => 'Daño',
            'transaction' => 'Salida',
        ]);

        DB::table('types')->insert([
            'name' => 'Perdida',
            'transaction' => 'Salida',
        ]);
    }
}
