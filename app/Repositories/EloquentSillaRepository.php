<?php
namespace App\Repositories;

use App\Repositories\Contracts\SillaRepositoryContract;
use App\Models\Silla;

class EloquentSillaRepository implements SillaRepositoryContract
{
	protected $silla;

	public function __construct(Silla $silla)
	{
		$this->silla = $silla;
	}

	/**
	 * Devuelve todas las Silla
	 *
	 * @return array|Silla[]
	 */
	 public function allWithTrashed()
	 {
	 	return Silla::withTrashed()->with(['categoria'])->get();
     }
    
    /**
	 * Devuelve todas las sillas a mostrar al uss
	 *
	 * @return array|Silla[]
	 */
	 public function all()
	 {
         return Silla::with(['categoria'])->get();
	 }


	/**
	 * Devuelve la Silla con la pk $pk.
	 *
	 * @param int $pk
	 * @return Silla|null
	 */
	public function find($pk)
	{
        return Silla::find($pk);
    }
    
    /**
	 * Devuelve la Silla con la pk $pkincluyendo las eliminadas
	 *
	 * @param int $pk
	 * @return Silla|null
	 */
	public function findwithTrashed($pk)
	{
        return Silla::withTrashed()->find($pk);
	}

	/**
	 * Graba la $data en la base de datos.
	 *
	 * @param array $data
	 * @return Silla
	 */
	public function create($data)
	{
		$silla = Silla::create($data);
		return $silla;
	}
}