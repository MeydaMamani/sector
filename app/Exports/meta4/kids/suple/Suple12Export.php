<?php

namespace App\Exports\meta4\kids\suple;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Suple12Export implements FromView, ShouldAutoSize
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
                    $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple12.printConteo', [ 'nominal' => $rSuple12, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                   THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHE
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 ENDEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_12M',
                                    'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                    'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M',
                                    'EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple12.printNominal', [ 'nominal' => $nominalSuple, 'anio' => $anio ]);
        }
    }
}
