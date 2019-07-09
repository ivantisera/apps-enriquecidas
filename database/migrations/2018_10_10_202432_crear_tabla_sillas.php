<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSillas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->unsignedDecimal('alto', 6, 2);
            $table->unsignedDecimal('ancho', 6, 2);
            $table->unsignedDecimal('profundidad', 6, 2);
            $table->text('descripcion');
            $table->string('foto', 50)->nullable();
            $table->unsignedDecimal('precio', 10, 2); // nunca se sabe lo que hará la inflación
            $table->softDeletes();
            $table->integer('id_categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sillas');
    }
}