<?php

namespace App\Http\Controllers\API;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    /*funcion con todas la validaciones de los campos y los mensajes que mostrara de error*/

    protected function validator(array $data)
    {
        $messages = [
            'nombre_autor.required' => 'El nombre del autor es requerido.',
            'apellido_autor.required' => 'El apellido del autor es requerido.'
        ];
        return Validator::make($data, [
            'nombre_autor' => 'required|string',
            'apellido_autor' => 'required|string',
        ], $messages);
    }

    public function index()
    {
        $query = Autor::orderBy('nombre_autor')->get();

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
            $autor = New Autor();

            $autor->nombre_autor = $data['nombre_autor'];
            $autor->apellido_autor = $data['apellido_autor'];

            $autor->save();
            $success = true;
            $response = array(
                'success' => $success,
                'response' => $autor
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
        $query = Autor::find($id);

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
            $query = Autor::find($id)
                ->update(['nombre_autor' => $data['nombre_autor'], 'apellido_autor' => $data['apellido_autor']]);

            if ($query == true) {
                $success = true;
                $response = array(
                    'success' => $success,
                    'response' => 'Autor actualizado con éxito.'
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
        $query = Autor::find($id);

        if ($query->delete()) {
            $msj = 'Registro eliminado con éxito.';
            $autor = 1;
        } else {
            $msj = 'Ocurrió un error al momento de eliminar el registro. Por favor intente de nuevo.';
            $autor = 0;
        }

        $response = array('eliminado' => $autor, 'msj' => $msj);

        return response()->json($response);
    }

}
