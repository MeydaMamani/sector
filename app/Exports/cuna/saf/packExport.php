<?php

namespace App\Exports\cuna\saf;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class packExport implements FromView, ShouldAutoSize
{
    public function __construct()
    {

    }

    public function view(): View {

        $result = DB::table('dbo.PAQUETE_NINIO_OCTUBRE_CUNA_SAF')
                    ->select('Provincia', 'Distrito', 'Numero_de_documento_del_usuario', 'Fecha_de_Nacimiento_del_usuario', '1CTRL_RN AS CTRL1_RN', '2CTRL_RN AS CTRL2_RN',
                    '3CTRL_RN AS CTRL3_RN', '4CTRL_RN AS CTRL4_RN', 'CUMPLE_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                    '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                    '1_NEUMO_2M AS NEUMO1_2M', '2_NEUMO_4M AS NEUMO2_4M', '3_NEUMO_6M AS NEUMO3_6M', '1_ROTA_2M as ROTA1_2M', '2_ROTA_4M AS ROTA2_4M',
                    '1_PENTA_2M AS PENTA1_2M', '2_PENTA_4M AS PENTA2_4M', '3_PENTA_6M AS PENTA3_6M', 'EH_4M AS EH_4M',
                    'EH_5M AS EH_5M', 'EH_6M AS EH_6M', 'EH_7M AS EH_7M', 'EH_8M AS EH_8M', 'EH_9M AS EH_9M', 'EH_10M AS EH_10M', 'EH_11M AS EH_11M', 'CUMPLE')
                        ->orderBy('Provincia') ->orderBy('Distrito') ->get();

        return view('cuna.saf.kids.print', [ 'nominal' => $result ]);
    }
}
