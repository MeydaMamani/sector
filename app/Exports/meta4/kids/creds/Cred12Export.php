<?php

namespace App\Exports\meta4\kids\creds;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Cred12Export implements FromView, ShouldAutoSize
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
                    $resultCred12 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                    DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL
                                    AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                    AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

                }else{
                    $resultCred12 = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                    ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                    DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL
                                    AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                    ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                    AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                    ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.cred12.printConteo', [ 'nominal' => $resultCred12, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->where('PROVINCIA', $red)
                                 ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('PROVINCIA', $red) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'"))
                                ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
                else{
                    $nominalCred = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', 'NUMERO_DE_DOCUMENTO_DEL_NINO', 'FECHA_DE_NACIMIENTO', '12CTRL as CTRL12', '14CTRL as CTRL14',
                                '16CTRL as CTRL16', '18CTRL as CTRL18', '20CTRL as CTRL20', '22CTRL as CTRL22', DB::raw("CASE WHEN ([12CTRL] IS NOT NULL AND
                                [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 'Cumple' ELSE 'No Cumple' END 'CUMPLE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->where('DISTRITO', $dist) ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
                }
            }

            return view('meta4.kids.creds.cred12.printNominal', [ 'nominal' => $nominalCred, 'anio' => $anio ]);
        }
    }
}
