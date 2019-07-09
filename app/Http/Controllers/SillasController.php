<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Models\Comentarios;
use App\Models\Silla;
use App\Repositories\Contracts\SillaRepositoryContract;
use Illuminate\Http\Request;

/**
 * Class SillasController
 * @package App\Http\Controllers
 *
 * Controlador del listado de productos
 */
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
        //  $sillas = Silla::withTrashed()->with('categoria')->get();
        $sillas = $this->repo->all();

        return view('sillas.index', [
            'sillas' => $sillas,
        ]);
    }

    /**
     * Busca el objeto y redirige
     *
     * @param int $id id del producto
     * @return view
     */
    public function detalle($id)
    {
        $silla = $this->repo->find($id);
        if ($silla !== null) {
            return view('sillas.detalle', compact('silla'));
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
