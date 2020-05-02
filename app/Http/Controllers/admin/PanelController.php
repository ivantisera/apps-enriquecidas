<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Silla;
use App\Repositories\Contracts\SillaRepositoryContract;
use Illuminate\Http\Request;


class PanelController extends Controller
{
    /** @var SillaRepositoryContract */
    protected $sillas_repo;

    /**
     * Constructor. Crea los repositorios
     *
     * @param SillaRepositoryContract $repo
     */
    public function __construct(SillaRepositoryContract $sillas_repo)
    {
        $this->sillas_repo = $sillas_repo;
    }

    /**
     * Carga el index del panel con el abm de productos
     *
     * @return view
     */
    public function index()
    {
        $sillas = $this->sillas_repo->allWithTrashed();

        return view('panel.index', [
            'sillas' => $sillas,
        ]);

    }

    /**
     * Redirige a la página para crear un nuevo producto
     *
     * @return view
     */
    public function nuevaSilla()
    {
        $categorias = Categoria::all();
        return view('panel.nuevasilla', compact('categorias'));
    }

    /**
     * Ejecuta el registro de un nuevo producto
     *
     * @param Request $request Objeto que recibe del formulario
     * @return redirect Si pasa la validacion y guarda ok, redirige
     */
    public function crearNuevaSilla(Request $request)
    {

        $request->validate(Silla::$rules, Silla::messages());

        $formData = $request->except(['_token']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreFoto = time() . "." . $foto->extension();
            $foto->move(public_path('/img'), $nombreFoto);
            $formData['foto'] = $nombreFoto;
        }
        else{
            $formData['foto'] = "default.jpg";
        }
        $silla = $this->sillas_repo->create($formData);

        return redirect()
            ->route('panel')
            ->with('message', 'La silla ' . $formData['nombre'] . " se agregó con éxito");
    }

    /**
     * Redirige a la página para editar un producto
     *
     * @param int $id
     * @return view
     */
    public function editarSilla($id)
    {
        $categorias = Categoria::all();
        $silla = $this->sillas_repo->find($id);
        return view('panel.editarsilla', compact('categorias', 'silla'));
    }

    /**
     * Ejecuta el guardado de la edición.
     *
     * @param Request $request datos que vienen del form
     * @param int $id id del producto a editar
     * @return redirect Redirección en caso exitoso
     */
    public function guardaredicionsilla(Request $request, $id)
    {
        $request->validate(Silla::$rules);

        $formData = $request->except(['_token', '_method']);

        $silla = $this->sillas_repo->find($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $nombreFoto = time() . "." . $foto->extension();

            $foto->move(public_path('/img'), $nombreFoto);

            $formData['foto'] = $nombreFoto;
        }

        $silla->fill($formData);
        $silla->save();

        return redirect()
            ->route('panel')
            ->with('message', 'La silla' . $formData['nombre'] . " se editó con éxito");
    }

    /**
     * Da de baja un producto
     *
     * @param int $id id del producto a eliminar
     * @return redirect redirige si ok
     */
    public function deletesilla($id)
    {
        $silla = $this->sillas_repo->find($id);
        $silla->delete();

        return redirect()
            ->route('panel')
            ->with('message', 'La silla ' . $silla['nombre'] . " se eliminó con éxito");
    }

     /**
     * Vuelve a incluir un producto eliminado anteriormente
     *
     * @param int $id id del producto a restablecer
     * @return redirect redirige si ok
     */
    public function restablecersilla($id)
    {
        $silla = $this->sillas_repo->findwithTrashed($id);
        $silla->restore();

        return redirect()
            ->route('panel')
            ->with('message', 'La silla ' . $silla['nombre'] . " se restableció con éxito");
    }
    
}
