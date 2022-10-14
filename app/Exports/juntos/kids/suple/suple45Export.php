<?php

namespace App\Exports\juntos\kids\suple;

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
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }else{
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }else{
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }else{
                    $resum45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (ENTREGA_HIERRO_4M
                                IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                                (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }

            return view('juntos.kids.suple.suple45.printConteo', [ 'nominal' => $resum45, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple45 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_4M',
                                'ENTREGA_HIERRO_5M', DB::raw("CASE WHEN (ENTREGA_HIERRO_4M IS NOT NULL AND ENTREGA_HIERRO_5M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_4M as EH_4M', 'EH_5M as EH_5M',
                                DB::raw("CASE WHEN ([EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.suple.suple45.printNominal', [ 'nominal' => $nomSuple45, 'anio' => $anio ]);
        }
    }
}
