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
                    $rSuple12 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rSuple12 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
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
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('PROVINCIA', $red)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('DISTRITO', $dist)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalSuple = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-12M as EH_12M',
                                    'EH-13M as EH_13M', 'EH-14M as EH_14M', 'EH-15M as EH_15M', 'EH-16M as EH_16M', 'EH-17M as EH_17M',
                                    'EH-18M as EH_18M', 'EH-19M as EH_19M', 'EH-20M as EH_20M', 'EH-21M as EH_21M', 'EH-22M as EH_22M',
                                    'EH-23M as EH_23M', DB::raw("CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                    THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple12.printNominal', [ 'nominal' => $nominalSuple, 'anio' => $anio ]);
        }
    }
}
