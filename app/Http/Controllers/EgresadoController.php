<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|string|max:8|unique:egresados,matricula,',
            'nombre_completo' => 'required|string|max:255',
            'carrera_id' => 'required|exists:carreras,id',
            'generacion_id' => 'required|exists:generaciones,id',
            'estatus_id' => 'required|exists:estatus,id',
            'genero' => 'required',
            'telefono' => 'nullable',
            'correo' => 'nullable|email',
            'domicilio' => 'nullable'
        ]);



        Egresado::create($request->only([
            'matricula',
            'nombre_completo',
            'carrera_id',
            'generacion_id',
            'estatus_id',
            'genero',
            'telefono',
            'correo',
            'domicilio'
        ]));


        return redirect()->route('dashboard')
            ->with('success', 'Egresado registrado correctamente');
    }
    
    public function update(Request $request, Egresado $egresado)
    {

        $request->validate([
            'matricula' => 'required|string|max:8|unique:egresados,matricula,' . $egresado->id,
            'nombre_completo' => 'required|string|max:255',
            'carrera_id' => 'required|exists:carreras,id',
            'generacion_id' => 'required|exists:generaciones,id',
            'estatus_id' => 'required|exists:estatus,id',
            'genero' => 'required',
            'telefono' => 'nullable',
            'correo' => 'nullable|email',
            'domicilio' => 'nullable'
        ]);

        $egresado->update($request->only([
            'matricula',
            'nombre_completo',
            'carrera_id',
            'generacion_id',
            'estatus_id',
            'genero',
            'telefono',
            'correo',
            'domicilio'
        ]));


        return redirect()->back()->with('success', 'Egresado actualizado correctamente');
    }

    public function destroy(Egresado $egresado)
    {
        $egresado->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Egresado eliminado correctamente');
    }
    

   


}


