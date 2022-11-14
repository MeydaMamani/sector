<?php

namespace App\Exports\meta4\kids\vaccine;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Vaccine2MExport implements FromView, ShouldAutoSize
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
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO_2M]
                                    IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.vaccine.vaccine2M.printConteo', [ 'nominal' => $tVac2M, 'anio' => $anio ]);
        }

        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('PROVINCIA', $red) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1_NEUMO_2M as NEUMO_2M',
                                '1_ROTA_2M as ROTA_2M','1_PENTA_2M as PENTA_2M', DB::raw("CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL
                                AND [1_PENTA_2M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.vaccine.vaccine2M.printNominal', ['nominal' => $tVac2M, 'anio' => $anio ]);
        }
    }
}
