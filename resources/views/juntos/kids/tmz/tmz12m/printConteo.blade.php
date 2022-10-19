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
            <tr><td colspan="8"></td></tr>
            <tr>
                <td colspan="8" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="8"></td></tr>
            <tr>
                <td colspan="8" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte de Tamizaje en Niños de 12 Meses - Conteo {{ $anio }}</td>
            </tr>
            <tr><td colspan="8"></td></tr>
            <tr><td colspan="8"></td></tr>
        </thead>
        <thead>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Den</th>
                <th style="background: #f6c3cf; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Num Juntos</th>
                <th style="background: #f6c3cf; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Avance</th>
                <th style="background: #b5d3fa; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Num His</th>
                <th style="background: #b5d3fa; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Avance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominal as $list)
                <tr>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ $loop->iteration }}</td>
                    <td style="border: 3px solid #A6A6A6;">{{ $list->PROVINCIA_RES }}</td>
                    <td style="border: 3px solid #A6A6A6;">{{ $list->DISTRITO_RES }}</td>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ $list->DENOMINADOR }}</td>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ $list->TMZ_JUNT }}</td>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ round($list->AVANCE_JUNT, 1) }}%</td>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ $list->TMZ_HIS }}</td>
                    <td style="text-align: center; border: 3px solid #A6A6A6;">{{ round($list->AVANCE_HIS, 1) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>