<?php

namespace App\Http\Controllers\cuna;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Exports\cuna\scd\ConsolidateExport;

class ScdController extends Controller
{
    public function indexScd() {
        return view('cuna/scd/index');
    }

    public function printNominal(Request $request){
        $r = $request->red; $d = $request->distrito; $a = $request->anio;
        return Excel::download(new ConsolidateExport($r, $d, $a), 'DEIT_PASCO REPORTE SAF CUNA MAS.xlsx');
    }
}
