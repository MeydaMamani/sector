<?php

namespace App\Http\Controllers\juntos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\juntos\pregnants\ConsolidateExport;
use App\Exports\juntos\pregnants\EA\EAExport;
use App\Exports\juntos\pregnants\AP\APExport;

use Illuminate\Http\Request;

class jPregnantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPregnants()
    {
        return view('juntos/pregnants/index');
    }

    public function totalData()
    {
        $nominal = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS') ->where('DEPARTAMENTO_RES', 'PASCO') ->count();
        return response(($nominal), 200);
    }

    public function printPregnants(Request $request)
    {
        $r = $request->red;
        $d = $request->distrito;

        return Excel::download(new ConsolidateExport($r, $d), 'DEIT_PASCO PADRON DE GESTANTES PARA LA ATENCION AL HOGAR.xlsx');
    }

    public function forGrafEA()
    {
        $grafBat = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                    ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                    EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                    , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                    SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float)
                    * 100), 1) 'AVANCE_HIS'")) ->get();

        return response(($grafBat), 200);
    }

    public function tableResumGest(Request $request)
    {
        $examAux = ''; $Apn='';
        $type = $request->type;
        if($type == 'examAux'){
            $examAux = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                    ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
        }
        else if($type == 'apn'){
            $Apn = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                    ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                    DB::raw("SUM(
                        CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                is not null and _6_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_JUNT'"),
                        DB::raw("round((cast(
                            SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),
        
                        DB::raw("SUM( CASE
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                            is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                            is not null and CONTROL6 is not null THEN 1
                        WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                            ) THEN 1
                        ELSE 0
                    END) AS 'NUM_HIS'"),
                        DB::raw("round((cast(
                            SUM( CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                    is not null and CONTROL6 is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();

        }

        $query[] = json_decode($examAux, true);
        $query[] = json_decode($Apn, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printEA(Request $request)
    {
        $r = $request->provEA;
        $d = $request->distEA;
        $t = $request->typeEA;

        return Excel::download(new EAExport($r, $d, $t), 'DEIT_PASCO REPORTE DE EXAMENES AUXILIARES.xlsx');
    }

    public function forGrafAPN()
    {
        $grafApn = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                    ->select(DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("round((cast(SUM(
                        CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                is not null and _6_mes is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_JUNT'"),
                            DB::raw("round((cast(SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                        ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

        return response(($grafApn), 200);
    }

    public function printAPN(Request $request)
    {
        $r = $request->provAP;
        $d = $request->distAP;
        $t = $request->typeAP;
        return Excel::download(new APExport($r, $d, $t), 'DEIT_PASCO REPORTE DE ATENCIONES PRENATALES.xlsx');
    }
}
