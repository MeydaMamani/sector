<?php

namespace App\Exports\meta4\kids\suple;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Suple611Export implements FromView, ShouldAutoSize
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
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->where('PROVINCIA', $red) ->groupBy('PROVINCIA')
                                ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->where('PROVINCIA', $red)
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->where('DISTRITO', $dist) ->groupBy('PROVINCIA')
                                ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND
                                [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->where('DISTRITO', $dist)
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple611.printConteo', [ 'nominal' => $rSuple611, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EEH_10M', 'EEH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EEH_10M', 'EEH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->where('PROVINCIA', $red)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH_6M',
                                    'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M',
                                    DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M]
                                    IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->where('DISTRITO', $dist)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple611.printNominal', [ 'nominal' => $nomSuple611, 'anio' => $anio ]);
        }
    }
}
