<?php

namespace App\Http\Controllers\meta4;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Exports\meta4\kids\ConsolidateExport;
use App\Exports\meta4\kids\creds\NewlyBornExport;
use App\Exports\meta4\kids\creds\CredMesExport;
use App\Exports\meta4\kids\creds\Cred12Export;

use App\Exports\meta4\kids\suple\Suple45Export;
use App\Exports\meta4\kids\suple\Suple611Export;
use App\Exports\meta4\kids\suple\Suple12Export;

use App\Exports\meta4\kids\vaccine\Vaccine2MExport;

class mKidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexKids() {
        return view('meta4/kids/index');
    }

    public function totalData(){
        $nominal = DB::table('dbo.META4_CONSOLIDADO') ->count();
        return response(($nominal), 200);
    }

    public function printKids(Request $request){
        $r = $request->red; $d = $request->distrito; $a = $request->anio;
        return Excel::download(new ConsolidateExport($r, $d, $a), 'DEIT_PASCO REPORTE META 4 NIÑOS.xlsx');
    }

    // PARA CREDS
    public function forGrafCred(Request $request){
        $anio = $request->id;
        $resultPack = '';

        if($anio == 'TODOS'){
            $resultCred = DB::table('dbo.META4_CONSOLIDADO')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN
                        (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                        CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                        THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $resultCredMes = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL]
                            IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $resultCred12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL
                                AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->get();
        }
        else{
            $resultCred = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN
                            (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                            CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                            THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio )->get();

            $resultCredMes = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL]
                            IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1
                            ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();

            $resultCred12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([12CTRL] IS NOT NULL
                                AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();
        }

        $query[] = json_decode($resultPack, true);
        $query[] = json_decode($resultCred, true);
        $query[] = json_decode($resultCredMes, true);
        $query[] = json_decode($resultCred12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function tableResumCreds(Request $request){
        $resumRn = ''; $resumCredMes = ''; $resultCred12 = '';
        $anio = $request->id; $type = $request->type;
        if($type == 'rn'){
            if($anio == 'TODOS'){
                $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $resumRn = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN (CASE WHEN
                                ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN]
                                IS NOT NULL) THEN 1 ELSE 0 END) >= 2 THEN 1 ELSE 0 END) AS 'RN_HIS_NUM'"), DB::raw("round((cast(SUM(CASE WHEN
                                (CASE WHEN ([1CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([2CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([3CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([4CTRL RN] IS NOT NULL) THEN 1 ELSE 0 END) >= 2
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }
        else if($type == 'credMes'){
            if($anio == 'TODOS'){
                $resumCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL
                                AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL
                                AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $resumCredMes = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([1CTRL] IS NOT NULL AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL
                                AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN ([1CTRL] IS NOT NULL
                                AND [2CTRL] IS NOT NULL AND [4CTRL] IS NOT NULL AND [6CTRL] IS NOT NULL AND [9CTRL] IS NOT NULL) THEN 1 ELSE 0 END)
                                as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }
        else if($type == 'cred12'){
            if($anio == 'TODOS'){
                $resultCred12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL
                                AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $resultCred12 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                                DB::raw("SUM(CASE WHEN ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL
                                AND [20CTRL] IS NOT NULL AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) AS RN_HIS_NUM"), DB::raw("round((cast(SUM(CASE WHEN
                                ([12CTRL] IS NOT NULL AND [14CTRL] IS NOT NULL AND [16CTRL] IS NOT NULL AND [18CTRL] IS NOT NULL AND [20CTRL] IS NOT NULL
                                AND [22CTRL] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }

        $query[] = json_decode($resumRn, true);
        $query[] = json_decode($resumCredMes, true);
        $query[] = json_decode($resultCred12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printRn(Request $request){
        $r = $request->redRn; $d = $request->distRn; $a = $request->anioRn; $t = $request->typeRn;
        return Excel::download(new NewlyBornExport($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE NIÑOS RECIEN NACIDOS.xlsx');
    }

    public function printCredMes(Request $request){
        $red = $request->provCredMes; $dist = $request->distCredMes; $anio = $request->anioCredMes; $type = $request->typeCredMes;
        return Excel::download(new CredMesExport($red, $dist, $anio, $type), 'DEIT_PASCO REPORTE DE CREDS EN NIÑOS MENORES DE UN AÑO.xlsx');
    }

    public function printCred12(Request $request){
        $red = $request->provCred12; $dist = $request->distCred12; $anio = $request->anioCred12; $type = $request->typeCred12;
        return Excel::download(new Cred12Export($red, $dist, $anio, $type), 'DEIT_PASCO REPORTE DE CREDS EN NIÑOS DE 1 A 2 AÑOS.xlsx');
    }

    // PARA SUPLEMENTACION
    public function forGrafSuple(Request $request){
        $anio = $request->id;
        if($anio == 'TODOS'){
            $rSuple45 = DB::table('dbo.META4_CONSOLIDADO')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND
                            [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL
                            AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("round((cast(SUM(
                                CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->get();
        }
        else{
            $rSuple45 = DB::table('dbo.META4_CONSOLIDADO')
                        ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([EH-4M] IS NOT NULL AND [EH-5M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();

            $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND
                            [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL
                            AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();

            $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("round((cast(SUM(
                                CASE WHEN
                                    (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                    CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();
        }

        $query[] = json_decode($rSuple45, true);
        $query[] = json_decode($rSuple611, true);
        $query[] = json_decode($rSuple12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function tableResumSuples(Request $request){
        $rSuple45 = ''; $rSuple611 = ''; $rSuple12 = '';
        $anio = $request->id; $type = $request->type;
        if($type == 's45'){
            if($anio == 'TODOS'){
                $rSuple45 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                * 100), 2) 'AVANCE_HIS'")) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $rSuple45 = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([EH-4M]
                                IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE4_5_HIS"), DB::raw("round((cast(SUM(CASE WHEN
                                ([EH-4M] IS NOT NULL AND [EH-5M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float)
                                * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                                ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }
        else if($type == 's611'){
            if($anio == 'TODOS'){
                $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                            DB::raw("SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND
                            [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                            DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL
                            AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                            ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
                            DB::raw("SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND
                            [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
                            DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL
                            AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }
        else if($type == 's12'){
            if($anio == 'TODOS'){
                $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                            ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
                            ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
                                (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
                                (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
                                CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
                                THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
                            ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
            }
        }

        $query[] = json_decode($rSuple45, true);
        $query[] = json_decode($rSuple611, true);
        $query[] = json_decode($rSuple12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printSuple45(Request $request){
        $r = $request->redSuple45; $d = $request->distSuple45; $a = $request->anioSuple45; $t = $request->typeSuple45;
        return Excel::download(new Suple45Export($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE SUPLEMENTACION EN NIÑOS DE 4 A 5 MESES.xlsx');
    }

    public function printSuple611(Request $request){
        $r = $request->redSuple611; $d = $request->distSuple611; $a = $request->anioSuple611; $t = $request->typeSuple611;
        return Excel::download(new Suple611Export($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE SUPLEMENTACION EN NIÑOS DE 6 A 11 MESES.xlsx');
    }

    public function printSuple12(Request $request){
        $r = $request->redSuple12; $d = $request->distSuple12; $a = $request->anioSuple12; $t = $request->typeSuple12;
        return Excel::download(new Suple12Export($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE SUPLEMENTACION EN NIÑOS DE 1 A 2 AÑOS.xlsx');
    }

    // PARA VACUNASS
    public function forGrafVaccine(Request $request){
        $anio = $request->id;
        if($anio == 'TODOS'){
            $rVaccine2M = DB::table('dbo.META4_CONSOLIDADO')
                        ->select(DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO 2M] IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M]
                        IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();

            $rVaccine4M = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO 4M] IS NOT NULL AND [1_ROTA 2M]
                            IS NOT NULL AND [1_PENTA 2M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->get();

            $rVaccine6M = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO 6M] IS NOT NULL AND [3_PENTA 6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->get();
        }
        else{
            $rVaccine2M = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO 2M] IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M]
                            IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();

            $rVaccine4M = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("COUNT(*) DENOMINADOR"), DB::raw("round((cast(SUM(CASE WHEN ([2_NEUMO 4M] IS NOT NULL AND [1_ROTA 2M]
                            IS NOT NULL AND [1_PENTA 2M] IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'"))
                            ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();

            $rVaccine6M = DB::table('dbo.META4_CONSOLIDADO')
                            ->select(DB::raw("round((cast(SUM(CASE WHEN ([3_NEUMO 6M] IS NOT NULL AND [3_PENTA 6M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
                            cast(COUNT(*) as float) * 100), 1) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->get();
        }

        $query[] = json_decode($rVaccine2M, true);
        $query[] = json_decode($rVaccine4M, true);
        $query[] = json_decode($rVaccine6M, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function tableResumVac(Request $request){
        $tVac2M = ''; $rSuple611 = ''; $rSuple12 = '';
        $anio = $request->id; $type = $request->type;
        if($type == 'v2m'){
            if($anio == 'TODOS'){
                $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO 2M]
                                    IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                    DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO 2M] IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M]
                                    IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                    ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

            }else{
                $tVac2M = DB::table('dbo.META4_CONSOLIDADO')
                                ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM(CASE WHEN ([1_NEUMO 2M]
                                IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M] IS NOT NULL) THEN 1 ELSE 0 END) AS VACUNAS_HIS"),
                                DB::raw("round((cast(SUM(CASE WHEN ([1_NEUMO 2M] IS NOT NULL AND [1_ROTA 2M] IS NOT NULL AND [1_PENTA 2M]
                                IS NOT NULL) THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
                                ->whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA')
                                ->orderBy('DISTRITO') ->get();
            }
        }
        // else if($type == 's611'){
        //     if($anio == 'TODOS'){
        //         $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
        //                     ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
        //                     DB::raw("SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND
        //                     [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
        //                     DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL
        //                     AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
        //                     cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
        //                     ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

        //     }else{
        //         $rSuple611 = DB::table('dbo.META4_CONSOLIDADO')
        //                     ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"),
        //                     DB::raw("SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL AND
        //                     [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) AS SUPLE6_11_HIS"),
        //                     DB::raw("round((cast(SUM(CASE WHEN ([EH-6M] IS NOT NULL AND [EH-7M] IS NOT NULL AND [EH-8M] IS NOT NULL
        //                     AND [EH-9M] IS NOT NULL AND [EH-10M] IS NOT NULL AND [EH-11M] IS NOT NULL) THEN 1 ELSE 0 END) as float) /
        //                     cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'")) ->whereYear('FECHA_DE_NACIMIENTO', $anio)
        //                     ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
        //     }
        // }
        // else if($type == 's12'){
        //     if($anio == 'TODOS'){
        //         $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
        //                     ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
        //                         (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
        //                         THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
        //                         (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
        //                         THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
        //                     ->groupBy('PROVINCIA') ->groupBy('DISTRITO') ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();

        //     }else{
        //         $rSuple12 = DB::table('dbo.META4_CONSOLIDADO')
        //                     ->select('PROVINCIA', 'DISTRITO', DB::raw("COUNT(DISTRITO) DENOMINADOR"), DB::raw("SUM( CASE WHEN
        //                         (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
        //                         THEN 1 ELSE 0 END) AS 'NUM_HIS'"), DB::raw("round((cast(SUM( CASE WHEN
        //                         (CASE WHEN ([EH-12M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-13M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-14M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-15M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-16M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-17M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-18M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-19M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-20M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-21M] IS NOT NULL) THEN 1 ELSE 0 END +
        //                         CASE WHEN ([EH-22M] IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN ([EH-23M] IS NOT NULL) THEN 1 ELSE 0 END ) >= 4
        //                         THEN 1 ELSE 0 END) as float) / cast(COUNT(DISTRITO) as float) * 100), 2) 'AVANCE_HIS'"))
        //                         -> whereYear('FECHA_DE_NACIMIENTO', $anio) ->groupBy('PROVINCIA') ->groupBy('DISTRITO')
        //                     ->orderBy('PROVINCIA') ->orderBy('DISTRITO') ->get();
        //     }
        // }

        $query[] = json_decode($tVac2M, true);
        // $query[] = json_decode($rSuple611, true);
        // $query[] = json_decode($rSuple12, true);
        $r = json_encode($query);
        return response(($r), 200);
    }

    public function printVac12(Request $request){
        $r = $request->redVac12; $d = $request->distVac12; $a = $request->anioVac12; $t = $request->typeVac12;
        return Excel::download(new Vaccine2MExport($r, $d, $a, $t), 'DEIT_PASCO REPORTE DE VACUNAS DE 2 MESES.xlsx');
    }
}
