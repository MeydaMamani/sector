<?php

namespace App\Exports\juntos\kids\suple;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class suple12Export implements FromView, ShouldAutoSize
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
                if ($anio == 'TODOS') {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                } else {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if ($anio == 'TODOS') {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                } else {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->where('PROVINCIA_RES', $red)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($dist != 'TODOS'){
                if ($anio == 'TODOS') {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                } else {
                    $resSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_JUNT'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"),
                                DB::raw("SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"),
                                DB::raw("round((cast(SUM( CASE WHEN (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->where('DISTRITO_RES', $dist)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }

            return view('juntos.kids.suple.suple12.printConteo', [ 'nominal' => $resSuple12, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                            THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                            THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                            THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomSuple12 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'ENTREGA_HIERRO_12M', 'ENTREGA_HIERRO_13M',
                                'ENTREGA_HIERRO_14M', 'ENTREGA_HIERRO_15M', 'ENTREGA_HIERRO_16M', 'ENTREGA_HIERRO_17M', 'ENTREGA_HIERRO_18M',
                                'ENTREGA_HIERRO_19M', 'ENTREGA_HIERRO_20M', 'ENTREGA_HIERRO_21M', 'ENTREGA_HIERRO_22M', 'ENTREGA_HIERRO_23M',
                                DB::raw("CASE WHEN (CASE WHEN (ENTREGA_HIERRO_12M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_13M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_14M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_15M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_16M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_17M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_18M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_19M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_20M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_21M IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN (ENTREGA_HIERRO_22M IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (ENTREGA_HIERRO_23M IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_JUNTOS'"), 'EH_12M', 'EH_13M', 'EH_14M', 'EH_15M', 'EH_16M', 'EH_17M',
                                'EH_18M', 'EH_19M', 'EH_20M', 'EH_21M', 'EH_22M', 'EH_23M', DB::raw("CASE WHEN
                                (CASE WHEN ([EH_12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH_22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH_23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 'Cumple' ELSE 'No Cumple' END 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.suple.suple12.printNominal', [ 'nominal' => $nomSuple12, 'anio' => $anio ]);
        }
    }
}
