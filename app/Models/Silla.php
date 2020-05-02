<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Silla
 *
 * @property int $id
 * @property string $nombre
 * @property int $alto
 * @property int $ancho
 * @property int $profundidad
 * @property string $descripcion
 * @property int $id_categoria
 * @property string $foto
 * @property float $precio
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Categoria $categoria
 * @mixin \Eloquent
 */
class Silla extends Model
{
    use SoftDeletes;

    protected $table = "sillas";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'alto', 'ancho', 'profundidad', 'descripcion', 'precio', 'id_categoria', 'foto'];

    protected $casts = [
        'deleted_at' => 'date',
        'updated_at' => 'date',
    ];


	/** @var array Las reglas de validación para utilizar. */

	 public static $rules = [
	 	'nombre' => 'required|min:5',
	 	'alto' => 'required|numeric', 
	 	'ancho' => 'required|numeric',
	 	'profundidad' => 'required|numeric',
	 	'descripcion' => 'required',
	 	'foto' => 'image|dimensions:width=500,height=700',
	 	'precio' => 'required|numeric',
	 	'id_categoria' => 'required'
	 ];
	 
	 /**
	  * Sobreescritura de la función messages para la muestra de mensajes customizados. 
	  *
	  * @return array
	  */
	 public static function messages()
	 {
		 return [
			 'nombre.required' => 'El nombre de la silla es obligatorio',
			 'nombre.min' => 'El nombre de la silla debe contener al menos 5 caracteres',
			 'alto.required'  => 'Debe informar el alto del producto.',
			 'alto.numeric'  => 'El alto debe ser un valor numérico.',
			 'ancho.required'  => 'Debe informar el ancho del producto.',
			 'ancho.numeric'  => 'El ancho debe ser un valor numérico.',
			 'profundidad.required'  => 'Debe informar el valor de la profundidad del producto.',
			 'profundidad.numeric'  => 'La profundidad debe ser un valor numérico.',
			 'descripcion.required' => 'Debe informar la descripción del producto',
			 'foto.image' => 'El formato del archivo de foto solo puede ser jpeg, png, bmp, gif o svg ',
			 'foto.dimensions' => 'Dimensión admitida de imagen: 500x700px',
			 'precio.required' => 'Debe informar un precio',
			 'precio.numeric' => 'El valor del precio debe ser numérico',
			 'id_categoria' => 'Seleccione una categoría',
		 ];
	 }
 
	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
	}

	public function comentarios(){
		return $this->hasMany(Comentarios::class, 'id_producto', 'id');
	}


}
