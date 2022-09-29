<?php

namespace App\Exports\cuna\scd;

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
            $nominal = DB::table('dbo.SCD_PADRON_2022_PASCO')
                        ->select('*', 'Año as anio', DB::raw("CONCAT(Apellido_Paterno_de_AT,' ',Apellido_Materno_de_AT,' ', Nombre_del_Acompanante_Tecnico)
                        AS full_name_at"), DB::raw("CONCAT(Apellido_Paterno_del_actor_comunal,' ',Apellido_Materno_del_actor_comunal,' ', Nombre_del_actor_comunal)
                        AS full_name_actor"), DB::raw("CONCAT(Apellido_Paterno_del_Cuidador_Principal,' ',Apellido_Materno_del_Cuidador_Principal,' ',
                        Nombre_completo_del_Cuidador_Principal) AS full_name_cuidador"), DB::raw("CONCAT(Apellido_Paterno_del_Usuario,' ',Apellido_Materno_del_Usuario,' ',
                        Nombre_del_Usuario) AS full_name_usuario")) ->whereYear('Año', $a) ->where('Departamento', 'PASCO') ->get();
        }
        else if($r != 'TODOS' && $d == 'TODOS'){
            $nominal = DB::table('dbo.SCD_PADRON_2022_PASCO')
                        ->select('*', 'Año as anio', DB::raw("CONCAT(Apellido_Paterno_de_AT,' ',Apellido_Materno_de_AT,' ', Nombre_del_Acompanante_Tecnico)
                        AS full_name_at"), DB::raw("CONCAT(Apellido_Paterno_del_actor_comunal,' ',Apellido_Materno_del_actor_comunal,' ', Nombre_del_actor_comunal)
                        AS full_name_actor"), DB::raw("CONCAT(Apellido_Paterno_del_Cuidador_Principal,' ',Apellido_Materno_del_Cuidador_Principal,' ',
                        Nombre_completo_del_Cuidador_Principal) AS full_name_cuidador"),  DB::raw("CONCAT(Apellido_Paterno_del_Usuario,' ',Apellido_Materno_del_Usuario,' ',
                        Nombre_del_Usuario) AS full_name_usuario")) ->whereYear('Año', $a) ->where('Departamento', 'PASCO')
                        ->where('Provincia', $r) ->get();
        }
        else{
            $nominal = DB::table('dbo.SCD_PADRON_2022_PASCO')
                        ->select('*', 'Año as anio', DB::raw("CONCAT(Apellido_Paterno_de_AT,' ',Apellido_Materno_de_AT,' ', Nombre_del_Acompanante_Tecnico)
                        AS full_name_at"), DB::raw("CONCAT(Apellido_Paterno_del_actor_comunal,' ',Apellido_Materno_del_actor_comunal,' ', Nombre_del_actor_comunal)
                        AS full_name_actor"), DB::raw("CONCAT(Apellido_Paterno_del_Cuidador_Principal,' ',Apellido_Materno_del_Cuidador_Principal,' ',
                        Nombre_completo_del_Cuidador_Principal) AS full_name_cuidador"),  DB::raw("CONCAT(Apellido_Paterno_del_Usuario,' ',Apellido_Materno_del_Usuario,' ',
                        Nombre_del_Usuario) AS full_name_usuario")) ->whereYear('Año', $a) ->where('Departamento', 'PASCO')
                        ->where('Distrito', $d) ->get();
        }

        return view('cuna.scd.print', [
            'nominal' => $nominal, 'nameProv' => $r, 'nameDist' => $d
        ]);
    }
}