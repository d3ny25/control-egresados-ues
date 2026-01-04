<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\Carrera;
use App\Models\Generacion;
use App\Models\Estatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Catálogos para filtros
        |--------------------------------------------------------------------------
        */
        $carreras = Carrera::all();
        $generaciones = Generacion::all();
        $estatuses = Estatus::all();

        /*
        |--------------------------------------------------------------------------
        | Query base (SE USA PARA TODO)
        |--------------------------------------------------------------------------
        */
        $query = Egresado::with(['carrera', 'generacion', 'estatus']);

        // 🔍 Filtros dinámicos
        if ($request->filled('carrera_id')) {
            $query->where('carrera_id', $request->carrera_id);
        }

        if ($request->filled('generacion_id')) {
            $query->where('generacion_id', $request->generacion_id);
        }

        if ($request->filled('estatus_id')) {
            $query->where('estatus_id', $request->estatus_id);
        }

        /*
        |--------------------------------------------------------------------------
        | Estadísticas (DINÁMICAS según filtros)
        |--------------------------------------------------------------------------
        */
        $totalEgresados = (clone $query)->count();

        $totalTitulados = (clone $query)->whereHas('estatus', function ($q) {
            $q->where('nombre', 'Titulado');
        })->count();

        $totalSeguimiento = (clone $query)->whereHas('estatus', function ($q) {
            $q->where('nombre', 'En seguimiento');
        })->count();

        /*
        |--------------------------------------------------------------------------
        | Totales por carrera (respetando filtros)
        |--------------------------------------------------------------------------
        */
        $totalesPorCarrera = Carrera::withCount([
            'egresados' => function ($q) use ($request) {

                if ($request->filled('generacion_id')) {
                    $q->where('generacion_id', $request->generacion_id);
                }

                if ($request->filled('estatus_id')) {
                    $q->where('estatus_id', $request->estatus_id);
                }
            }
        ])->get();

        /*
        |--------------------------------------------------------------------------
        | Listado de egresados (PAGINADO)
        |--------------------------------------------------------------------------
        */
        $egresados = $query
            ->orderBy('nombre_completo')
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.index', compact(
            'egresados',
            'carreras',
            'generaciones',
            'estatuses',
            'totalEgresados',
            'totalTitulados',
            'totalSeguimiento',
            'totalesPorCarrera'
        ));
    }
}
