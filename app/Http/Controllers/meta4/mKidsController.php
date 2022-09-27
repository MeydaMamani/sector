<?php

namespace App\Http\Controllers\meta4;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class mKidsController extends Controller
{
    public function indexKids() {
        return view('meta4/kids/index');
    }

    public function totalData(){
        $nominal = DB::connection('BD_JUNTOS') ->table('dbo.META4_CONSOLIDADO') ->count();
        return response(($nominal), 200);
    }
}
