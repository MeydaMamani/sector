<?php

namespace App\Exports\juntos\pregnants\AP;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class APExport implements FromView, ShouldAutoSize
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
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                        ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                        ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                        ->whereYear('FECHA_DE_NAC_MO', $anio) ->groupBy('PROVINCIA_RES')
                        ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($red != 'TODOS' && $dist == 'TODOS'){
                if($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                                ->where('PROVINCIA_RES', $red) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }
            else if($dist != 'TODOS'){
                if($anio == 'TODOS') {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist) ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES')
                                ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
                else {
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', DB::raw("COUNT(DISTRITO_RES) DENOMINADOR"),
                        DB::raw("SUM(
                            CASE
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                    is not null and _6_mes is not null THEN 1
                                WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                    (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                            CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                    ) THEN 1
                                ELSE 0
                            END) AS 'NUM_JUNT'"),
                            DB::raw("round((cast(
                                SUM(
                                CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END) as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_JUNT'"),

                            DB::raw("SUM( CASE
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                is not null and CONTROL6 is not null THEN 1
                            WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                        CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                ) THEN 1
                            ELSE 0
                        END) AS 'NUM_HIS'"),
                            DB::raw("round((cast(
                                SUM( CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 1
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 1
                                    ELSE 0
                                END)  as float) / cast(COUNT(DISTRITO_RES) as float) * 100), 1) AS 'AVANCE_HIS'"))
                                ->where('DISTRITO_RES', $dist) ->whereYear('FECHA_DE_NAC_MO', $anio)
                                ->groupBy('PROVINCIA_RES') ->groupBy('DISTRITO_RES') ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();
                }
            }

            return view('juntos.pregnants.AP.printConteo', [ 'nominal' => $resum2, 'anio' => $anio ]);
        }
        else if($type == 'nominal'){
            if($red == 'TODOS'){
                if($anio == 'TODOS'){
                    $anio = 'Todos';
                    $resum2 = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'CONTROL1', DB::raw("Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) EDADMESES"),
						'_0_mes', '_1_mes', '_2_mes', '_3_mes', '_4_mes', '_5_mes', '_6_mes', '_7_mes', '_8_mes', '_9_mes', '_10_mes',
                        DB::raw("
                            CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and _1_mes is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and _1_mes is not null and _2_mes is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and _1_mes is not null and _2_mes is not null and _3_mes is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and _1_mes is not null and _2_mes is not null and _3_mes is not null and _4_mes is not null and _5_mes
                                                        is not null and _6_mes is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND (
                                        (CASE WHEN (_0_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_1_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_2_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_3_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_4_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_5_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_6_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_7_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_8_mes IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (_9_mes IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (_10_mes IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 'Cumple'
                                    ELSE 'No cumple'
                                END 'CUMPLE_JUNT'"), 'CONTROL1', 'CONTROL2', 'CONTROL3', 'CONTROL4', 'CONTROL5', 'CONTROL6', 'CONTROL7', 'CONTROL8', 'CONTROL9', 'CONTROL10',

                            DB::raw(" CASE
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='0' THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='1' and CONTROL1 is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='2' and CONTROL1 is not null and CONTROL2 is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='3' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='4' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='5' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30)='6' and CONTROL1 is not null and CONTROL2 is not null and CONTROL3 is not null and CONTROL4 is not null and CONTROL5
                                                        is not null and CONTROL6 is not null THEN 'Cumple'
                                    WHEN Convert(Integer, Datediff(Day, [CONTROL1], Getdate())/30) > '6' AND ( (CASE WHEN (CONTROL1 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL2 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL3 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL4 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL5 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL6 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL7 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL8 IS NOT NULL) THEN 1 ELSE 0 END + CASE WHEN (CONTROL9 IS NOT NULL) THEN 1 ELSE 0 END +
                                                CASE WHEN (CONTROL10 IS NOT NULL) THEN 1 ELSE 0 END) >= 6
                                        ) THEN 'Cumple'
                                    ELSE 'No cumple'
                                END 'CUMPLE_HIS'"))
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

            return view('juntos.pregnants.AP.printNominal', [ 'nominal' => $resum2, 'anio' => $anio ]);
        }
    }

}
