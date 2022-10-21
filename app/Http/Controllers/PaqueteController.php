<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    public function index() {
        return view('detailPackage.index');
    }

    public function searchKids(Request $request){
        $doc = $request->doc;
        $dataPn = DB::connection('BD_PADRON_NOMINAL') ->table('NOMINAL_PADRON_NOMINAL') ->select('NOMBRE_PROV', 'NOMBRE_DIST', 'FECHA_NACIMIENTO_NINO')
                ->where('NUM_CNV', $doc) ->orWhere('NUM_DNI', $doc) ->count();

        if($dataPn > 0){
            $nominal = DB::connection('PAQUETE') ->table('DETALLE_NINO_COMPLETO') ->select('*') ->where('DOCUMENTO', $doc) ->get();
        }else{
            $dataHis = DB::connection('BDHIS_MINSA') ->table('T_CONSOLIDADO_NUEVA_TRAMA_HISMINSA') ->select('Provincia_Establecimiento', 'Distrito_Establecimiento', 'Fecha_Nacimiento_Paciente')
                    ->where('Numero_Documento_Paciente', $doc) ->count();

            if($dataHis > 0){
                $nominal = DB::connection('PAQUETE') ->table('DETALLE_NINO_COMPLETO_HIS') ->select('*') ->where('DOCUMENTO', $doc) ->get();
            }else{
                $nominal = '';
            }
        }

        return response()->json($nominal);
    }

    public function searchPregnant(Request $request){
        $doc = $request->doc; $type = $request->type;
        $dataHis = DB::connection('BDHIS_MINSA') ->table('T_CONSOLIDADO_NUEVA_TRAMA_HISMINSA') ->select('Provincia_Establecimiento', 'Distrito_Establecimiento', 'Fecha_Nacimiento_Paciente')
                    ->where('Numero_Documento_Paciente', $doc) ->count();

        if($dataHis > 0){
            $nominal = DB::connection('PAQUETE') ->table('PAQUETE_GESTANTES') ->select('*') ->where('DOCUMENTO', $doc) ->get();
        }else{
            $nominal = '';
        }

        return response()->json($nominal);
    }
}
