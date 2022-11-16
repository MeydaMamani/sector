<?php

namespace App\Exports\juntos\pregnants;

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

    public function __construct($r, $d)
    {
        $this->red=$r;
        $this->dist=$d;

    }

    public function view(): View {

        $r = $this->red;
        $d = $this->dist;
  

        if($r == 'TODOS'){
            $nominal = DB::table('dbo.CONSOLIDADO_GESTANTE_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"))
                            ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else if($r != 'TODOS' && $d == 'TODOS'){
            $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                        ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                        DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"))
                            ->where('PROVINCIA_RES', $r) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }
        else{
            $nominal = DB::table('dbo.CONSOLIDADO_NINO_PAQUETE_JUNTOS')
                            ->select('*', DB::raw("CONCAT(PATERNO_TITULAR,' ',MATERNO_TITULAR,' ', NOMBRES_TITULAR) AS FULLNAME_TITULAR"),
                            DB::raw("CONCAT(APPATERNO_MO,' ',APMATERNO_MO,' ', NOMBRE_MO) AS FULLNAME_MO"))
                            ->where('DISTRITO_RES', $d) ->orderBy('PROVINCIA_RES') ->orderBy('DISTRITO_RES')
                        ->get();
        }

        return view('juntos.pregnants.print', [
            'nominal' => $nominal, 'nameProv' => $r, 'nameDist' => $d
        ]);
    }
}