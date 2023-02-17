<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailFed extends Mailable
{
    use Queueable, SerializesModels;

    public $subcjet = "Información del Contacto";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nominal = DB::table('dbo.PAQUETE_NINIO_OCTUBRE')
                    ->select('PROVINCIA_RES', 'DISTRITO_RES', 'DNI_MO', 'FECHA_DE_NAC_MO', '1CTRL_RN AS CTRL1_RN', '2CTRL_RN AS CTRL2_RN',
                    '3CTRL_RN AS CTRL3_RN', '4CTRL_RN AS CTRL4_RN', 'CUMPLE_RN', '1CTRL AS CTRL1', '2CTRL AS CTRL2', '3CTRL AS CTRL3', '4CTRL AS CTRL4',
                    '5CTRL AS CTRL5', '6CTRL AS CTRL6', '7CTRL AS CTRL7', '8CTRL AS CTRL8', '9CTRL AS CTRL9', '10CTRL AS CTRL10', '11CTRL AS CTRL11',
                    '1_NEUMO_2M AS NEUMO1_2M', '2_NEUMO_4M AS NEUMO2_4M', '3_NEUMO_6M AS NEUMO3_6M', '1_ROTA_2M as ROTA1_2M', '2_ROTA_4M AS ROTA2_4M',
                    '1_PENTA_2M AS PENTA1_2M', '2_PENTA_4M AS PENTA2_4M', '3_PENTA_6M AS PENTA3_6M', 'EH_4M AS EH_4M',
                    'EH_5M AS EH_5M', 'EH_6M AS EH_6M', 'EH_7M AS EH_7M', 'EH_8M AS EH_8M', 'EH_9M AS EH_9M', 'EH_10M AS EH_10M', 'EH_11M AS EH_11M', 'CUMPLE')
                    ->where('CUMPLE', 'NO CUMPLE')
                    ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES') ->get();

        return $this->view('mail.prematuro', ['nominal' => $nominal]);
    }

    public function index() {
        return view('mail/index');
    }

    public function fedKids(Request $request)
    {
        // $anio = '2023'; $mes = '1';
        // $dist = 'OXAPAMPA';
        // $anio = $request->anio;
        // // $mes = $request->mes;
        // if (strlen($mes) == 1){ $mes2 = '0'.$mes; }
        // else{ $mes2 = $mes; }

        // $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
        //             ->where('PROVINCIA_RES', 'OXAPAMPA')
        //             ->where('DISTRITO_RES', 'VILLA RICA')
        //             ->get();

        // return $this->view('mail.prematuro', ['nominal' => $nominal]);
    }

    public function sendMail()
    {
        Mail::to('meydamamani@gmail.com')->to('mayit_025@hotmail.com')->send(new EmailFed());
        return 'Mensaje Enviado!!!';
    }
}
