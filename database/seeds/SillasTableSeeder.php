<?php

use Illuminate\Database\Seeder;

class SillasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('sillas')->insert([
            'id' => 1,
            'nombre' => 'Silla Aluminum de Charles Eames',
            'alto' => '110',
            'ancho' => '50',
            'profundidad' => '70',
            'descripcion' => 'La Silla Aluminum de Charles Eames ha sido un diseño popular desde su introducción en 1958. Y no es de extrañar. Con una silueta elegante se puede utilizar en todo tipo de interiores; Desde hogares hasta oficinas. Dondequiera que se la coloque, esta sillas es un una declaración única sobre excelencia del diseño. Completamente tapizado en ecocuero y con una amplia opción de colores a tu disposición. Durante años, han intentado crear productos similares, pero nunca nadie pudo lograrlo. Si sos una apasionado del diseño y de los clásicos este producto no puede faltar en tu hogar.',
            'foto' => 'aluminumrojo.jpg',
            'precio' => '10500',
            'id_categoria' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 2,
            'nombre' => 'Sillón Braly',
            'alto' => '99',
            'ancho' => '65',
            'profundidad' => '65',
            'descripcion' => 'Un sillón diferente e ideal no solo para usar en oficinas sino también en tu hogar. Íntegramente construido en polipropileno, su base pintada con la mas delicada pintura la va a diferenciar de otros modelos. Joven, colorido y más importante con un diseño distinto. Sistema regulable en altura, para ajustar a cualquier posición de trabajo.',
            'foto' => 'braly.jpg',
            'precio' => '2990',
            'id_categoria' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 3,
            'nombre' => 'Silla Coventry Natural',
            'alto' => '88',
            'ancho' => '44',
            'profundidad' => '50',
            'descripcion' => 'Esta nueva línea, rememora lo mejor del estilo inglés. Confeccionados 100% en madera y con acabados lustrados o laqueados, cuidando hasta el ultimo detalle. Ideado para aquellos espacios vintage o personas eclécticas que les gusta jugar con los distintos estilos. Versiones en capitoné y en madera natural son las distintas alternativas posibles. Pensado para aquellos usuarios exigentes que buscan ambientar un espacio único.',
            'foto' => 'coventry.jpg',
            'precio' => '2100',
            'id_categoria' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 4,
            'nombre' => 'Sillón Pro Gamer',
            'alto' => '124',
            'ancho' => '70',
            'profundidad' => '73',
            'descripcion' => 'La experiencia de jugar como un verdadero PRO. Este modelo viene con todo lo necesario para que puedas vivir intensamente cada partida. Este modelo cuenta con sistema regulable en altura, como también así sistema basculante para ofrecerte la comodidad necesaria. Su sistema de apoyabrazos dinámicos está a la altura necesaria para permitirte una posición más confortable. Tapizado con material extra resistente y triple costuras para uso.',
            'foto' => 'gamer.jpg',
            'precio' => '5450',
            'id_categoria' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 5,
            'nombre' => 'Sillón Indra',
            'alto' => '101',
            'ancho' => '61',
            'profundidad' => '61',
            'descripcion' => 'Un sillón diferente e ideal no solo para usar en oficinas sino también en tu hogar. Íntegramente construido en acero, su base cromada brillante la va a diferenciar de otros modelos. Joven, colorido y más importante con un diseño distinto. Sistema regulable en altura, para ajustar a cualquier posición de trabajo.',
            'foto' => 'indra.jpg',
            'precio' => '2990',
            'id_categoria' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 6,
            'nombre' => 'Silla Lapislazuli',
            'alto' => '98',
            'ancho' => '44',
            'profundidad' => '50',
            'descripcion' => 'Silla tapizada de diseño Italiano. íntegramente en estructura metálica. Asiento y respaldo completamentemente tapizado con vinil colores a elección. Regatones inferiores para evitar rayaduras en cualquier tipo de superficie.',
            'foto' => 'lapislazuli.jpg',
            'precio' => '2385',
            'id_categoria' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 7,
            'nombre' => 'Silla Mecedora Eames',
            'alto' => '69',
            'ancho' => '62',
            'profundidad' => '69',
            'descripcion' => 'La Silla mecedora creada por Charles y Ray Eames es un clasico del mobiliario del siglo XX. Sobre una base de acero cromado y patines en madera de arce barnizados en color claro. Esta combinación de gran calidad tiene un efecto sobrio y aporta a la silla una exclusiva óptica de modernidad, ya sea como silla de hogar, en una zona de recepción o en la habitación de un hotel.',
            'foto' => 'mecedora.jpg',
            'precio' => '2450',
            'id_categoria' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 8,
            'nombre' => 'Sillón Pyot',
            'alto' => '113',
            'ancho' => '57',
            'profundidad' => '63',
            'descripcion' => 'Un sillon diferente e ideal no solo para usar en oficinas sino tambien en tu hogar.Integramente construido en acero, su base cromada brillante la va a diferenciar de otros modelos. Emulando al modelo Aluminium, esta version busca lograr no solo diseño, sino tambien un amplio confort. Este modelo cuenta con un sistema regulable en altura y basculante que hacen que su confort, sea único.',
            'foto' => 'pyot.jpg',
            'precio' => '5040',
            'id_categoria' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('sillas')->insert([
            'id' => 9,
            'nombre' => 'Silla Reed',
            'alto' => '82',
            'ancho' => '60',
            'profundidad' => '60',
            'descripcion' => 'Un silla divertida ideal no solo para usar en oficinas sino también en tu hogar. Íntegramente construido en acero, su base cromada brillante la va a diferenciar de otros modelos. Joven, colorido y más importante con un diseño distinto. Sistema regulable en altura, para ajustar a cualquier posición de trabajo.',
            'foto' => 'reed.jpg',
            'precio' => '3550',
            'id_categoria' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
