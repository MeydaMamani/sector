<?php

namespace App\Exports\juntos\kids;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NewlyBornExport implements FromView, ShouldAutoSize
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
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                                    ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
    
                }else{
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN (CASE
                                    WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN
                                    ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1
                                    ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                                    ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                    ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                    ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('DISTRITO_RES') ->get();

                }else{
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN (CASE
                                    WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN
                                    ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1
                                    ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                    ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                    ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->get();

                }else{
                    $resumRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) AS RN_JUNT_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                    'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN (CASE
                                    WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN
                                    ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1
                                    ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                    ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.Rn.printConteo', [ 'nominal' => $resumRn, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'"))->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nominalRn = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'CRN1', 'CRN2', DB::raw("CASE WHEN
                                (CRN1 IS NOT NULL AND CRN2 IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_JUNTOS'"), '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.Rn.printNominal', [ 'nominal' => $nominalRn, 'anio' => $anio ]);
        }
    }
}
