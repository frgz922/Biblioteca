<?php

namespace App\Http\Controllers\API;

use App\Models\Clasificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClasificacionController extends Controller
{
    /*funcion con todas la validaciones de los campos y los mensajes que mostrara de error*/

    protected function validator(array $data)
    {
        $messages = [
            'nombre_clasificacion.required' => 'El nombre de la clasificacion es requerido.',
        ];
        return Validator::make($data, [
            'nombre_clasificacion' => 'required|string',
        ], $messages);
    }


    public function index()
    {
        $query = Clasificacion::orderBy('nombre_clasificacion')->get();

        return $query;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data); /*aqui la uso pasandole el request*/

        if ($validator->fails()) { /*valido si falla o no*/
            $success = false;
            $response = array(
                'success' => $success,
                'response' => $validator->errors()
            );
            return response()->json($response);
        } else {
            $clasificacion = New Clasificacion();

            $clasificacion->nombre_clasificacion = $data['nombre_clasificacion'];

            $clasificacion->save();
            $success = true;
            $response = array(
                'success' => $success,
                'response' => $clasificacion
            );
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Clasificacion::find($id);
        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = $this->validator($data); /*aqui la uso pasandole el request*/

        if ($validator->fails()) { /*valido si falla o no*/
            $success = false;
            $response = array(
                'success' => $success,
                'response' => $validator->errors()
            );
            return response()->json($response);
        } else {
            $query = Clasificacion::find($id)
                ->update(['nombre_clasificacion' => $data['nombre_clasificacion']]);

            if ($query == true) {
                $success = true;
                $response = array(
                    'success' => $success,
                    'response' => 'Clasificacion actualizada con éxito.'
                );
            } else {
                $success = false;
                $response = array(
                    'success' => $success,
                    'response' => 'Ocurrió un error al momento de realizar la actualización. Por favor intente de nuevo.'
                );
            }
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Clasificacion::find($id);

        if ($query->delete()) {
            $msj = 'Registro eliminado con éxito.';
            $clasificacion = 1;
        } else {
            $msj = 'Ocurrió un error al momento de eliminar el registro. Por favor intente de nuevo.';
            $clasificacion = 0;
        }

        $response = array('eliminado' => $clasificacion, 'msj' => $msj);

        return response()->json($response);
    }
}
