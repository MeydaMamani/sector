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
            <tr><td colspan="13"></td></tr>
            <tr>
                <td colspan="13" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="13"></td></tr>
            <tr>
                <td colspan="13" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Vacunas en Niños de 2 Meses - {{ $anio }}</td>
            </tr>
            <tr><td colspan="13"></td></tr>
            <tr><td colspan="13"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="5" style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Datos Niño</th>
                <th colspan="4" style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Juntos</th>
                <th colspan="4" style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">HisMinsa</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Neumococo</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Rotavirus</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Pentavalente</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Neumococo</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Rotavirus</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Vacunas Pentavalente</th>
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
                    <td>{{ $list->VACUNA_NEUMO_2M }}</td>
                    <td>{{ $list->VACUNA_ROTA_2M }}</td>
                    <td>{{ $list->VACUNA_PENTA_2M }}</td>
                    <td>{{ $list->CUMPLE_JUNTOS }}</td>
                    <td>{{ $list->NEUMO1_2M }}</td>
                    <td>{{ $list->ROTA1_2M }}</td>
                    <td>{{ $list->PENTA1_2M }}</td>
                    <td>{{ $list->CUMPLE_HIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>