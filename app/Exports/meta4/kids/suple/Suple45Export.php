<?php

namespace App\Exports\meta4\kids\suple;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Suple45Export implements FromView, ShouldAutoSize
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
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resumSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                    IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                    * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple45.printConteo', [ 'nominal' => $resumSuple45, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('NUMERO_DE_DOCUMENTO_DEL_NINO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('PROVINCIA', $red) ->orderBy('PROVINCIA')
                                ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('NUMERO_DE_DOCUMENTO_DEL_NINO', $anio)
                                ->where('PROVINCIA', $red) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('DISTRITO', $dist) ->orderBy('PROVINCIA')
                                ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nomSuple45 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'EH-4M as EH_4M',
                                'EH-5M as EH_5M', DB::raw("CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL)
                                THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('NUMERO_DE_DOCUMENTO_DEL_NINO', $anio)
                                ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.suple.suple45.printNominal', [ 'nominal' => $nomSuple45, 'anio' => $anio ]);
        }
    }
}
