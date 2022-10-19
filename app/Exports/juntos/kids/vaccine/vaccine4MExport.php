<?php

namespace App\Exports\juntos\kids\vaccine;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class vaccine4MExport implements FromView, ShouldAutoSize
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
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')
                                ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS') {
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS') {
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum4 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN
                                (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END)
                                AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL
                                AND VACUNA_PENTA_4M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1)
                                'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO_4M] IS NOT NULL
                                AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                                as float) * 100), 1) 'AVANCE_HIS'")) ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine4M.printConteo', [ 'nominal' => $resum4, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('PROVINCIA_RES', $red)
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine4M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_4M', 'VACUNA_ROTA_4M',
                                'VACUNA_PENTA_4M', DB::raw("CASE WHEN (VACUNA_NEUMO_4M IS NOT NULL AND VACUNA_ROTA_4M IS NOT NULL AND
                                VACUNA_PENTA_4M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_JUNTOS'"), '2_NEUMO_4M AS NEUMO2_4M',
                                '2_ROTA_4M AS ROTA2_4M', '2_PENTA_4M AS PENTA2_4M', DB::raw("CASE WHEN ([2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M]
                                IS NOT NULL AND [2_PENTA_4M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('DISTRITO_RES', $dist)
                                ->whereYear('FECHA_DE_NAC_MO', $anio) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine4M.printNominal', [ 'nominal' => $nomVaccine4M, 'anio' => $anio ]);
        }
    }
}
