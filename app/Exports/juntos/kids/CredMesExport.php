<?php

namespace App\Exports\juntos\kids;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CredMesExport implements FromView, ShouldAutoSize
{
    protected $red;
    protected $dist;
    protected $anio;
    protected $type;

    public function __construct($red, $dist, $anio, $type)
    {
        $this->red=$red;
        $this->dist=$dist;
        $this->anio=$anio;
        $this->type=$type;
    }

    public function view(): View {

        $red = $this->red;
        $dist = $this->dist;
        $anio = $this->anio;
        $type = $this->type;

        if($type == 'conteo'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_1_mes
                                    IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_1_mes IS NOT NULL AND
                                    _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes IS NOT NULL AND _CRED_9_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.credMes.printConteo', [ 'nominal' => $resCredMes, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_1_mes', '_CRED_2_mes', '_CRED_3_mes',
                                '_CRED_4_mes', '_CRED_5_mes', '_CRED_6_mes', '_CRED_7_mes', '_CRED_8_mes', '_CRED_9_mes', '_CRED_10_mes', '_CRED_11_mes',
                                DB::raw("CASE WHEN (_CRED_1_mes IS NOT NULL AND _CRED_2_mes IS NOT NULL AND _CRED_4_mes IS NOT NULL AND _CRED_6_mes
                                IS NOT NULL AND _CRED_9_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.credMes.printNominal', [ 'nominal' => $nominalCred, 'anio' => $anio ]);
        }
    }
}
