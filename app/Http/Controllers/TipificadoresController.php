<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipificador;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class TipificadoresController extends Controller
{
    public function create(Request $request)
    {

        $tipificador = Tipificador::create([
            'nombre' => $request->nombre,
            'campo' => $request->campo,
        ]);

        return response()->json([
            'tipificador' => $tipificador
        ], 201);
    }

    public function get(Request $request)
    {

        $id = $request->query('id');
        $campo = $request->query('campo');

        //armamos el filtro segun lo que venga
        $query = Tipificador::query();

        if ($id != '') {
            $query->where('id', $id);
        }

        if ($campo != '') {
            $query->where('campo', $campo);
        }

        $tipificador = $query->get();

        return response()->json([
            $tipificador
        ], 200);
    }

    public function getLupa(Request $request)
    {

        $id = $request->query('id');
        $campo = $request->query('campo');

        //armamos el filtro segun lo que venga
        $query = Tipificador::query();

        if ($id != '') {
            $query->where('id', $id);
        }

        if ($campo != '') {
            $query->where('campo', $campo);
        }

        $tipificador = $query->get();

        return view('components.popup-lupa', ['tipificador' => $tipificador, 'campo' => $campo]);
    }

    public function getLupaPopup(Request $request)
    {

        $campo = $request->query('campo');

        $ruta = resource_path("views/components/popup-lupa2.blade.php");

        if (File::exists($ruta)) {

            //armamos el filtro segun lo que venga
            $query = Tipificador::query();

            if ($campo != '') {
                $query->where('campo', $campo);
            }

            $tipificador = $query->get();

            $data['campo'] = $campo;
            $data['tipificador'] = $tipificador;

            $componente = View::file($ruta, $data)->render();
        } else {
            return response()->json(
                "No se encontro el archivo '$ruta'",
                404
            );
        }

        return $componente;
    }
}
