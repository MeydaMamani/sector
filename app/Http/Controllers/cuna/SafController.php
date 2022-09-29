<?php

namespace App\Http\Controllers\cuna;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Exports\cuna\saf\ConsolidateExport;

class SafController extends Controller
{
    public function indexSaf() {
        return view('cuna/saf/index');
    }

    public function printNominal(Request $request){
        $r = $request->red; $d = $request->distrito; $a = $request->anio;
        return Excel::download(new ConsolidateExport($r, $d, $a), 'DEIT_PASCO REPORTE SAF CUNA MAS.xlsx');
    }
}
