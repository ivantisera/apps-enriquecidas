<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Categoria
 *
 * @property int $id_categoria
 * @property string $categoria
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Silla[] $sillas
 * @mixin \Eloquent
 */
class Categoria extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "id_categorias";

    public function silla()
    {
    	return $this->hasMany(Silla::class, 'id_categoria', 'id_categoria');
    }

}
