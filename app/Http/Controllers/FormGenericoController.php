<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class FormGenericoController extends Controller
{
    public function genericoNewUpdate(Request $request)
    {

        if (Auth::check()) {

            $model = $request->input('model');

            $modelClass = 'App\Models\\' . $model;

            if (class_exists($modelClass)) {
                //resuelve la instancia del modelo y guarda en modelInstance el modelo a utilizar
                $modelInstance = app()->make($modelClass);

                //campos permitidos para la asignacion
                $fillableFields = $modelInstance->getFillable();

                //obtenemos todos los campos que vienen por parametros - deberian tener el mismo nombre que el campo en bd
                $data = $request->all();

                //nuevo arreglo con los datos que coinciden con los campos permitidos
                $dataToInsert = [];
                foreach ($fillableFields as $field) {
                    if (isset($data[$field])) {
                        $dataToInsert[$field] = $data[$field];
                    }
                }

                $id = $request->input('id');

                if ($id) {

                    $check = $this->update($dataToInsert, $modelInstance, $id);
                    return redirect()->back()->withSuccess('actualizado con exito!');;
                } else {

                    $check = $this->create($dataToInsert, $modelInstance);
                    return redirect()->back()->withSuccess('creado con exito!');
                }
            }
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function create(array $data, $model)
    {
        return $model::create([
            $data
        ]);
    }

    public function update(array $data, $model, $id)
    {
        return $model::where('id', $id)->update([
            $data
        ]);
    }

    public function genericoDelete(Request $request)
    {

        if (Auth::check()) {

            $model = $request->input('model');

            $modelClass = 'App\Models\\' . $model;

            if (class_exists($modelClass)) {

                //resuelve la instancia del modelo y guarda en modelInstance el modelo a utilizar
                $modelInstance = app()->make($modelClass);

                $id = $request->input('id');

                if (!$id) {
                    return redirect("dashboard")->with('error', 'Debes pasar el ID');
                }

                $modelInstance::where('id', $id)->delete();

                return redirect()->back();
            }
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }
}
