<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasTableSeeder::class);
        $this->call(SillasTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(ComentariosTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
