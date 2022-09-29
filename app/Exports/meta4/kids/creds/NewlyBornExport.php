<?php

namespace App\Exports\meta4\kids\creds;

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
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'")) ->where('PROVINCIA', $red)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'"))
                                    ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'")) ->where('DISTRITO', $dist)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                    ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                    IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                    (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'"))
                                    ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.Rn.printConteo', [ 'nominal' => $resumRn, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'"))->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'CRN1', 'CRN2',
                                '1CTRL RN as CTRL1_RN', '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('PROVINCIA', $red)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('DISTRITO', $dist)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalRn = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL RN as CTRL1_RN',
                                '2CTRL RN as CTRL2_RN', '3CTRL RN as CTRL3_RN', '4CTRL RN as CTRL4_RN', DB::raw("CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 'Cumple' ELSE 'No Cumple' END AS 'CUMPLE_HIS'")) ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.creds.Rn.printNominal', [ 'nominal' => $nominalRn, 'anio' => $anio ]);
        }
    }
}
