<?php

namespace App\Exports\juntos\kids\suple;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class suple611Export implements FromView, ShouldAutoSize
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
                if($anio == 'TODOS') {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
                else {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS') {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->where('PROVINCIA_RES', $red)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
                else {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS') {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->where('DISTRITO_RES', $dist)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
                else {
                    $resum6_11 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                    (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND
                                    ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1
                                    ELSE 0 END) AS SUPLE6_11_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND
                                    ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND
                                    ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                                    cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([EH_6M] IS NOT NULL AND
                                    [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }

            return view('juntos.kids.suple.suple611.printConteo', [ 'nominal' => $resum6_11, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple611 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_6M',
                                'ENTREGA_HIERRO_7M', 'ENTREGA_HIERRO_8M', 'ENTREGA_HIERRO_9M', 'ENTREGA_HIERRO_10M', 'ENTREGA_HIERRO_11M',
                                DB::raw("CASE WHEN (ENTREGA_HIERRO_6M IS NOT NULL AND ENTREGA_HIERRO_7M IS NOT NULL AND ENTREGA_HIERRO_8M
                                IS NOT NULL AND ENTREGA_HIERRO_9M IS NOT NULL AND ENTREGA_HIERRO_10M IS NOT NULL AND ENTREGA_HIERRO_11M
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M',
                                'EH_10M', 'EH_11M', DB::raw("CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL
                                AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.suple.suple611.printNominal', [ 'nominal' => $nomSuple611, 'anio' => $anio ]);
        }
    }
}
