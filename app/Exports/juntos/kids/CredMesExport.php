<?php

namespace App\Exports\juntos\kids;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CredMesExport implements FromView, ShouldAutoSize
{
    protected $red;
    // protected $dist;
    // protected $anio;
    // protected $type;

    public function __construct($red)
    {
        $this->red=$red;
        // $this->dist=$dist;
        // $this->anio=$anio;
        // $this->type=$type;
    }

    public function view(): View {

        $red = $this->red;
        // $dist = $this->dist;
        // $anio = $this->anio;
        // $type = $this->type;

       
        return view('juntos.kids.credMes.printNominal', [ 'red_red' => $red]);
    }
}
