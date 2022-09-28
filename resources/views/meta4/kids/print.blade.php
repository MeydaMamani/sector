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
            <tr><td colspan="81"></td></tr>
            <tr>
                <td colspan="81" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="81"></td></tr>
            <tr>
                <td colspan="81" style="font-size: 16px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">PADRÓN DE NIÑOS MENORES DE 24 MESES PARA LA ATENCIÓN AL HOGAR Y SEG. NOMINAL - {{ $nameProv }} / {{ $nameDist }}</td>
            </tr>
            <tr><td colspan="81"></td></tr>
            <tr><td colspan="81"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="12" style="background: #DDEBF7; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Datos Personales Niño</th>
                <th colspan="4" style="background: #FCCECA; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Controles Cred Recién Nacidos</th>
                <th colspan="17" style="background: #E7FCE3; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Controles Cred Mensuales</th>
                <th colspan="3" style="background: #B1D4FC; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Neumococo</th>
                <th colspan="2" style="background: #A6B4C6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Rotavirus</th>
                <th colspan="3" style="background: white; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Pentavalente</th>
                <th colspan="2" style="background: #FFEDE6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna SPR</th>
                <th colspan="18" style="background: #E8D1DC; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Dosaje Hemoglobina</th>
                <th colspan="20" style="background: #FFE6FF; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Entrega de Hierro Mensual</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dni Act. Social</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Apellidos y Nombres Act. Social</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rango de Edad</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Tipo Doc Niño</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dni Niño</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Establecimiento</th>

                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Ctrl</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Ctrl</th>

                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">5° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">6° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">7° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">8° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">9° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">10° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">11° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">12° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">14° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">16° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">18° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">20° Ctrl Mes</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">22° Ctrl Mes</th>

                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 2</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 4</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 6</th>

                <th style="background: #A6B4C6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 2</th>
                <th style="background: #A6B4C6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 4</th>

                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 2</th>
                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 4</th>
                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 6</th>

                <th style="background: #FFEDE6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 12</th>
                <th style="background: #FFEDE6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 18</th>

                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 6</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 7</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 8</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 9</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 10</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 11</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 12</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 13</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 14</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 15</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 16</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 17</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 18</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 19</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 20</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 21</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 22</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 23</th>

                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 4</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 5</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 6</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 7</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 8</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 9</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 10</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 11</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 12</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 13</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 14</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 15</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 16</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 17</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 18</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 19</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 20</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 21</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 22</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 23</th>
            </tr>
        </thead>
        <tbody>
            {{-- <td><img src="{{URL::asset('/images/avartar.png')}}" /></td> --}}
            @foreach($nominal as $list)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->UBIGEO }}</td>
                    <td>{{ $list->DEPARTAMENTO }}</td>
                    <td>{{ $list->PROVINCIA }}</td>
                    <td>{{ $list->DISTRITO }}</td>
                    <td style="text-align: center;">{{ $list->DNI_ACTOR_SOCIAL }}</td>
                    <td>{{ $list->NOMBRE_ACTOR_SOCIAL }}</td>
                    <td>{{ $list->RANGO_DE_EDAD }}</td>
                    <td>{{ $list->TIPO_DE_DOCUMENTO_DEL_NINO }}</td>
                    <td>{{ $list->NUMERO_DE_DOCUMENTO_DEL_NINO }}</td>
                    <td>{{ $list->FECHA_DE_NACIMIENTO }}</td>
                    <td>{{ $list->EESS }}</td>
                    <td>{{ $list->CTRL1_RN }}</td>
                    <td>{{ $list->CTRL2_RN }}</td>
                    <td>{{ $list->CTRL3_RN }}</td>
                    <td>{{ $list->CTRL4_RN }}</td>
                    <td>{{ $list->CTRL1 }}</td>
                    <td>{{ $list->CTRL2 }}</td>
                    <td>{{ $list->CTRL3 }}</td>
                    <td>{{ $list->CTRL4 }}</td>
                    <td>{{ $list->CTRL5 }}</td>
                    <td>{{ $list->CTRL6 }}</td>
                    <td>{{ $list->CTRL7 }}</td>
                    <td>{{ $list->CTRL8 }}</td>
                    <td>{{ $list->CTRL9 }}</td>
                    <td>{{ $list->CTRL10 }}</td>
                    <td>{{ $list->CTRL11 }}</td>
                    <td>{{ $list->CTRL12 }}</td>
                    <td>{{ $list->CTRL14 }}</td>
                    <td>{{ $list->CTRL16 }}</td>
                    <td>{{ $list->CTRL18 }}</td>
                    <td>{{ $list->CTRL20 }}</td>
                    <td>{{ $list->CTRL22 }}</td>

                    <td>{{ $list->NEUMO1_2M }}</td>
                    <td>{{ $list->NEUMO2_4M }}</td>
                    <td>{{ $list->NEUMO3_6M }}</td>

                    <td>{{ $list->ROTA1_2M }}</td>
                    <td>{{ $list->ROTA2_4M }}</td>

                    <td>{{ $list->PENTA1_2M }}</td>
                    <td>{{ $list->PENTA2_4M }}</td>
                    <td>{{ $list->PENTA3_6M }}</td>

                    <td>{{ $list->SPR1_12M }}</td>
                    <td>{{ $list->SPR2_18M }}</td>

                    <td>{{ $list->DOSAJE_HMB_6M }}</td>
                    <td>{{ $list->DOSAJE_HMB_7M }}</td>
                    <td>{{ $list->DOSAJE_HMB_8M }}</td>
                    <td>{{ $list->DOSAJE_HMB_9M }}</td>
                    <td>{{ $list->DOSAJE_HMB_10M }}</td>
                    <td>{{ $list->DOSAJE_HMB_11M }}</td>
                    <td>{{ $list->DOSAJE_HMB_12M }}</td>
                    <td>{{ $list->DOSAJE_HMB_13M }}</td>
                    <td>{{ $list->DOSAJE_HMB_14M }}</td>
                    <td>{{ $list->DOSAJE_HMB_15M }}</td>
                    <td>{{ $list->DOSAJE_HMB_16M }}</td>
                    <td>{{ $list->DOSAJE_HMB_17M }}</td>
                    <td>{{ $list->DOSAJE_HMB_18M }}</td>
                    <td>{{ $list->DOSAJE_HMB_19M }}</td>
                    <td>{{ $list->DOSAJE_HMB_20M }}</td>
                    <td>{{ $list->DOSAJE_HMB_21M }}</td>
                    <td>{{ $list->DOSAJE_HMB_22M }}</td>
                    <td>{{ $list->DOSAJE_HMB_23M }}</td>

                    <td>{{ $list->EH_4M }}</td>
                    <td>{{ $list->EH_5M }}</td>
                    <td>{{ $list->EH_6M }}</td>
                    <td>{{ $list->EH_7M }}</td>
                    <td>{{ $list->EH_8M }}</td>
                    <td>{{ $list->EH_9M }}</td>
                    <td>{{ $list->EH_10M }}</td>
                    <td>{{ $list->EH_11M }}</td>
                    <td>{{ $list->EH_12M }}</td>
                    <td>{{ $list->EH_13M }}</td>
                    <td>{{ $list->EH_14M }}</td>
                    <td>{{ $list->EH_15M }}</td>
                    <td>{{ $list->EH_16M }}</td>
                    <td>{{ $list->EH_17M }}</td>
                    <td>{{ $list->EH_18M }}</td>
                    <td>{{ $list->EH_19M }}</td>
                    <td>{{ $list->EH_20M }}</td>
                    <td>{{ $list->EH_21M }}</td>
                    <td>{{ $list->EH_22M }}</td>
                    <td>{{ $list->EH_23M }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>