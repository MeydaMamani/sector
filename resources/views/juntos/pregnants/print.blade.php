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
            <tr><td colspan="83"></td></tr>
            <tr>
                <td colspan="83" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="83"></td></tr>
            <tr>
                <td colspan="83" style="font-size: 16px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">PADRÓN DE GESTANTES PARA LA ATENCION AL HOGAR Y SEG. NOMINAL - {{ $nameProv }} / {{ $nameDist }}</td>
            </tr>
            <tr><td colspan="83"></td></tr>
            <tr><td colspan="83"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="29" style="background: #DDEBF7; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Padrón de Hogares Afiliados/P. Transaccional</th>
                <th colspan="10" style="background: #fbbcb6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Exámenes Auxiliares</th>
                <th colspan="21" style="background: #9AF4C5; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Atenciones Prenatales</th>
                <th colspan="21" style="background: #e8faa3; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Suplementacion</th>
                
                <th colspan="2" style="background: #FFC1FF; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Datos Gestor</th>
                
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Item</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fuente</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">C_Región</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Unid. Territorial Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cod CCPP</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Centro Poblado Res</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Código Hogar</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Id Hogar</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dni Titular</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Titular</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Id Mo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Doc Mo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dni Mo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">F.Nacido Mo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Mo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Celular Titular</th>

                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Establecimiento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Renaes</th>

                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Probable de Parto</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Etapa de Vida</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Aproximado inicio de embarazo</th>


                <th style="background: #eec8c4; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN HB</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN HB HIS</th>
                <th style="background: #eec8c4; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN VIH</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">VIH HIS</th>
                <th style="background: #eec8c4; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN SIFILIS</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SIFILIS HIS</th>
                <th style="background: #eec8c4; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN ORINA</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">EXAMEN ORINA HIS</th>

                <th style="background: #eec8c4; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">ATENCION PRE NATAL</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">CONTROL PRE NATAL HIS</th>




                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">0 Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 1</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 2</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 3</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 4</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">5° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 5</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">6° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 6</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">7° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 7</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">8° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 8</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">9° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 9</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">10° Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ctrl 10</th>


                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">0 Mes</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 1</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 2</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 3</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 4</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">5° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 5</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">6° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 6</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">7° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 7</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">8° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 8</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">9° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 9</th>
                <th style="background: #e8faa3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">10° Mes</th>
                <th style="background: #f8ffed; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SUPLE 10</th>


                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">NOMBRE DE GESTOR LOCAL</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">UNIDAD TERRITORIAL</th>

            </tr>
        </thead>
        <tbody>
            {{-- <td><img src="{{URL::asset('/images/avartar.png')}}" /></td> --}}
            @foreach($nominal as $list)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->ITEM }}</td>
                    <td>{{ $list->FUENTE }}</td>
                    <td>{{ $list->C_REGION }}</td>
                    <td>{{ $list->UNIDAD_TERRITORIAL_RES }}</td>
                    <td>{{ $list->UBIGEO_RES }}</td>
                    <td>{{ $list->DEPARTAMENTO_RES }}</td>
                    <td>{{ $list->PROVINCIA_RES }}</td>
                    <td>{{ $list->DISTRITO_RES }}</td>
                    <td>{{ $list->COD_CCPP }}</td>
                    <td>{{ $list->CCPP_RES }}</td>
                    <td>{{ $list->CODIGO_HOGAR }}</td>
                    <td>{{ $list->IDHOGAR }}</td>
                    <td>{{ $list->DNI_TITULAR }}</td>
                    <td>{{ $list->FULLNAME_TITULAR }}</td>
                    <td>{{ $list->ID_MO }}</td>
                    <td>{{ $list->TIPODOC_MO }}</td>
                    <td>{{ $list->DNI_MO }}</td>
                    <td>{{ $list->FECHA_DE_NAC_MO }}</td>
                    <td>{{ $list->FULLNAME_MO }}</td>
                    <td>{{ $list->CEL_TITULAR }}</td>
                    <td>{{ $list->DEPA_EESS }}</td>
                    <td>{{ $list->PROV_EESS }}</td>
                    <td>{{ $list->DIST_EESS }}</td>
                    <td>{{ $list->EESS_MO }}</td>
                    <td>{{ $list->RENAES }}</td>
                    <td>{{ $list->F_PROB_PARTO_MO }}</td>
                    <td>{{ $list->ETAPA_DE_VIDA}}</td>
                    <td>{{ $list->APROXIMANDO_INICIO_DE_EMBARAZO }}</td>

                    <td>{{ $list->EXAMEN_HB }}</td>
                    <td>{{ $list->EXAMEN_HB_HIS }}</td>
                    <td>{{ $list->EXAMEN_VIH }}</td>
                    <td>{{ $list->VIH_HIS }}</td>
                    <td>{{ $list->EXAMEN_SIFILIS }}</td>
                    <td>{{ $list->SIFILIS_HIS }}</td>
                    <td>{{ $list->EXAMEN_ORINA }}</td>
                    <td>{{ $list->EXAMEN_ORINA_HIS }}</td>

                    <td>{{ $list->ATENCIÓN_PRE_NATAL }}</td>
                    <td>{{ $list->CONTROL_PRE_NATAL_HIS}}</td>
                   

                    <td>{{ $list->_0_mes }}</td>
                    <td>{{ $list->_1_mes }}</td>
                    <td>{{ $list->CONTROL1 }}</td>
                    <td>{{ $list->_2_mes }}</td>
                    <td>{{ $list->CONTROL2 }}</td>
                    <td>{{ $list->_3_mes }}</td>
                    <td>{{ $list->CONTROL3 }}</td>
                    <td>{{ $list->_4_mes }}</td>
                    <td>{{ $list->CONTROL4 }}</td>            
                    <td>{{ $list->_5_mes }}</td>
                    <td>{{ $list->CONTROL5 }}</td>
                    <td>{{ $list->_6_mes }}</td>
                    <td>{{ $list->CONTROL6 }}</td>
                    <td>{{ $list->_7_mes }}</td>
                    <td>{{ $list->CONTROL7 }}</td>
                    <td>{{ $list->_8_mes }}</td>
                    <td>{{ $list->CONTROL8 }}</td>
                    <td>{{ $list->_9_mes }}</td>
                    <td>{{ $list->CONTROL9 }}</td>
                    <td>{{ $list->_10_mes }}</td>
                    <td>{{ $list->CONTROL10 }}</td>


                    <td>{{ $list->_0_meses }}</td>
                    <td>{{ $list->_1_meses }}</td>
                    <td>{{ $list->SUPLE1 }}</td>
                    <td>{{ $list->_2_meses }}</td>
                    <td>{{ $list->SUPLE2 }}</td>
                    <td>{{ $list->_3_meses }}</td>
                    <td>{{ $list->SUPLE3 }}</td>
                    <td>{{ $list->_4_meses }}</td>
                    <td>{{ $list->SUPLE4 }}</td>            
                    <td>{{ $list->_5_meses }}</td>
                    <td>{{ $list->SUPLE5 }}</td>
                    <td>{{ $list->_6_meses }}</td>
                    <td>{{ $list->SUPLE6 }}</td>
                    <td>{{ $list->_7_meses }}</td>
                    <td>{{ $list->SUPLE7 }}</td>
                    <td>{{ $list->_8_meses }}</td>
                    <td>{{ $list->SUPLE8 }}</td>
                    <td>{{ $list->_9_meses }}</td>
                    <td>{{ $list->SUPLE9 }}</td>
                    <td>{{ $list->_10_meses }}</td>
                    <td>{{ $list->SUPLE10 }}</td>


                    <td>{{ $list->NOMBRE_DE_GESTOR_LOCAL}}</td>
                    <td>{{ $list->UNIDAD_TERROTRIAL_GL}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>