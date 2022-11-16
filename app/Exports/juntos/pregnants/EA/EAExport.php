<?php

namespace App\Exports\juntos\pregnants\EA;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EAExport implements FromView, ShouldAutoSize
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
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                        ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                        ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                        ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')
                        ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES',  DB::raw("COUNT(*) DENOMINADOR"),
                        DB::raw("SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_JUNT"),
                        DB::raw("SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) AS BATERIA_HIS"),
                        DB::raw("round((cast(SUM(CASE WHEN (EXAMEN_HB IS NOT NULL AND
                        EXAMEN_VIH IS  NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100)
                        , 1) 'AVANCE_JUNT'"), DB::raw("round((cast(SUM(CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND
                        SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            } 

            return view('juntos.pregnants.EA.printPlantilla', [ 'nominal' => $resum2, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red)
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'EXAMEN_HB', 'EXAMEN_VIH', 'EXAMEN_SIFILIS',
                                'EXAMEN_ORINA', DB::raw("CASE WHEN (EXAMEN_HB IS NOT NULL AND EXAMEN_VIH IS NOT NULL AND EXAMEN_SIFILIS IS NOT NULL AND EXAMEN_ORINA IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_JUNT'"),
                                'EXAMEN_HB_HIS', 'VIH_HIS', 'SIFILIS_HIS', 'EXAMEN_ORINA_HIS',
                                DB::raw("CASE WHEN ([EXAMEN_HB_HIS] IS NOT NULL AND [VIH_HIS] IS NOT NULL AND SIFILIS_HIS IS NOT NULL AND EXAMEN_ORINA_HIS IS NOT NULL) THEN 1 ELSE 0 END 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist)
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.pregnants.EA.printNominal', [ 'nominal' => $resum2, 'anio' => $anio ]);
        }
    }
}
