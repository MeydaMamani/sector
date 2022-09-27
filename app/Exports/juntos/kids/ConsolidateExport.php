<?php

namespace App\Exports\juntos\kids;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ConsolidateExport implements FromView, ShouldAutoSize
{
    protected $red;
    protected $dist;
    protected $anio;

    public function __construct($r, $d, $a)
    {
        $this->red=$r;
        $this->dist=$d;
        $this->anio=$a;
    }

    public function view(): View {

        $r = $this->red;
        $d = $this->dist;
        $a = $this->anio;

        if($r == 'TODOS'){
            $nominal = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL RN AS CTRL1_RN', '2CTRL RN AS CTRL2_RN',
                            '3CTRL RN AS CTRL3_RN', '4CTRL RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO 2M AS NEUMO1_2M', '2_NEUMO 4M AS NEUMO2_4M', '3_NEUMO 6M AS NEUMO3_6M', '1_ROTA 2M as ROTA1_2M', '2_ROTA 4M AS ROTA2_4M',
                            '1_PENTA 2M AS PENTA1_2M', '2_PENTA 4M AS PENTA2_4M', '3_PENTA 6M AS PENTA3_6M', '1_SPR 12M AS SPR1_12M', '2_SPR 18M AS SPR2_18M',
                            'DOSAJE HMB 6M AS DOSAJE_HMB_6M', 'DOSAJE HMB 12M AS DOSAJE_HMB_12M', 'DOSAJE HMB 18M AS DOSAJE_HMB_18M', 'EH-4M AS EH_4M',
                            'EH-5M AS EH_5M', 'EH-6M AS EH_6M', 'EH-7M AS EH_7M', 'EH-8M AS EH_8M', 'EH-9M AS EH_9M', 'EH-10M AS EH_10M', 'EH-11M AS EH_11M',
                            'EH-12M AS EH_12M', 'EH-13M AS EH_13M', 'EH-14M AS EH_14M', 'EH-15M AS EH_15M', 'EH-16M AS EH_16M', 'EH-17M AS EH_17M',
                            'EH-18M AS EH_18M', 'EH-19M AS EH_19M', 'EH-20M AS EH_20M', 'EH-21M AS EH_21M', 'EH-22M AS EH_22M', 'EH-23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else if($r != 'TODOS' && $d == 'TODOS'){
            $nominal = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL RN AS CTRL1_RN', '2CTRL RN AS CTRL2_RN',
                            '3CTRL RN AS CTRL3_RN', '4CTRL RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO 2M AS NEUMO1_2M', '2_NEUMO 4M AS NEUMO2_4M', '3_NEUMO 6M AS NEUMO3_6M', '1_ROTA 2M as ROTA1_2M', '2_ROTA 4M AS ROTA2_4M',
                            '1_PENTA 2M AS PENTA1_2M', '2_PENTA 4M AS PENTA2_4M', '3_PENTA 6M AS PENTA3_6M', '1_SPR 12M AS SPR1_12M', '2_SPR 18M AS SPR2_18M',
                            'DOSAJE HMB 6M AS DOSAJE_HMB_6M', 'DOSAJE HMB 12M AS DOSAJE_HMB_12M', 'DOSAJE HMB 18M AS DOSAJE_HMB_18M', 'EH-4M AS EH_4M',
                            'EH-5M AS EH_5M', 'EH-6M AS EH_6M', 'EH-7M AS EH_7M', 'EH-8M AS EH_8M', 'EH-9M AS EH_9M', 'EH-10M AS EH_10M', 'EH-11M AS EH_11M',
                            'EH-12M AS EH_12M', 'EH-13M AS EH_13M', 'EH-14M AS EH_14M', 'EH-15M AS EH_15M', 'EH-16M AS EH_16M', 'EH-17M AS EH_17M',
                            'EH-18M AS EH_18M', 'EH-19M AS EH_19M', 'EH-20M AS EH_20M', 'EH-21M AS EH_21M', 'EH-22M AS EH_22M', 'EH-23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->where('PROVINCIA_RES', $r) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else{
            $nominal = DB::connection('BD_JUNTOS') ->table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL RN AS CTRL1_RN', '2CTRL RN AS CTRL2_RN',
                            '3CTRL RN AS CTRL3_RN', '4CTRL RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO 2M AS NEUMO1_2M', '2_NEUMO 4M AS NEUMO2_4M', '3_NEUMO 6M AS NEUMO3_6M', '1_ROTA 2M as ROTA1_2M', '2_ROTA 4M AS ROTA2_4M',
                            '1_PENTA 2M AS PENTA1_2M', '2_PENTA 4M AS PENTA2_4M', '3_PENTA 6M AS PENTA3_6M', '1_SPR 12M AS SPR1_12M', '2_SPR 18M AS SPR2_18M',
                            'DOSAJE HMB 6M AS DOSAJE_HMB_6M', 'DOSAJE HMB 12M AS DOSAJE_HMB_12M', 'DOSAJE HMB 18M AS DOSAJE_HMB_18M', 'EH-4M AS EH_4M',
                            'EH-5M AS EH_5M', 'EH-6M AS EH_6M', 'EH-7M AS EH_7M', 'EH-8M AS EH_8M', 'EH-9M AS EH_9M', 'EH-10M AS EH_10M', 'EH-11M AS EH_11M',
                            'EH-12M AS EH_12M', 'EH-13M AS EH_13M', 'EH-14M AS EH_14M', 'EH-15M AS EH_15M', 'EH-16M AS EH_16M', 'EH-17M AS EH_17M',
                            'EH-18M AS EH_18M', 'EH-19M AS EH_19M', 'EH-20M AS EH_20M', 'EH-21M AS EH_21M', 'EH-22M AS EH_22M', 'EH-23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->where('DISTRITO_RES', $d) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }

        return view('juntos.kids.print', [
            'nominal' => $nominal, 'nameProv' => $r, 'nameDist' => $d
        ]);
    }
}