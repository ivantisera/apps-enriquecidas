<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentarios extends Model
{
    use SoftDeletes;

    protected $table = "comentarios";
    protected $primaryKey = "id";
    protected $fillable = ['id_producto', 'id_usuario', 'comentario'];

    protected $casts = [
        'deleted_at' => 'date',
        'updated_at' => 'date',
    ];

    public static $rules = ['comentario' => 'required'];

    public function producto()
	{
		return $this->belongsTo(Silla::class, 'id_producto', 'id');
    }
    public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
	}

}
