<?php

namespace App\Exports\meta4\kids\creds;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CredMesExport implements FromView, ShouldAutoSize
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
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->where('PROVINCIA', $red)
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE
                                    WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL]
                                    IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND
                                    [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                    as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->where('DISTRITO', $dist)
                                    ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.credMes.printConteo', [ 'nominal' => $resCredMes, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA', $red) ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('PROVINCIA', $red) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO', $dist) ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '1CTRL as CTRL1', '2CTRL as CTRL2',
                                '3CTRL as CTRL3', '4CTRL as CTRL4', '5CTRL as CTRL5', '6CTRL as CTRL6', '7CTRL as CTRL7', '8CTRL as CTRL8',
                                '9CTRL as CTRL9', '10CTRL as CTRL10', '11CTRL as CTRL11', DB::raw("CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS
                                NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple'
                                END 'CUMPLE_HIS'")) ->where('DISTRITO', $dist) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.creds.credMes.printNominal', [ 'nominal' => $nominalCred, 'anio' => $anio ]);
        }
    }
}
