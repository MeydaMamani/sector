<?php

namespace App\Exports\juntos\kids\vaccine;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class vaccine6MExport implements FromView, ShouldAutoSize
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
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                } else {
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if ($anio == 'TODOS') {
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->where('PROVINCIA_RES', $red) ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')
                            ->orderBy('DISTRITO_RES')->get();
                } else {
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }
            else if($dist != 'TODOS'){
                if ($anio == 'TODOS') {
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->where('DISTRITO_RES', $dist) ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')
                            ->orderBy('DISTRITO_RES')->get();
                } else {
                    $resum6 = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"), DB::raw("SUM(CASE WHEN (VACUNA_NEUMO_12M
                            IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_JUNT"), DB::raw("round((cast(SUM(CASE WHEN
                            (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES)
                            as float) * 100), 1) 'AVANCE_JUNT'"), DB::raw("SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M] IS NOT NULL)
                            THEN 1 ELSE 0 END) AS VACUNAS_HIS"), DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO_6M] IS NOT NULL AND [3_PENTA_6M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                            ->groupBy('PROVINCIA_RES')->groupBy('DISTRITO_RES')->orderBy('PROVINCIA_RES')->orderBy('DISTRITO_RES')->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine6M.printConteo', [ 'nominal' => $resum6, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS"))
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS"))
                                ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->where('PROVINCIA_RES', $red) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS"))
                                ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else{
                    $nomVaccine6M = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                                ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', 'VACUNA_NEUMO_12M', 'VACUNA_PENTA_6M',
                                DB::raw("CASE WHEN (VACUNA_NEUMO_12M IS NOT NULL AND VACUNA_PENTA_6M IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END AVANCE_JUNTOS"), '3_NEUMO_6M AS NEUMO3_6M', '3_PENTA_6M AS PENTA3_6M', DB::raw("CASE WHEN ([3_NEUMO_6M]
                                IS NOT NULL AND [3_PENTA_6M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AVANCE_HIS")) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->where('DISTRITO_RES', $dist) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.kids.vaccine.vaccine6M.printNominal', [ 'nominal' => $nomVaccine6M, 'anio' => $anio ]);
        }
    }
}
