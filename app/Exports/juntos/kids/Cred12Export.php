<?php

namespace App\Exports\juntos\kids;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Cred12Export implements FromView, ShouldAutoSize
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
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL  AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resCredMes = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (_CRED_12_mes
                                    IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes
                                    IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN (_CRED_12_mes IS NOT NULL AND
                                    _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL)
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE
                                    WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL]
                                    IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL AND
                                    [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.cred12.printConteo', [ 'nominal' => $resCredMes, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"),
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"),
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '_CRED_12_mes', '_CRED_14_mes', '_CRED_16_mes',
                                '_CRED_18_mes', '_CRED_20_mes', '_CRED_22_mes',
                                DB::raw("CASE WHEN (_CRED_12_mes IS NOT NULL AND _CRED_14_mes IS NOT NULL AND _CRED_16_mes IS NOT NULL AND _CRED_18_mes
                                IS NOT NULL AND _CRED_20_mes IS NOT NULL AND _CRED_22_mes IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"),
                                '12CTRL as CTRL12', '14CTRL as CTRL14', '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22',
                                DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS
                                NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.cred12.printNominal', [ 'nominal' => $nominalCred, 'anio' => $anio ]);
        }
    }
}
