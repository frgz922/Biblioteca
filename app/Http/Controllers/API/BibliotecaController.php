<?php

namespace App\Http\Controllers\API;

use App\Models\Autor;
use App\Models\Biblioteca;
use App\Search\Search;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class BibliotecaController extends Controller
{
    /*funcion con todas la validaciones de los campos y los mensajes que mostrara de error*/

    protected function validator(array $data)
    {
        $messages = [
            'nombre_libro.required' => 'El nombre del libro es requerido.',
            'id_autor.required' => 'El id del autor es requerido.',
            'id_clasificacion.required' => 'El id de la clasificacion es requerido.',
//            'fecha_pub.required' => 'La fecha de publicacion es requerida.',
            'archivo.required' => 'El archivo PDF del libro es requerido.',
        ];
        return Validator::make($data, [
            'nombre_libro' => 'required|string',
            'id_autor' => 'required|integer',
            'id_clasificacion' => 'required|integer',
//            'fecha_pub' => 'required|date_format:d/m/Y',
            'archivo' => 'required|file|mimes:pdf'
        ], $messages);
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $query = Biblioteca::with('autor')->with('clasificacion')->orderBy('nombre_libro')->paginate(5);

        foreach ($query as $item) {
            $item->fecha_pub = Carbon::parse($item->fecha_pub)->format('d/m/Y');
        }

        return $query;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        return $data;
        $validator = $this->validator($data);

        if ($validator->fails()) {
            $success = false;
            $response = array(
                'success' => $success,
                'response' => $validator->errors()
            );
            return response()->json($response);
        } else {
            $archivo = $request->file('archivo');

            $nombreArchivo = preg_replace('/\s+/', '', $archivo->getClientOriginalName());

            $guardar = Storage::disk('public')->putFileAs('/libros', $archivo, $nombreArchivo);

            $autor = Autor::find($data['id_autor']);

            $nombreAutor = $autor->nombre_autor . ' ' . $autor->apellido_autor;
            $nombreAutor = str_replace(' ', '-', $nombreAutor);
            $nombreLibro = str_replace(' ', '+', $data['nombre_libro']);

            if(Input::file('thumbnail') != null) {

                $extension = strtolower(Input::file('thumbnail')->getClientOriginalExtension());
                $fileName = uniqid().'.'.$extension;

                if ($request->file('thumbnail')->isValid()) {

                    $file = $request->file('thumbnail');

                    // image upload in public/upload folder.
                    $file->move('img/thumbnail/', $fileName);

                    $thumbnail = 'img/thumbnail/'.$fileName;
                }
            } else {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.googleapis.com/books/v1/volumes?q=" . $nombreLibro . "+inauthor:" . $nombreAutor . "&orderBy=relevance",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        'Accept: application/json'
                    ),
                ));

                $responselibros = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                $responselibros = json_decode($responselibros, true);

                $thumbnail = isset($responselibros['items'][0]['volumeInfo']['imageLinks']) ? $responselibros['items'][0]['volumeInfo']['imageLinks']['thumbnail'] : asset('img/pdf-logo.png');
            }


            $biblioteca = New Biblioteca();

//            $fecha_pub = Carbon::createFromFormat('d/m/Y',$data['fecha_pub'])->format('Y-m-d');

            $biblioteca->nombre_libro = $data['nombre_libro'];
            $biblioteca->id_autor = $data['id_autor'];
            $biblioteca->id_clasificacion = $data['id_clasificacion'];
//            $biblioteca->fecha_pub = $fecha_pub;
            $biblioteca->url_libro = $guardar;
            $biblioteca->url_thumbnail = $thumbnail;

            $biblioteca->save();


            $success = true;
            $response = array(
                'success' => $success,
                'response' => $biblioteca
            );
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Biblioteca::with('autor')->with('clasificacion')->where('id', $id)->get();

        /*foreach ($query as $item) {
            $item->fecha_pub = Carbon::parse($item->fecha_pub)->format('d/m/Y');
        }*/

        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
//        return $data;
        $validator = $this->validator($data); /*aqui la uso pasandole el request*/

        if ($validator->fails()) { /*valido si falla o no*/
            $success = false;
            $response = array(
                'success' => $success,
                'response' => $validator->errors()
            );
            return response()->json($response);
        } else {

            $nombreArchivoOld = Biblioteca::find($id);

            $archivo = $request->file('archivo');


            Storage::disk('public')->delete($nombreArchivoOld->url_libro);


            $nombreArchivo = preg_replace('/\s+/', '', $archivo->getClientOriginalName());

            $guardar = Storage::disk('public')->putFileAs('/libros', $archivo, $nombreArchivo);

            $autor = Autor::find($data['id_autor']);

            $nombreAutor = $autor->nombre_autor . ' ' . $autor->apellido_autor;
            $nombreAutor = str_replace(' ', '-', $nombreAutor);
            $nombreLibro = str_replace(' ', '+', $data['nombre_libro']);

            if(Input::file('thumbnail') != null) {

                $extension = strtolower(Input::file('thumbnail')->getClientOriginalExtension());
                $fileName = uniqid().'.'.$extension;

                if ($request->file('thumbnail')->isValid()) {

                    $file = $request->file('thumbnail');

                    // image upload in public/upload folder.
                    $file->move('img/thumbnail/', $fileName);
                    $thumbnail = 'img/thumbnail/'.$fileName;

                }
            } else {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.googleapis.com/books/v1/volumes?q=" . $nombreLibro . "+inauthor:" . $nombreAutor . "&orderBy=relevance",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        'Accept: application/json'
                    ),
                ));

                $responselibros = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                $responselibros = json_decode($responselibros, true);

                $thumbnail = isset($responselibros['items'][0]['volumeInfo']['imageLinks']) ? $responselibros['items'][0]['volumeInfo']['imageLinks']['thumbnail'] : asset('img/pdf-logo.png');
            }

//            $fecha_pub = Carbon::createFromFormat('d/m/Y',$data['fecha_pub'])->format('Y-m-d');

            $query = Biblioteca::find($id)
                ->update([
                    'nombre_libro' => $data['nombre_libro'],
                    'id_autor' => $data['id_autor'],
                    'id_clasificacion' => $data['id_clasificacion'],
//                    'fecha_pub' => $fecha_pub,
                    'url_libro' => $guardar,
                    'url_thumbnail' => $thumbnail
                ]);

            if ($query == true) {
                $success = true;
                $response = array(
                    'success' => $success,
                    'response' => 'Libro actualizado con éxito.'
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Biblioteca::find($id);

        Storage::disk('public')->delete($query->url_libro);

        if ($query->delete()) {
            $msj = 'Registro eliminado con éxito.';
            $libro = 1;
        } else {
            $msj = 'Ocurrió un error al momento de eliminar el registro. Por favor intente de nuevo.';
            $libro = 0;
        }

        $response = array('eliminado' => $libro, 'msj' => $msj);

        return response()->json($response);
    }

    public function filterLibros(Request $request)
    {
        if ($request->input('autor') == null || $request->input('autor') == '') {
            $except = $request->except('autor');
            $request = new Request();

            $request->replace($except);
        }

        if ($request->input('clasificacion') == null || $request->input('clasificacion') == '') {
            $except = $request->except('clasificacion');
            $request = new Request();

            $request->replace($except);
        }

        if ($request->input('nombreLibro') == null || $request->input('nombreLibro') == '') {
            $except = $request->except('nombreLibro');
            $request = new Request();

            $request->replace($except);
        }

        /*if ($request->input('fechaPub') == null || $request->input('fechaPub') == '') {
            $except = $request->except('fechaPub');
            $request = new Request();

            $request->replace($except);
        }*/
//        return \request()->all();

        $search = Search::apply($request);
//        return $search;

        if (count($search) > 0) {

            foreach ($search as $item) {
                $item->fecha_pub = Carbon::parse($item->fecha_pub)->format('d/m/Y');
            }

            $response = array(
                'success' => true,
                'result' => $search
            );
        } else {
            $response = array(
                'success' => false,
                'msg' => 'No se encontraron resultados según los criterios de la búsqueda.'
            );
        }


        return $response;

    }

}
