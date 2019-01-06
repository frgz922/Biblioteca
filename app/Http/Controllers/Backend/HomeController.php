<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\API\AutorController;
use App\Http\Controllers\API\BibliotecaController;
use App\Http\Controllers\API\ClasificacionController;
use App\Models\Biblioteca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function home() {
//        $libros = Biblioteca::with('autor')->with('clasificacion')->get();
        $libros = new BibliotecaController();
        $libros = $libros->index();

        $autores = new AutorController();
        $autores = $autores->index();

        $clasificaciones = new ClasificacionController();
        $clasificaciones = $clasificaciones->index();

        return view('subviews.index', compact('libros', 'autores', 'clasificaciones'));
    }
}
