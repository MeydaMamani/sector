<?php

namespace App\Exports\meta4\kids\n6a11;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class nDx611ExportMonth implements FromView, ShouldAutoSize
{
    protected $red;
    protected $dist;
    protected $anio;
    protected $mes;
    protected $type;

    public function __construct($red, $dist, $anio, $mes, $type)
    {
        $this->red=$red;
        $this->dist=$dist;
        $this->anio=$anio;
        $this->mes=$mes;
        $this->type=$type;
    }

    public function view(): View {

        $red = $this->red;
        $dist = $this->dist;
        $anio = $this->anio;
        $mes = $this->mes;
        $type = $this->type;

        if($type == 'conteo'){
            if($red == 'TODOS'){
                if($mes == 'TODOS'){
                    $rdx6_11 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (
                                [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND
                                [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"), DB::raw("round((cast(SUM(CASE WHEN (
                                [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL
                                AND [EH_11M] IS NOT NULL AND [DOSAJE_HMB_6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100),
                                2) 'AVANCE_HIS'")) ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('DOSAJE_HMB_6M', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $rdx6_11 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (
                                [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND
                                [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"), DB::raw("round((cast(SUM(CASE WHEN (
                                [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL
                                AND [EH_11M] IS NOT NULL AND [DOSAJE_HMB_6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100),
                                2) 'AVANCE_HIS'")) ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('DOSAJE_HMB_6M', $anio)
                                ->whereMonth('DOSAJE_HMB_6M', $mes)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                $rdx6_11 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (
                            [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND
                            [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"), DB::raw("round((cast(SUM(CASE WHEN (
                            [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL
                            AND [EH_11M] IS NOT NULL AND [DOSAJE_HMB_6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100),
                            2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red) ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
            else if($dist != 'TODOS'){
                $rdx6_11 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (
                            [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND
                            [EH_11M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"), DB::raw("round((cast(SUM(CASE WHEN (
                            [EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL
                            AND [EH_11M] IS NOT NULL AND [DOSAJE_HMB_6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100),
                            2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist) ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }

            return view('meta4.kids.n6a11.dxAnemiaMonth.printConteo', [ 'nominal' => $rdx6_11, 'year' => $anio, 'month' => $mes ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                $nomDxAnemia = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                            'ANEMIA_6M', 'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M',
                            DB::raw("(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M] IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL
                            AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END) 'CUMPLE_SUPLE'"))
                            ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '10')
                            ->whereNotNull('ANEMIA_6M') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                $nomDxAnemia = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'ANEMIA_6M',
                            'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M', DB::raw("(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M]
                            IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL)
                            THEN 'Cumple' ELSE 'No Cumple' END) 'CUMPLE_SUPLE'")) ->where('PROVINCIA', $red)
                            ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '10')
                            ->whereNotNull('ANEMIA_6M') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
            else if($dist != 'TODOS'){
                $nomDxAnemia = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'ANEMIA_6M',
                            'EH_6M', 'EH_7M', 'EH_8M', 'EH_9M', 'EH_10M', 'EH_11M', DB::raw("(CASE WHEN ([EH_6M] IS NOT NULL AND [EH_7M]
                            IS NOT NULL AND [EH_8M] IS NOT NULL AND [EH_9M] IS NOT NULL AND [EH_10M] IS NOT NULL AND [EH_11M] IS NOT NULL)
                            THEN 'Cumple' ELSE 'No Cumple' END) 'CUMPLE_SUPLE'")) ->where('DISTRITO', $dist)
                            ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '10')
                            ->whereNotNull('ANEMIA_6M') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }

            return view('meta4.kids.n6a11.dxAnemia.printNominal', [ 'nominal' => $nomDxAnemia ]);
        }
    }
}
