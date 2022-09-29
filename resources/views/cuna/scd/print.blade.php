<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style type="text/css">
        .cabecera {
            background: #e0eff5; font-weight: 500; text-align: center;
        }
    </style> --}}
</head>
<body>
    <table>
        <thead>
            <tr><td colspan="49"></td></tr>
            <tr>
                <td colspan="49" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="49"></td></tr>
            <tr>
                <td colspan="49" style="font-size: 16px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">PADRÓN DE NIÑOS PARA LA ATENCIÓN AL HOGAR Y SEG. NOMINAL - {{ $nameProv }} / {{ $nameDist }}</td>
            </tr>
            <tr><td colspan="49"></td></tr>
            <tr><td colspan="49"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="9" style="background: #DDEBF7; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;"></th>
                <th colspan="4" style="background: #F1F1C0; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Acompañante Técnico</th>
                <th colspan="4" style="background: #FCE4D6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Actor Comunal</th>
                <th colspan="11" style="background: #FCCECA; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Familia</th>
                <th colspan="11" style="background: #E7FCE3; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Cuidador Principal</th>
                <th colspan="10" style="background: #B1D4FC; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Usuario</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Año</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Unidad Territorial</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cui CG</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Nombre Comité Gestión</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cod Acomp Tec</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento AT</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres AT</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cod Actor Com</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento Actor Com</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Actor Com</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cargo Actor Com</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo Dist Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo CCPP Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Centro Poblado Local</th>

                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ámbito Indigena</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pueblo Indigena</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Localidad</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Nombre Local</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dirección Local</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Latitud</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Longitud</th>

                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cod Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Sexo Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Parent. Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Doc Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Seguro Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Estado Civil Cuidador</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido Cuidador</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Teléfono</th>

                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cod Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Regist Usurio al Programa</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Beneficiario</th>

                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Doc Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Seg Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido Usuario</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Grupo Etareo</th>
            </tr>
        </thead>
        <tbody>
            {{-- <td><img src="{{URL::asset('/images/avartar.png')}}" /></td> --}}
            @foreach($nominal as $list)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->anio }}</td>
                    <td>{{ $list->Mes }}</td>
                    <td>{{ $list->Ubigeo_Distrito_CG }}</td>
                    <td>{{ $list->Unidad_Territorial }}</td>
                    <td>{{ $list->Departamento }}</td>
                    <td>{{ $list->Provincia }}</td>
                    <td>{{ $list->Distrito }}</td>
                    <td>{{ $list->CUI_del_CG }}</td>
                    <td>{{ $list->Nombre_de_Comité_de_Gestion }}</td>
                    <td>{{ $list->Cod_Acompañante_Tecnico }}</td>
                    <td>{{ $list->Nro_Documento_de_Identificación_del_AT }}</td>
                    <td>{{ $list->full_name_at }}</td>
                    <td>{{ $list->CODIGO_DE_ACTOR_COMUNAL }}</td>
                    <td>{{ $list->Nro_Documento_de_Identificacion_DEL_ACTOR_COMUNAL }}</td>
                    <td>{{ $list->full_name_actor }}</td>
                    <td>{{ $list->CARGO_DEL_ACTOR_COMUNAL }}</td>
                    <td>{{ $list->Ubigeo_distrital_local }}</td>
                    <td>{{ $list->Departamento_local }}</td>
                    <td>{{ $list->Provincia_local }}</td>
                    <td>{{ $list->Distrito_local }}</td>
                    <td>{{ $list->UBIGEO_CCPP_local }}</td>
                    <td>{{ $list->Nombre_del_Centro_poblado_del_local }}</td>
                    <td>{{ $list->PUEBLO_INDIGENA_AMAZONICO_O_ANDINO }}</td>
                    <td>{{ $list->PUEBLO_INDIGENA_U_ORIGINARIO }}</td>
                    <td>{{ $list->LOCAL_ID }}</td>
                    <td>{{ $list->Nombre_del_Local }}</td>
                    <td>{{ $list->Direccion_del_Local }}</td>
                    <td>{{ $list->Latitud }}</td>
                    <td>{{ $list->Longitud }}</td>
                    <td>{{ $list->CODIGO_DE_CUIDADOR_PRINCIPAL }}</td>
                    <td>{{ $list->full_name_cuidador }}</td>
                    <td>{{ $list->SEXO_DEL_CUIDADOR_PRINCIPAL }}</td>
                    <td>{{ $list->Parentesco_con_el_niño_del_Cuidador_Principal }}</td>

                    <td>{{ $list->Tipo_de_documento_del_Cuidador_Principal }}</td>
                    <td>{{ $list->Número_de_documento_del_Cuidador_Principal }}</td>
                    <td>{{ $list->Tipo_de_Seguro_del_Cuidador_Principal }}</td>
                    <td>{{ $list->Estado_civil_del_cuidador_principal }}</td>
                    <td>{{ $list->Fecha_de_nacimiento_del_Cuidador_Principal }}</td>
                    <td>{{ $list->Telefono }}</td>

                    <td>{{ $list->Código_de_Usuario }}</td>
                    <td>{{ $list->full_name_usuario }}</td>
                    <td>{{ $list->Fecha_de_registro_del_usuario_al_programa }}</td>
                    <td>{{ $list->Tipo_de_Beneficiario }}</td>
                    <td>{{ $list->Tipo_de_documento_del_usuario }}</td>
                    <td>{{ $list->Numero_de_documento_del_usuario }}</td>
                    <td>{{ $list->Tipo_de_seguro_de_salud_del_usuario }}</td>
                    <td>{{ $list->Fecha_de_Nacimiento_del_usuario }}</td>
                    <td>{{ $list->Grupo_Etareo_DIT }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>