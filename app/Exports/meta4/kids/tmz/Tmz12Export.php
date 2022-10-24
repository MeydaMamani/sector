<?php

namespace App\Exports\meta4\kids\tmz;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Tmz12Export implements FromView, ShouldAutoSize
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
                    $rTmz12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([DOSAJE_HMB_12M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $rTmz12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([DOSAJE_HMB_12M]
                                IS NOT NULL) THEN 1 ELSE 0 END) AS TMZ_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.tmz.tmz12.printConteo', [ 'nominal' => $rTmz12, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalTmz = DB::table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', 'DOSAJE_HMB_12M',
                                    DB::raw("CASE WHEN ([DOSAJE_HMB_12M] IS NOT NULL ) THEN 'Cumple' ELSE 'No Cumple' END 'TMZ_HIS'"))
                                    ->whereRaw('PERIODO = (SELECT MAX(PERIODO) FROM META4_CONSOLIDADO)')
                                    ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.tmz.tmz12.printNominal', [ 'nominal' => $nominalTmz, 'anio' => $anio ]);
        }
    }
}
