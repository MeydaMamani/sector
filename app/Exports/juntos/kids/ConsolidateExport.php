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
            $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL_RN AS CTRL1_RN', '2CTRL_RN AS CTRL2_RN',
                            '3CTRL_RN AS CTRL3_RN', '4CTRL_RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO_2M AS NEUMO1_2M', '2_NEUMO_4M AS NEUMO2_4M', '3_NEUMO_6M AS NEUMO3_6M', '1_ROTA_2M as ROTA1_2M', '2_ROTA_4M AS ROTA2_4M',
                            '1_PENTA_2M AS PENTA1_2M', '2_PENTA_4M AS PENTA2_4M', '3_PENTA_6M AS PENTA3_6M', '1_SPR_12M AS SPR1_12M', '2_SPR_18M AS SPR2_18M',
                            'DOSAJE_HMB_6M AS DOSAJE_HMB_6M', 'DOSAJE_HMB_12M AS DOSAJE_HMB_12M', 'DOSAJE_HMB_18M AS DOSAJE_HMB_18M', 'EH_4M AS EH_4M',
                            'EH_5M AS EH_5M', 'EH_6M AS EH_6M', 'EH_7M AS EH_7M', 'EH_8M AS EH_8M', 'EH_9M AS EH_9M', 'EH_10M AS EH_10M', 'EH_11M AS EH_11M',
                            'EH_12M AS EH_12M', 'EH_13M AS EH_13M', 'EH_14M AS EH_14M', 'EH_15M AS EH_15M', 'EH_16M AS EH_16M', 'EH_17M AS EH_17M',
                            'EH_18M AS EH_18M', 'EH_19M AS EH_19M', 'EH_20M AS EH_20M', 'EH_21M AS EH_21M', 'EH_22M AS EH_22M', 'EH_23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else if($r != 'TODOS' && $d == 'TODOS'){
            $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL_RN AS CTRL1_RN', '2CTRL_RN AS CTRL2_RN',
                            '3CTRL_RN AS CTRL3_RN', '4CTRL_RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO_2M AS NEUMO1_2M', '2_NEUMO_4M AS NEUMO2_4M', '3_NEUMO_6M AS NEUMO3_6M', '1_ROTA_2M as ROTA1_2M', '2_ROTA_4M AS ROTA2_4M',
                            '1_PENTA_2M AS PENTA1_2M', '2_PENTA_4M AS PENTA2_4M', '3_PENTA_6M AS PENTA3_6M', '1_SPR_12M AS SPR1_12M', '2_SPR_18M AS SPR2_18M',
                            'DOSAJE_HMB_6M AS DOSAJE_HMB_6M', 'DOSAJE_HMB_12M AS DOSAJE_HMB_12M', 'DOSAJE_HMB_18M AS DOSAJE_HMB_18M', 'EH_4M AS EH_4M',
                            'EH_5M AS EH_5M', 'EH_6M AS EH_6M', 'EH_7M AS EH_7M', 'EH_8M AS EH_8M', 'EH_9M AS EH_9M', 'EH_10M AS EH_10M', 'EH_11M AS EH_11M',
                            'EH_12M AS EH_12M', 'EH_13M AS EH_13M', 'EH_14M AS EH_14M', 'EH_15M AS EH_15M', 'EH_16M AS EH_16M', 'EH_17M AS EH_17M',
                            'EH_18M AS EH_18M', 'EH_19M AS EH_19M', 'EH_20M AS EH_20M', 'EH_21M AS EH_21M', 'EH_22M AS EH_22M', 'EH_23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->where('PROVINCIA_RES', $r) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else{
            $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"), '1CTRL_RN AS CTRL1_RN', '2CTRL_RN AS CTRL2_RN',
                            '3CTRL_RN AS CTRL3_RN', '4CTRL_RN AS CTRL4_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                            '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                            '12CTRL AS CTRL12', '14CTRL AS CTRL14', '16CTRL AS CTRL16', '18CTRL AS CTRL18', '20CTRL AS CTRL20', '22CTRL AS CTRL22',
                            '1_NEUMO_2M AS NEUMO1_2M', '2_NEUMO_4M AS NEUMO2_4M', '3_NEUMO_6M AS NEUMO3_6M', '1_ROTA_2M as ROTA1_2M', '2_ROTA_4M AS ROTA2_4M',
                            '1_PENTA_2M AS PENTA1_2M', '2_PENTA_4M AS PENTA2_4M', '3_PENTA_6M AS PENTA3_6M', '1_SPR_12M AS SPR1_12M', '2_SPR_18M AS SPR2_18M',
                            'DOSAJE_HMB_6M AS DOSAJE_HMB_6M', 'DOSAJE_HMB_12M AS DOSAJE_HMB_12M', 'DOSAJE_HMB_18M AS DOSAJE_HMB_18M', 'EH_4M AS EH_4M',
                            'EH_5M AS EH_5M', 'EH_6M AS EH_6M', 'EH_7M AS EH_7M', 'EH_8M AS EH_8M', 'EH_9M AS EH_9M', 'EH_10M AS EH_10M', 'EH_11M AS EH_11M',
                            'EH_12M AS EH_12M', 'EH_13M AS EH_13M', 'EH_14M AS EH_14M', 'EH_15M AS EH_15M', 'EH_16M AS EH_16M', 'EH_17M AS EH_17M',
                            'EH_18M AS EH_18M', 'EH_19M AS EH_19M', 'EH_20M AS EH_20M', 'EH_21M AS EH_21M', 'EH_22M AS EH_22M', 'EH_23M AS EH_23M')
                             ->whereYear('FECHA_DE_NAC_MO', $a) ->where('DISTRITO_RES', $d) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }

        return view('juntos.kids.print', [
            'nominal' => $nominal, 'nameProv' => $r, 'nameDist' => $d
        ]);
    }
}