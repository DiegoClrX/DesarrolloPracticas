<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Sacamos todas las incidencias
        //$incidencias = Incidencia::all(); //Eloquent
        $incidencias = DB::table('incidencias')->paginate(7); //Query Builder


        //Sesión para llevar contador de visitas de la url /incidencias
        if (session()->has('visitasIncidencia')) {
            $cont = session('visitasIncidencia', 'default');
            $cont++;
            session(['visitasIncidencia' => $cont]);
        } else {
            session(['visitasIncidencia' => 0]);
        }
        
        //Pintamos la vista incidencias con las incidencias y el contador
        return view('incidencias', [ 'incidencias' => $incidencias, 
                                     'contador' => session('visitasIncidencia')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidencia.nuevo')->with('mensaje','Nueva incidencia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación de los datos del formulario
        $validated = $request->validate([
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'estado' => 'required',
            'foto' => 'required|file|image|mimes:jpg,png',
        ]);

        try {
            /*
            //Insertar en BD a través de ELOQUENT
            $incidencia = new Incidencia;
            $incidencia->latitud = $request->latitud;
            $incidencia->longitud = $request->longitud;
            $incidencia->ciudad = $request->ciudad;
            $incidencia->direccion = $request->direccion;
            $incidencia->etiqueta = $request->etiqueta;
            $incidencia->descripcion = $request->descripcion;
            $incidencia->estado = $request->estado;
            $incidencia->save(); //Eloquent
            */

            //Insertar con Query Builder
            $id = DB::table('incidencias')->insertGetId([
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'ciudad' => $request->ciudad,
                'direccion' => $request->direccion,
                'etiqueta' => $request->etiqueta,
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
                'nivel' => $request->nivel
            ]);

        } catch (Exception $e) {
            Log::error("Error en BD insertando incidencia ".$e->getMessage());
            return "ERROR";
        }

        Log::info("Insertada incidencia");

        //Subir un archivo y grabarlo en nuestro disco. Carpeta storage
        //$path = $request->foto->storeAs('images','incidencia'.$incidencia->id.'.png');
        $path = $request->foto->storeAs('images','incidencia'.$id.'.png');

        //Creamos una cookie en el cliente
        /*
        return response('Incidencia')->cookie(
            'incidencia', 'hola mundo', 3
        );*/

        return redirect()->action(
            [IncidenciaController::class, 'show'], ['incidencia' => $id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$incidencia = Incidencia::findOrFail($id); //Eloquent
        //$incidencia = DB::table('incidencias')->where('id', $id)->first(); //Query Builder
        $incidencia = DB::table('incidencias')->find($id);
        
        return view('incidencia.profile', [
            'incidencia' => $incidencia
        ]);
        
        
        /*
        //Devuelve el modelo, o sea, la incidencia en JSON 
        $incidencia = Incidencia::findOrFail($id);
        return $incidencia;
        */
        
        /*
        return response($incidencia)
            ->header('Content-Type', 'application/json');
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidencia = DB::table('incidencias')->find($id);
        return view('incidencia.editar')->with('mensaje','Modificar incidencia')
                                        ->with('incidencia',$incidencia);
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
        //Query Builder
        DB::table('incidencias')
              ->where('id', $id)
              ->update([
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'ciudad' => $request->ciudad,
                'direccion' => $request->direccion,
                'etiqueta' => $request->etiqueta,
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
                'nivel' => $request->nivel
                ]);

        return redirect()->action(
            [IncidenciaController::class, 'show'], ['incidencia' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Query Builder
        DB::table('incidencias')->where('id', '=', $id)->delete();
        return redirect()->action(
            [IncidenciaController::class, 'index']
        );
    }
}
