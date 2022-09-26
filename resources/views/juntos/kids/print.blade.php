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
            <tr><td colspan="138"></td></tr>
            <tr>
                <td colspan="138" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="138"></td></tr>
            <tr>
                <td colspan="138" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">PADRÓN DE NIÑOS MENORES DE 24 MESES PARA LA ATENCIÓN AL HOGAR Y SEG. NOMINAL - {{ $nameDist }}</td>
            </tr>
            <tr><td colspan="138"></td></tr>
            <tr><td colspan="138"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="21" style="background: #DDEBF7; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Padrón de Hogares Afiliados/P. Transaccional</th>
                <th colspan="5" style="background: #F1F1C0; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Declarado - PHA/Transaccional</th>
                <th colspan="6" style="background: #FCE4D6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">HisMinsa - Establecimiento Ult Atención</th>
                <th colspan="6" style="background: #FCCECA; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Controles Cred Recién Nacidos</th>
                <th colspan="34" style="background: #E7FCE3; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Controles Cred Mensuales</th>
                <th colspan="6" style="background: #B1D4FC; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Neumococo</th>
                <th colspan="4" style="background: #A6B4C6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Rotavirus</th>
                <th colspan="6" style="background: white; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna Pentavalente</th>
                <th colspan="4" style="background: #FFEDE6; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Vacuna SPR</th>
                <th colspan="6" style="background: #E8D1DC; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Dosaje Hemoglobina</th>
                <th colspan="40" style="background: #FFE6FF; font-weight: 500; text-align: center; font-size:12px; border: 3px solid #A6A6A6;">Entrega de Hieero Mensual</th>
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

                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Establecimiento</th>
                <th style="background: #F1F1C0; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Renaes</th>

                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Ubigeo</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Departamento</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Establecimiento</th>
                <th style="background: #FCE4D6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Renaes</th>

                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl His</th>
                <th style="background: #FCCECA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl His</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Ctrl His</th>
                <th style="background: #FA9890; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Ctrl His</th>

                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">1° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">2° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">3° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">4° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">5° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">5° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">6° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">6° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">7° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">7° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">8° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">8° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">9° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">9° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">10° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">10° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">11° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">11° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">12° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">12° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">14° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">14° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">16° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">16° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">18° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">18° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">20° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">20° Ctrl Mes His</th>
                <th style="background: #E7FCE3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">22° Ctrl Mes</th>
                <th style="background: #9AF4C5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">22° Ctrl Mes His</th>

                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 2</th>
                <th style="background: #72B3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 2 His</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 4</th>
                <th style="background: #72B3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 4 His</th>
                <th style="background: #B1D4FC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 12</th>
                <th style="background: #72B3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Neumococo 12 His</th>

                <th style="background: #A6B4C6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 2</th>
                <th style="background: #546882; color: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 2 His</th>
                <th style="background: #A6B4C6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 4</th>
                <th style="background: #546882; color: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Rotavirus 4 His</th>

                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 2</th>
                <th style="background: #D9D9D9; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 2 His</th>
                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 4</th>
                <th style="background: #D9D9D9; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 4 His</th>
                <th style="background: white; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 6</th>
                <th style="background: #D9D9D9; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Pentavalente 6 His</th>

                <th style="background: #FFEDE6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 12</th>
                <th style="background: #FFC9B3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 12 His</th>
                <th style="background: #FFEDE6; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 18</th>
                <th style="background: #FFC9B3; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">SPR 18 His</th>

                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 6</th>
                <th style="background: #CE9EB5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 6 His</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 12</th>
                <th style="background: #CE9EB5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 12 His</th>
                <th style="background: #E8D1DC; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 18</th>
                <th style="background: #CE9EB5; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Hg 18 His</th>

                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 4</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 4 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 5</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 5 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 6</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 6 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 7</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 7 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 8</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 8 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 9</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 9 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 10</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 10 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 11</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 11 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 12</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 12 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 13</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 13 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 14</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 14 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 15</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 15 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 16</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 16 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 17</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 17 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 18</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 18 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 19</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 19 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 20</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 20 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 21</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 21 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 22</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 22 His</th>
                <th style="background: #FFE6FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 23</th>
                <th style="background: #FFC1FF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Hierro 23 His</th>
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
                    <td>{{ $list->TIPO_DOC_MO }}</td>
                    <td>{{ $list->DNI_MO }}</td>
                    <td>{{ $list->FECHA_DE_NAC_MO }}</td>
                    <td>{{ $list->FULLNAME_MO }}</td>
                    <td>{{ $list->CEL_TITULAR }}</td>
                    <td>{{ $list->DEPA_EESS }}</td>
                    <td>{{ $list->PROV_EESS }}</td>
                    <td>{{ $list->DIST_EESS }}</td>
                    <td>{{ $list->EESS_MO }}</td>
                    <td>{{ $list->RENAES }}</td>
                    <td>{{ $list->UBIGEO_EESS_ULT_ATEN }}</td>
                    <td>{{ $list->DEPA_EESS_ULT_ATEN }}</td>
                    <td>{{ $list->PROV_EESS_ULT_ATEN }}</td>
                    <td>{{ $list->DIST_EESS_ULT_ATEN }}</td>
                    <td>{{ $list->NOMBRE_EESS_MO_ULT_ATEN }}</td>
                    <td>{{ $list->RENAES_ULT_ATEN }}</td>

                    <td>{{ $list->CRN1 }}</td>
                    <td>{{ $list->CTRL1_RN }}</td>
                    <td>{{ $list->CRN2 }}</td>
                    <td>{{ $list->CTRL2_RN }}</td>
                    <td>{{ $list->CTRL3_RN }}</td>
                    <td>{{ $list->CTRL4_RN }}</td>

                    <td>{{ $list->_CRED_1_mes }}</td>
                    <td>{{ $list->CTRL1 }}</td>
                    <td>{{ $list->_CRED_2_mes }}</td>
                    <td>{{ $list->CTRL2 }}</td>
                    <td>{{ $list->_CRED_3_mes }}</td>
                    <td>{{ $list->CTRL3 }}</td>
                    <td>{{ $list->_CRED_4_mes }}</td>
                    <td>{{ $list->CTRL4 }}</td>
                    <td>{{ $list->_CRED_5_mes }}</td>
                    <td>{{ $list->CTRL5 }}</td>
                    <td>{{ $list->_CRED_6_mes }}</td>
                    <td>{{ $list->CTRL6 }}</td>
                    <td>{{ $list->_CRED_7_mes }}</td>
                    <td>{{ $list->CTRL7 }}</td>
                    <td>{{ $list->_CRED_8_mes }}</td>
                    <td>{{ $list->CTRL8 }}</td>
                    <td>{{ $list->_CRED_9_mes }}</td>
                    <td>{{ $list->CTRL9 }}</td>
                    <td>{{ $list->_CRED_10_mes }}</td>
                    <td>{{ $list->CTRL10 }}</td>
                    <td>{{ $list->_CRED_11_mes }}</td>
                    <td>{{ $list->CTRL11 }}</td>
                    <td>{{ $list->_CRED_12_mes }}</td>
                    <td>{{ $list->CTRL12 }}</td>
                    <td>{{ $list->_CRED_14_mes }}</td>
                    <td>{{ $list->CTRL14 }}</td>
                    <td>{{ $list->_CRED_16_mes }}</td>
                    <td>{{ $list->CTRL16 }}</td>
                    <td>{{ $list->_CRED_18_mes }}</td>
                    <td>{{ $list->CTRL18 }}</td>
                    <td>{{ $list->_CRED_20_mes }}</td>
                    <td>{{ $list->CTRL20 }}</td>
                    <td>{{ $list->_CRED_22_mes }}</td>
                    <td>{{ $list->CTRL22 }}</td>

                    <td>{{ $list->VACUNA_NEUMO_2M }}</td>
                    <td>{{ $list->NEUMO1_2M }}</td>
                    <td>{{ $list->VACUNA_NEUMO_4M }}</td>
                    <td>{{ $list->NEUMO2_4M }}</td>
                    <td>{{ $list->VACUNA_NEUMO_12M }}</td>
                    <td>{{ $list->NEUMO3_6M }}</td>

                    <td>{{ $list->VACUNA_ROTA_2M }}</td>
                    <td>{{ $list->ROTA1_2M }}</td>
                    <td>{{ $list->VACUNA_ROTA_4M }}</td>
                    <td>{{ $list->ROTA2_4M }}</td>

                    <td>{{ $list->VACUNA_PENTA_2M }}</td>
                    <td>{{ $list->PENTA1_2M }}</td>
                    <td>{{ $list->VACUNA_PENTA_4M }}</td>
                    <td>{{ $list->PENTA2_4M }}</td>
                    <td>{{ $list->VACUNA_PENTA_6M }}</td>
                    <td>{{ $list->PENTA3_6M }}</td>

                    <td>{{ $list->VACUNA_SPR_12M }}</td>
                    <td>{{ $list->SPR1_12M }}</td>
                    <td>{{ $list->VACUNA_SPR_18M }}</td>
                    <td>{{ $list->SPR2_18M }}</td>

                    <td>{{ $list->DOSAJE_HEMOGLOBINA_6M }}</td>
                    <td>{{ $list->DOSAJE_HMB_6M }}</td>
                    <td>{{ $list->DOSAJE_HEMOGLOBINA_12M }}</td>
                    <td>{{ $list->DOSAJE_HMB_12M }}</td>
                    <td>{{ $list->DOSAJE_HEMOGLOBINA_18M }}</td>
                    <td>{{ $list->DOSAJE_HMB_18M }}</td>

                    <td>{{ $list->ENTREGA_HIERRO_4M }}</td>
                    <td>{{ $list->EH_4M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_5M }}</td>
                    <td>{{ $list->EH_5M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_6M }}</td>
                    <td>{{ $list->EH_6M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_7M }}</td>
                    <td>{{ $list->EH_7M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_8M }}</td>
                    <td>{{ $list->EH_8M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_9M }}</td>
                    <td>{{ $list->EH_9M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_10M }}</td>
                    <td>{{ $list->EH_10M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_11M }}</td>
                    <td>{{ $list->EH_11M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_12M }}</td>
                    <td>{{ $list->EH_12M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_13M }}</td>
                    <td>{{ $list->EH_13M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_14M }}</td>
                    <td>{{ $list->EH_14M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_15M }}</td>
                    <td>{{ $list->EH_15M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_16M }}</td>
                    <td>{{ $list->EH_16M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_17M }}</td>
                    <td>{{ $list->EH_17M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_18M }}</td>
                    <td>{{ $list->EH_18M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_19M }}</td>
                    <td>{{ $list->EH_19M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_20M }}</td>
                    <td>{{ $list->EH_20M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_21M }}</td>
                    <td>{{ $list->EH_21M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_22M }}</td>
                    <td>{{ $list->EH_22M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_23M }}</td>
                    <td>{{ $list->EH_23M }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>