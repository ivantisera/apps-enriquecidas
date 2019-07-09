<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Corre el seed de usuarios
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
        	'id_usuario' => '1',
        	'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'is_admin' => '1',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '2',
        	'email' => 'ivan@sillas.com',
            'password' => Hash::make('ivan'),
            'is_admin' => '0',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '3',
        	'email' => 'pedro@sillas.com',
            'password' => Hash::make('ivan'),
            'is_admin' => '0',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
    	]);
    }
}

