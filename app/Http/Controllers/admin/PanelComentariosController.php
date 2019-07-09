<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comentarios;
use App\Models\Silla;
use App\Repositories\Contracts\SillaRepositoryContract;
use Illuminate\Http\Request;


class PanelComentariosController extends Controller
{
   
    /**
     * Carga lista de comentarios
     *
     * @return view
     */
    public function index()
    {
        $comentarios = Comentarios::all();

        return view('panel.comentarios', [
            'comentarios' => $comentarios,
        ]);

    }

    /**
     * Elimina comentario y redirige
     *
     * @param int $id
     * @return redirect
     */
    public function eliminarcomentario($id){
        $comentario = Comentarios::find($id);
        $comentario->delete();
        return redirect()
            ->route('panelcomentarios')
            ->with('message', 'Comentario eliminado');
    }


}