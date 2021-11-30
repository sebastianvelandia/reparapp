<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ordens']=Orden::simplePaginate();
        return view('orden.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'estado'=>'required',
            'observaciones'=>'required|string',
            'producto'=>'required|string|max:100',
            'averia'=>'required|string'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosOrden = request()->except('_token');
        Orden::insert($datosOrden);
        return redirect('orden');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = Orden::findOrFail($id);
        return view('orden.edit', compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'estado'=>'required',
            'observaciones'=>'required|string',
            'producto'=>'required|string|max:100',
            'averia'=>'required|string'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosOrden = request()->except('_token');
        Orden::where('id','=',$id)->update($datosOrden);
        return redirect('orden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orden::destroy($id);
        return redirect('orden');
    }
}
