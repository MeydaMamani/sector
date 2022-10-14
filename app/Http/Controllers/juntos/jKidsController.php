<?php

namespace App\Http\Controllers\juntos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\juntos\kids\ConsolidateExport;
use App\Exports\juntos\kids\creds\NewlyBornExport;
use App\Exports\juntos\kids\creds\CredMesExport;
use App\Exports\juntos\kids\creds\Cred12Export;
use App\Exports\juntos\kids\creds\CredPaqueteExport;

use App\Exports\juntos\kids\suple\Suple45Export;

use Illuminate\Http\Request;

class jKidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexKids()
    {
        return view('juntos/kids/index');
    }

    public function totalData()
    {
        $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')->count();
        return response(($nominal), 200);
    }

    public function printKids(Request $request)
    {
        $r = $request->red;
        $d = $request->distrito;
        $a = $request->anio;
        return Excel::download(new ConsolidateExport($r, $d, $a), 'DEIT_PASCO PADRON DE NIÑOS MENORES DE 24 MESES PARA LA ATENCION AL HOGAR.xlsx');
    }

    public function forGrafCred(Request $request)
    {
        $anio = $request->id;
        $resultPack = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("SUM(CASE
                    WHEN EDADMESES='0' AND CUMPLECRED_RNHIS IS NOT NULL  THEN 1
                        WHEN EDADMESES='1' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='2' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='3' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='4' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='5' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='6' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='7' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='8' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='9' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='10' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='11' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL AND  [11CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='12' AND [12CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='14' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='16' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='18' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='20' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL THEN 1
                        WHEN EDADMESES='22' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL THEN 1
                    ELSE 0 END) AVANCE_HIS"), DB::raw("SUM( CASE
                        WHEN EDADMESES='0' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL  THEN 1
                        WHEN EDADMESES='1' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='2' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='3' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='4' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='5' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='6' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='7' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='8' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='9' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='10' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='11' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL AND  [_CRED_11_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='12' AND [_CRED_12_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='14' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='16' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='18' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='20' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL THEN 1
                        WHEN EDADMESES='22' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL AND [_CRED_22_mes] IS NOT NULL THEN 1
                        ELSE 0
                    END) AVANCE_JUNTOS"))->get();

        if ($anio == 'TODOS') {
            $resultCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN
                            (CASE WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END +
                            CASE WHEN ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                        THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))->get();

            $resultCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes
                                IS NOT NULL AND _CRED_4_mes IS NOT NULL AND
                                _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN
                                ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))->get();

            $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select( DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes
                                IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"),
                                DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL
                                AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                            AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")
                )->get();
        } else {
            $resultCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN
                            (CASE WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END +
                            CASE WHEN ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                ->whereYear('FECHA_DE_NAC_MO', $anio)->get();

            $resultCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                ->select(
                    DB::raw("COUNT(*) DENOMINADOR"),
                    DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND
                            _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1)
                            'AVANCE_JUNT'"),
                    DB::raw("round((cast(SUM(CASE WHEN
                            ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1
                        ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")
                )->whereYear('FECHA_DE_NAC_MO', $anio)->get();

            $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                ->select(
                    DB::raw("COUNT(*) DENOMINADOR"),
                    DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes
                            IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"),
                    DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL
                            AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                            AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")
                )
                ->whereYear('FECHA_DE_NAC_MO', $anio)->get();
        }

        $query[] = json_decode($resultPack, true);
        $query[] = json_decode($resultCred, true);
        $query[] = json_decode($resultCredMes, true);
        $query[] = json_decode($resultCred12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function tableResumCreds(Request $request)
    {
        $resumRn = '';
        $resumCredMes = '';
        $resultCred12 = '';
        $resultPaquete = '';
        $anio = $request->id;
        $type = $request->type;
        if ($type == 'rn') {
            if ($anio == 'TODOS') {
                $resumRn = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN]
                                IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN]
                                IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                (CASE WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resumRn = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN]
                                IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN]
                                IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN (CASE
                                WHEN ([1CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN
                                ([3CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL_RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                    ->whereYear('FECHA_DE_NAC_MO', $anio)->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                    ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        } else if ($type == 'credMes') {
            if ($anio == 'TODOS') {
                $resumCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select( 'PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND
                                _CRED_9_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes
                                IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL
                                AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL
                                AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resumCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND
                                _CRED_9_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes
                                IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL
                                AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL
                                AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        } else if ($type == 'cred12') {
            if ($anio == 'TODOS') {
                $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN
                                (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL
                                AND _CRED_20_mes IS NOT NULL  AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                                IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")
                    )
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN
                                (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL
                                AND _CRED_20_mes IS NOT NULL  AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                                IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")
                    )
                    ->whereYear('FECHA_DE_NAC_MO', $anio)->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                    ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        } else if ($type == 'paquete') {
            if ($anio == 'TODOS') {
                $resultPaquete = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE
                                WHEN EDADMESES='0' AND CUMPLECRED_RNHIS IS NOT NULL  THEN 1
                                WHEN EDADMESES='1' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='2' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='3' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='4' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='5' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='6' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='7' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='8' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='9' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='10' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='11' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL AND  [11CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='12' AND [12CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='14' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='16' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='18' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='20' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='22' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL THEN 1
                                ELSE 0 END) 'NUM_HIS'"),
                        // DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                        // IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                        //     THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE
                                    WHEN EDADMESES='0' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL  THEN 1
                                    WHEN EDADMESES='1' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='2' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='3' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='4' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='5' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='6' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='7' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='8' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='9' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='10' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='11' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL AND  [_CRED_11_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='12' AND [_CRED_12_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='14' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='16' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='18' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='20' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL THEN 1
                                    WHEN EDADMESES='22' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL AND [_CRED_22_mes] IS NOT NULL THEN 1
                                    ELSE 0 END) 'NUM_JUNTOS'")
                    )
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resultPaquete = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE
                                WHEN EDADMESES='0' AND CUMPLECRED_RNHIS IS NOT NULL  THEN 1
                                WHEN EDADMESES='1' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='2' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='3' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='4' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='5' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='6' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='7' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='8' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='9' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='10' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='11' AND CUMPLECRED_RNHIS IS NOT NULL AND  [1CTRL] IS NOT NULL AND  [2CTRL] IS NOT NULL AND  [3CTRL] IS NOT NULL AND  [4CTRL] IS NOT NULL AND  [5CTRL] IS NOT NULL AND  [6CTRL] IS NOT NULL AND  [7CTRL] IS NOT NULL  AND  [8CTRL] IS NOT NULL  AND  [9CTRL] IS NOT NULL AND  [10CTRL] IS NOT NULL AND  [11CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='12' AND [12CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='14' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='16' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='18' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='20' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL THEN 1
                                WHEN EDADMESES='22' AND [12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL THEN 1
                                ELSE 0 END) 'NUM_HIS'"),
                        // DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                        // IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                        //     THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE
                                WHEN EDADMESES='0' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL  THEN 1
                                WHEN EDADMESES='1' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='2' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='3' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='4' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='5' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='6' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='7' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='8' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='9' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='10' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='11' AND CRN1 IS NOT NULL AND CRN2 IS NOT NULL AND  [_CRED_1_mes] IS NOT NULL AND  [_CRED_2_mes] IS NOT NULL AND  [_CRED_3_mes] IS NOT NULL AND  [_CRED_4_mes] IS NOT NULL AND  [_CRED_5_mes] IS NOT NULL AND  [_CRED_6_mes] IS NOT NULL AND  [_CRED_7_mes] IS NOT NULL  AND  [_CRED_8_mes] IS NOT NULL  AND  [_CRED_9_mes] IS NOT NULL AND  [_CRED_10_mes] IS NOT NULL AND  [_CRED_11_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='12' AND [_CRED_12_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='14' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='16' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='18' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='20' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL THEN 1
                                WHEN EDADMESES='22' AND [_CRED_12_mes] IS NOT NULL AND [_CRED_14_mes] IS NOT NULL AND [_CRED_16_mes] IS NOT NULL AND [_CRED_18_mes] IS NOT NULL AND [_CRED_20_mes] IS NOT NULL AND [_CRED_22_mes] IS NOT NULL THEN 1
                                ELSE 0 END) 'NUM_JUNTOS'")
                    )
                    ->whereYear('FECHA_DE_NAC_MO', $anio)->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                    ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        }

        $query[] = json_decode($resumRn, true);
        $query[] = json_decode($resumCredMes, true);
        $query[] = json_decode($resultCred12, true);
        $query[] = json_decode($resultPaquete, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printRn(Request $request)
    {
        $r = $request->redRn;
        $d = $request->distRn;
        $a = $request->anioRn;
        $t = $request->typeRn;
        return Excel::download(new NewlyBornExport($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE NIÑOS RECIEN NACIDOS.xlsx');
    }

    public function printCredMes(Request $request)
    {
        $red = $request->provCredMes;
        $dist = $request->distCredMes;
        $anio = $request->anioCredMes;
        $type = $request->typeCredMes;
        return Excel::download(new CredMesExport($red, $dist, $anio, $type), 'DEIT_PASCO REPORTE DE CREDS EN NIÑOS MENORES DE UN AÑO.xlsx');
    }

    public function printCred12(Request $request)
    {
        $red = $request->provCred12;
        $dist = $request->distCred12;
        $anio = $request->anioCred12;
        $type = $request->typeCred12;
        return Excel::download(new Cred12Export($red, $dist, $anio, $type), 'DEIT_PASCO REPORTE DE CREDS EN NIÑOS DE 1 A 2 AÑOS.xlsx');
    }

    public function printPaquete(Request $request)
    {
        $red = $request->provPaquete;
        $dist = $request->distPaquete;
        $anio = $request->anioPaquete;
        $type = $request->typePaquete;
        return Excel::download(new CredPaqueteExport($red, $dist, $anio, $type), 'DEIT_PASCO REPORTE DE PAQUETE NIÑOS.xlsx');
    }

    public function forGrafSuple(Request $request)
    {
        $anio = $request->id;
        if ($anio == 'TODOS') {
            $result45M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND
                            ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"),
                            DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $result611M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                            ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                            ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M]
                            IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL)
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $result12A = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"),
                                DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_JUNT'"),
                                DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();
        } else {
            $result45M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND
                            ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_JUNT'"),
                            DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->get();

            $result611M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                            ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                            ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M]
                            IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL)
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NAC_MO', $anio) ->get();

            $result12A = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"),
                                DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_JUNT'"),
                                DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->get();
        }

        $query[] = json_decode($result45M, true);
        $query[] = json_decode($result611M, true);
        $query[] = json_decode($result12A, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function tableResumSuple(Request $request)
    {
        $resum45 = '';
        $resum6_11 = '';
        $resultCred12 = '';
        $resultPaquete = '';
        $anio = $request->id;
        $type = $request->type;
        if ($type == 's45') {
            if ($anio == 'TODOS') {
                $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                            IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                            AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                            as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                            IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                            AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                            as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        } else if ($type == 's611') {
            if($anio == 'TODOS') {
                $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
            else {
                $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN
                                (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND
                                _CRED_9_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes
                                IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL
                                AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL
                                AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")
                    )->whereYear('FECHA_DE_NAC_MO', $anio)
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        } else if ($type == 'cred12') {
            if ($anio == 'TODOS') {
                $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN
                                (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL
                                AND _CRED_20_mes IS NOT NULL  AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                                IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")
                    )
                    ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            } else {
                $resultCred12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                    ->select(
                        'PROVINCIA_RES',
                        'DISTRITO_RES',
                        DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN
                                (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL
                                AND _CRED_20_mes IS NOT NULL  AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes
                                IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                        DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"),
                        DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")
                    )
                    ->whereYear('FECHA_DE_NAC_MO', $anio)->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                    ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
            }
        }

        $query[] = json_decode($resum45, true);
        $query[] = json_decode($resum6_11, true);
        $query[] = json_decode($resultCred12, true);
        $query[] = json_decode($resultPaquete, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printSuple5(Request $request)
    {
        $r = $request->provSuple5;
        $d = $request->distSuple5;
        $a = $request->anioSuple5;
        $t = $request->typeSuple5;
        return Excel::download(new Suple45Export($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE SUPLEMENTACIÓN EN NIÑOS DE 5 MESES.xlsx');
    }
}
