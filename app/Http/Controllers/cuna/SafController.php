<?php

namespace App\Http\Controllers\cuna;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Exports\cuna\saf\ConsolidateExport;
use App\Exports\cuna\saf\packExport;
use App\Exports\cuna\saf\packObservedExport;

class SafController extends Controller
{
    public function indexSaf() {
        return view('cuna/saf/index');
    }

    public function printNominal(Request $request){
        $r = $request->red; $d = $request->distrito; $a = $request->anio;
        return Excel::download(new ConsolidateExport($r, $d, $a), 'DEIT_PASCO REPORTE SAF CUNA MAS.xlsx');
    }

    public function totalData()
    {
        $nominal = DB::table('dbo.CUNA_SAF_PADRON_CONSOLIDADO_NINO')
                    ->where('Fecha_de_Nacimiento_del_usuario', '>=', '2022-10-01') ->count();
        return response(($nominal), 200);
    }

    public function forGrafPack(Request $request)
    {
        $result = DB::table('dbo.PAQUETE_NINIO_OCTUBRE_CUNA_SAF')
                        ->select('Provincia',
                        DB::raw("round((cast(SUM(CASE WHEN CUMPLE='CUMPLE' THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE'"))
                        ->groupBy('Provincia') ->orderBy('Provincia', 'ASC')
                        ->get();

        $query[] = json_decode($result, true);

        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printPack()
    {
        return Excel::download(new packExport(), 'DEIT_PASCO CUNA - REPORTE PAQUETE NIÑO.xlsx');
    }

    public function printPackObs(Request $request)
    {
        return Excel::download(new packObservedExport(), 'DEIT_PASCO REPORTE PAQUETE NIÑO OBSERVADOS.xlsx');
    }
}
