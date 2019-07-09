<?php

use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Ejecuta el seeder de comentarios
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
        	'id' => '1',
        	'id_producto' => '1',
        	'id_usuario' => '1',
        	'comentario' => 'Hermoso!!',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('comentarios')->insert([
        	'id' => '2',
        	'id_producto' => '1',
        	'id_usuario' => '2',
        	'comentario' => 'La mejor del mundo!!',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('comentarios')->insert([
        	'id' => '3',
        	'id_producto' => '1',
        	'id_usuario' => '3',
        	'comentario' => 'Incomodísima',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('comentarios')->insert([
        	'id' => '4',
        	'id_producto' => '2',
        	'id_usuario' => '1',
        	'comentario' => 'Dónde se compra?',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('comentarios')->insert([
        	'id' => '5',
        	'id_producto' => '2',
        	'id_usuario' => '2',
        	'comentario' => 'Perfecta',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('comentarios')->insert([
        	'id' => '6',
        	'id_producto' => '2',
        	'id_usuario' => '3',
        	'comentario' => 'Rara',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
