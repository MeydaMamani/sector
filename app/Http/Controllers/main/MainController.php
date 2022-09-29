<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function province() {
        $provinces_all = DB::connection('BDHIS_MINSA')->table('MAESTRO_HIS_ESTABLECIMIENTO')
                    ->select('Departamento', 'Provincia') ->where('Departamento', 'PASCO')
                    ->groupBy('Departamento') ->groupBy('Provincia')
                    ->orderBy('Departamento', 'ASC') ->orderBy('Provincia', 'ASC')
                    ->get();

        return response()->json($provinces_all, 200);
    }

    public function district(Request $request) {
        $dist = $request->id;
        $distritcs_all = DB::connection('BDHIS_MINSA')->table('MAESTRO_HIS_ESTABLECIMIENTO')
                    ->select('Departamento', 'Provincia', 'Distrito') ->where('Provincia', $dist)
                    ->groupBy('Departamento') ->groupBy('Provincia') ->groupBy('Distrito')
                    ->orderBy('Departamento', 'ASC') ->orderBy('Provincia', 'ASC') ->orderBy('Distrito', 'ASC')
                    ->get();

        return response()->json($distritcs_all, 200);
    }

    public function datePadronNominal() {
        // DB::connection('BDHIS_MINSA')->table('MAESTRO_HIS_ESTABLECIMIENTO')
        $query =DB::connection('BD_PADRON_NOMINAL')->table('NOMINAL_PADRON_NOMINAL')
                    ->select((DB::raw('MAX(FECHA_MODIFICACION_REGISTRO) AS DATE_MODIFY')))
                    ->get();

        return response()->json($query, 200);
    }
}