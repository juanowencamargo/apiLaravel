<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = Usuarios::all();
        return $usr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = new Usuarios();
        $usr->nombre = $request->nombre;
        $usr->apellidos = $request->apellidos;
        $usr->telefono = $request->telefono;
        $usr->genero = $request->genero;
        $usr->correo = $request->correo;
        $usr->imagen = $request->imagen;

        $usr->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usr = Usuarios::find($id);
        return $usr;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usr = Usuarios::find($id);

        $usr->nombre = $request->nombre;
        $usr->apellidos = $request->apellidos;
        $usr->telefono = $request->telefono;
        $usr->genero = $request->genero;
        $usr->correo = $request->correo;
        $usr->imagen = $request->imagen;

        $usr->save();

        return $usr;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usr = Usuarios::destroy($id);
        return $usr;
    }

    public function import($fileUp){
    Excel::load($fileUp, function($reader) {
 
     foreach ($reader->get() as $file) {
     Usuarios::create([
     'nombre' => $file->nombre,
     'apellidos' =>$file->apellidos,
     'telefono' =>$file->telefono,
     'genero' =>$file->genero,
     'correo' =>$file->correo,
     'imagen' =>$file->imagen
     ]);
       }
    });
 return Usuarios::all();
    }

}
