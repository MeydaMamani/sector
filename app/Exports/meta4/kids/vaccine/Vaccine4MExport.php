<?php

namespace App\Exports\meta4\kids\vaccine;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Vaccine4MExport implements FromView, ShouldAutoSize
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
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M]
                                    IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA')
                                    ->orderBy('DISTRITO') ->get();

                }else{
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M]
                                    IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA')
                                    ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.vaccine.vaccine4M.printConteo', [ 'nominal' => $tVac4M, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') 
                                ->where('PROVINCIA', $red) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') 
                                ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $tVac4M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '2_NEUMO_4M as NEUMO_4M',
                                '2_ROTA_4M as ROTA_4M','2_PENTA_4M as PENTA_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL
                                AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.vaccine.vaccine4M.printNominal', ['nominal' => $tVac4M, 'anio' => $anio ]);
        }
    }
}
