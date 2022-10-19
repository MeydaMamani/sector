<?php

namespace App\Exports\juntos\kids\vaccine;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class vaccine2MExport implements FromView, ShouldAutoSize
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
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                } else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if ($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                } else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($dist != 'TODOS'){
                if ($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                } else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_2M
                                IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"),
                                DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND VACUNA_PENTA_2M IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN
                                ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO_2M] IS NOT NULL AND [1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL) THEN 1
                                ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine2M.printConteo', [ 'nominal' => $resum2, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine2M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_2M', 'VACUNA_ROTA_2M',
                                'VACUNA_PENTA_2M', DB::raw("CASE WHEN (VACUNA_NEUMO_2M IS NOT NULL AND VACUNA_ROTA_2M IS NOT NULL AND
                                VACUNA_PENTA_2M IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_JUNTOS'"), '1_NEUMO_2M AS NEUMO1_2M', '1_ROTA_2M AS ROTA1_2M',
                                '1_PENTA_2M AS PENTA1_2M', DB::raw("CASE WHEN ([1_ROTA_2M] IS NOT NULL AND [1_PENTA_2M] IS NOT NULL AND [1_NEUMO_2M]
                                IS NOT NULL) THEN 1 ELSE 0 END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES')
                                ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine2M.printNominal', [ 'nominal' => $nomVaccine2M, 'anio' => $anio ]);
        }
    }
}
