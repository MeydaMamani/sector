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
            <tr><td colspan="31"></td></tr>
            <tr>
                <td colspan="31" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="31"></td></tr>
            <tr>
                <td colspan="31" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Suplementación en Niños de 1 a 2 Años {{ $anio }}</td>
            </tr>
            <tr><td colspan="31"></td></tr>
            <tr><td colspan="31"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="5" style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Datos Niño</th>
                <th colspan="13" style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Juntos</th>
                <th colspan="13" style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">HisMinsa</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 12 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 13 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 14 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 15 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 16 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 17 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 18 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 19 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 20 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 21 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 22 Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 23 Meses</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 12 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 13 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 14 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 15 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 16 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 17 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 18 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 19 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 20 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 21 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 22 Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 23 Meses</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominal as $list)
                <tr style="text-align: center; border: 3px solid #A6A6A6;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->PROVINCIA_RES }}</td>
                    <td>{{ $list->DISTRITO_RES }}</td>
                    <td>{{ $list->DNI_MO }}</td>
                    <td>{{ $list->FECHA_DE_NAC_MO }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_12M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_13M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_14M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_15M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_16M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_17M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_18M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_19M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_20M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_21M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_22M }}</td>
                    <td>{{ $list->ENTREGA_HIERRO_23M }}</td>
                    <td>{{ $list->AVANCE_JUNTOS }}</td>
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
                    <td>{{ $list->AVANCE_HIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>