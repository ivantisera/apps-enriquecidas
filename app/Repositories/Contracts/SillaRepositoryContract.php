<?php
namespace App\Repositories\Contracts;


interface SillaRepositoryContract
{
	/**
	 * Retorna todas las sillas.
	 */
    public function all();
    
    /**
	 * Retorna todas las sillas incluyendo las eliminadas
	 */
    public function allWithTrashed();
    

	/**
	 * Devuelve una silla
	 *
	 * @param mixed $primaryKey
	 */
    public function find($primaryKey);

    
    public function findwithTrashed($primaryKey);

    /**
     * Crea una silla
     *
     * @param array $data
     * @return void
     */
    public function create($data);
    
    /**
     * Edita una silla
     *
     * @param array $data
     * @return void
     */
   // public function update($data);

    /**
	 * Elimina una silla
	 *
	 * @param mixed $primaryKey
	 */
//	public function delete($primaryKey);
}