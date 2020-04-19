<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SillaRepositoryContract;
use App\Models\Silla;

class SillasController extends Controller
{
    /** @var SillaRepositoryContract */
    protected $repo;

    /**
     * Constructor. Crea el repo
     *
     * @param SillaRepositoryContract $repo
     */
    public function __construct(SillaRepositoryContract $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Trae las silas y redirige a la vista
     *
     * @return view
     */
    public function index()
    {

        $sillas = $this->repo->all();

        return response()->json([
            'status' => 'ok',
            'data' => $sillas
        ]);
    }

    public function nueva(Request $request)
    {
    	$request->validate(Silla::$rules);
      
    	 $inputs = $request->all();

    	 $silla = $this->repo->create($inputs);
        return response()->json([
    		'status' => 'ok',
    		'data' => $silla
		]);
  
    }


     /**
     * Ejecuta el guardado de la edición.
     *
     * @param Request $request datos que vienen 
     * @param int $id id del producto a editar
     * @return void
     */
    public function editar(Request $request)
    {
        $request->validate(Silla::$rules);
        $formData = $request->except(['_token', '_method']);
        $silla = $this->repo->find($request->id);
               
         $silla->fill($formData);
   
         $silla->save();

        return response()->json([
    		'status' => 'ok',
    		'data' => $silla
		]);
    }

    /**
     * Da de baja un producto
     *
     * @param int $id id del producto a eliminar
     * @return void
     */
    public function eliminar(Request $request)
    {
        $silla = $this->repo->find($request->id);
    if (!$silla) {
        return response()->json([
    		'status' => 'No existe silla con el id asociado'
		]);
    }
    else{
        //fwrite(STDERR, print_r($request->id, TRUE));
        //    $silla = $this->repo->find($request->id);
          // fwrite(STDERR, print_r($silla, TRUE));
           $silla->delete();
           return response()->json([
               'status' => 'ok'
           ]);
    }


    }


    
    /**
     * Busca el objeto y redirige
     *
     * @param int $id id del producto
     * @return view
     */
    public function silla($id)
    {
        $silla = $this->repo->find($id);
        if ($silla !== null) {
            

        } else {
            $sillas = $this->repo->all();

            return view('sillas.index', [
                'sillas' => $sillas,
            ]);
        }

    }

    /**
     * Agrega un comentario
     *
     * @param Request $request
     * @return view
     */
    public function agregarcomentario(Request $request)
    {
        $request->validate(Comentarios::$rules);
        $formData = $request->except(['_token']);
        $comentario = Comentarios::create($formData);

        $silla = $this->repo->find($request->id_producto);
        return view('sillas.detalle', compact('silla'));

    }

}
