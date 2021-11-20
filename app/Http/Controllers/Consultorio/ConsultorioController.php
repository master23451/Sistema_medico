<?php

namespace App\Http\Controllers\Consultorio;

use App\Http\Controllers\Controller;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Consultorio::all();

        return view('consultorios.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosConsultorio=request()->all();

        $datosConsultorio=request()->except('_token');

        /*if($request->hasFile('Foto')){

            $datosConsultorio['Foto']=$request->file('Foto')->store('uploads','public');

        }
        */
        Consultorio::insert($datosConsultorio);

        //return response()->json($datosConsultorio);
        return redirect('consultorios') -> with('Mensaje','Consultorio agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);

        return view('consultorios.edit', compact('consultorio'));
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
        $datosConsultorio=request()->except(['_token','_method']);

        /*if($request->hasFile('Foto')){
            $consultorio = consultorios::findOrFail($id);
            Storage::delete('public/'.$consultorio->foto);
            $datosConsultorio['Foto']=$request->file('Foto')->store('uploads','public');
        }*/

        Consultorio::where('id','=',$id)->update($datosConsultorio);

        //$consultorio = consultorios::findOrFail($id);
        //return view('consultorios.edit', compact('consultorio'));

        return redirect()->route('consultorios.index')-> with('Mensaje','Consultorio modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        Consultorio::destroy($id);
        /*if(Storage::delete('public/'.$consultorio->foto)){



        }*/

        return redirect('consultorios')-> with('Mensaje','Consultorio eliminado con éxito');
    }
}
