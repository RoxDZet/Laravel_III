<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *crear 50 usuarios y 500 publicaciones
     * @return void
     */
    public function run()
    {
        \App\Models\Publicacion::factory(500)->create();
    }
}
