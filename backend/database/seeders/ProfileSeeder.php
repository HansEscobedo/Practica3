<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Hans',
            'last_name' => 'Escobedo',
            'city' => 'Antofagasta',
            'country' => 'Chile',
            'summary' => 'Estudiante de la UCN',
            'email' => 'hans.escobedo@correo.com',
        ]);

        DB::table('frameworks')->insert([
            'name' => 'Laravel',
            'level' => 'Intermedio',
            'year' => '2022',
            'user_id' => '1',
        ]);

        DB::table('frameworks')->insert([
            'name' => 'React',
            'level' => 'Bajo',
            'year' => '2023',
            'user_id' => '1',
        ]);

        DB::table('hobbies')->insert([
            'name' => 'Futbol',
            'description' => 'Ver fútbol nacional e internacional',
            'user_id' => '1',
        ]);

        DB::table('hobbies')->insert([
            'name' => 'Videojuegos',
            'description' => 'Jugar videojuegos en consola y PC',
            'user_id' => '1',
        ]);


    }
}
