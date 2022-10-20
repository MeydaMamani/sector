<?php

namespace App\Exports\meta4\kids\n4a5;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class n45Export implements FromView, ShouldAutoSize
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
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M]
                                IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', 5)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO')
                                ->get();

                }else{
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('EdadMeses', '>', 5) ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M]
                                IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', 5)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO')
                                ->get();

                }else{
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('PROVINCIA', $red)
                                ->where('EdadMeses', '>', 5) ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M]
                                IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL)
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', 5)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO')
                                ->get();

                }else{
                    $r4_5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ((EdadMeses > 5)
                                AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND
                                [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) AS PAQUETE"),
                                DB::raw("round((cast(SUM(CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('DISTRITO', $dist)
                                ->where('EdadMeses', '>', 5) ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.n4a5.paquete.printConteo', [ 'nominal' => $r4_5, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE")) ->where('PROVINCIA', $red)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('PROVINCIA', $red)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE")) ->where('DISTRITO', $dist)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nom4a5 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'EESS', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO',
                                '4CTRL as CTRL4', '5CTRL as CTRL5', '2_NEUMO_4M as NEUMO2_4M', '2_ROTA_4M as ROTA2_4M', '2_PENTA_4M as PENTA2_4M',
                                'EH_4M', 'EH_5M', DB::raw("CASE WHEN ((EdadMeses > 5) AND [4CTRL] IS NOT NULL AND [5CTRL] IS NOT NULL AND
                                [2_NEUMO_4M] IS NOT NULL AND [2_ROTA_4M] IS NOT NULL AND [2_PENTA_4M] IS NOT NULL AND [EH_4M] IS NOT NULL AND
                                [EH_5M] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END AS MIDE")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('DISTRITO', $dist)
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)') ->where('EdadMeses', '>', '5')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.n4a5.paquete.printNominal', [ 'nominal' => $nom4a5, 'anio' => $anio ]);
        }
    }
}
