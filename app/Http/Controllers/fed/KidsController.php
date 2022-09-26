<?php

namespace App\Http\Controllers\fed;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Http\Request;

class KidsController extends Controller
{
    public function index(Request $request) {
        return view('fed/kids/Premature/index');
    }

    public function listPremature(Request $request){
        $red_1 = $request->red;
        $dist = $request->distrito;
        $anio = $request->anio;
        $mes = $request->mes;

        if (strlen($mes) == 1){ $mes2 = '0'.$mes; }
        else{ $mes2 = $mes; }

        if ($red_1 == '01') { $red = 'PASCO'; }
        elseif ($red_1 == '02') { $red = 'DANIEL ALCIDES CARRION'; }
        elseif ($red_1 == '03') { $red = 'OXAPAMPA'; }

        if($red_1 == 'TODOS'){
            $nominal = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes) ->where('BAJO_PESO_PREMATURO', 'SI')
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();

            $t_resume = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV','DEN_PREMATURO.NOMBRE_DIST','DEN_PREMATURO.DENOMINADOR', 'NUM_PREMATURO.NUMERADOR')
                    // (DB::raw('round((cast(NUM_PREMATURO.NUMERADOR as float) / cast(DEN_PREMATURO.DENOMINADOR as float) * 100), 1) AS AVANCE')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC')
                    ->get();

            $resum_red = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV', (DB::raw('SUM(DEN_PREMATURO.DENOMINADOR) AS DEN')), (DB::raw('SUM(NUM_PREMATURO.NUMERADOR) AS NUM')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->groupBy('DEN_PREMATURO.NOMBRE_PROV') ->orderBy('NOMBRE_PROV', 'ASC')
                    ->get();
        }
        else if($red_1 != 'TODOS' && $dist == 'TODOS'){
            $nominal = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes)
                    ->where('BAJO_PESO_PREMATURO', 'SI') ->where('NOMBRE_PROV', $red)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();

            $t_resume = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV','DEN_PREMATURO.NOMBRE_DIST','DEN_PREMATURO.DENOMINADOR', 'NUM_PREMATURO.NUMERADOR')
                    // (DB::raw('round((cast(NUM_PREMATURO.NUMERADOR as float) / cast(DEN_PREMATURO.DENOMINADOR as float) * 100), 1) AS AVANCE')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->where('DEN_PREMATURO.NOMBRE_PROV', $red)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC')
                    ->get();

            $resum_red = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV', (DB::raw('SUM(DEN_PREMATURO.DENOMINADOR) AS DEN')), (DB::raw('SUM(NUM_PREMATURO.NUMERADOR) AS NUM')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->where('DEN_PREMATURO.NOMBRE_PROV', $red)
                    ->groupBy('DEN_PREMATURO.NOMBRE_PROV') ->orderBy('DEN_PREMATURO.NOMBRE_PROV', 'ASC')
                    ->get();
        }
        else if($dist != 'TODOS'){
            if($dist == 'CONSTITUCIÓN'){ $dist = 'CONSTITUCION'; }
            if($dist == 'SAN FRANCISCO DE ASIS DE YARUSYACAN'){ $dist = 'SAN FCO DE ASIS DE YARUSYACAN'; }
            $nominal = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes)
                    ->where('BAJO_PESO_PREMATURO', 'SI') ->where('NOMBRE_DIST', $dist)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();

            $t_resume = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV','DEN_PREMATURO.NOMBRE_DIST','DEN_PREMATURO.DENOMINADOR', 'NUM_PREMATURO.NUMERADOR')
                    // (DB::raw('round((cast(NUM_PREMATURO.NUMERADOR as float) / cast(DEN_PREMATURO.DENOMINADOR as float) * 100), 1) AS AVANCE')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->where('DEN_PREMATURO.NOMBRE_DIST', $dist)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC')
                    ->get();

            $resum_red = DB::table('DEN_PREMATURO')
                    ->select('DEN_PREMATURO.NOMBRE_PROV', (DB::raw('SUM(DEN_PREMATURO.DENOMINADOR) AS DEN')), (DB::raw('SUM(NUM_PREMATURO.NUMERADOR) AS NUM')))
                    ->leftJoin('NUM_PREMATURO', 'DEN_PREMATURO.NOMBRE_DIST', '=', 'NUM_PREMATURO.NOMBRE_DIST')
                    ->where('DEN_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('DEN_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('NUM_PREMATURO.PERIODO_MEDICION', $anio.'-'. $mes) ->where('NUM_PREMATURO.CORTE_PADRON', $anio.''.$mes2)
                    ->where('DEN_PREMATURO.DENOMINADOR', '>', '0') ->where('DEN_PREMATURO.NOMBRE_DIST', $dist)
                    ->groupBy('DEN_PREMATURO.NOMBRE_PROV') ->orderBy('DEN_PREMATURO.NOMBRE_PROV', 'ASC')
                    ->get();
        }

        $q[] = json_decode($nominal, true);
        $q[] = json_decode($t_resume, true);
        $q[] = json_decode($resum_red, true);
        $r = json_encode($q);
        return response(($r), 200);
    }

    public function printPremature(Request $request){
        $red_1 = $request->r; $dist = $request->d; $anio = $request->a; $mes = $request->m;

        if (strlen($mes) == 1){ $mes2 = '0'.$mes; }
        else{ $mes2 = $mes; }

        if ($red_1 == '01') { $red = 'PASCO'; }
        elseif ($red_1 == '02') { $red = 'DANIEL CARRION'; }
        elseif ($red_1 == '03') { $red = 'OXAPAMPA'; }

        if($red_1 == 'TODOS'){
            $nom = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes) ->where('BAJO_PESO_PREMATURO', 'SI')
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();
        }
        else if($red_1 != 'TODOS' && $dist == 'TODOS'){
            $nom = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes)
                    ->where('BAJO_PESO_PREMATURO', 'SI') ->where('NOMBRE_PROV', $red)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();
        }
        else if($dist != 'TODOS'){
            if($dist == 'CONSTITUCIÓN'){ $dist = 'CONSTITUCION'; }
            if($dist == 'SAN FRANCISCO DE ASIS DE YARUSYACAN'){ $dist = 'SAN FCO DE ASIS DE YARUSYACAN'; }
            $nom = DB::table('dbo.CONSOLIDADO_PREMATURO')
                    ->where('CORTE_PADRON', $anio.''.$mes2) ->where('PERIODO_MEDICION', $anio.'-'. $mes)
                    ->where('BAJO_PESO_PREMATURO', 'SI') ->where('NOMBRE_DIST', $dist)
                    ->orderBy('NOMBRE_PROV', 'ASC') ->orderBy('NOMBRE_DIST', 'ASC') ->orderBy('NOMBRE_EESS', 'ASC')
                    ->get();
        }

        return Excel::download(new PrematureExport($nom, $anio, $request->nameMonth, $request->pn, $request->cnv), 'DEIT_PASCO CG_FT_PREMATUROS.xlsx');
    }
}
