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
            <tr><td colspan="14"></td></tr>
            <tr>
                <td colspan="14" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="14"></td></tr>
            <tr>
                <td colspan="14" style="font-size: 17px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Niños con Dx Anemia de 6 a 11 Meses</td>
            </tr>
            <tr><td colspan="14"></td></tr>
            <tr><td colspan="14"></td></tr>
        </thead>
        <thead>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Establecimiento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Dosaje Anemia</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 6</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 7</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 8</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 9</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 10</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 11</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple Suple</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominal as $list)
                <tr style="text-align: center; border: 3px solid #A6A6A6;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->PROVINCIA }}</td>
                    <td>{{ $list->DISTRITO }}</td>
                    <td>{{ $list->EESS }}</td>
                    <td>{{ $list->FECHA_DE_NACIMIENTO }}</td>
                    <td>{{ $list->NUMERO_DE_DOCUMENTO_DEL_NINO }}</td>
                    <td>{{ $list->ANEMIA_6M }}</td>
                    <td>{{ $list->EH_6M }}</td>
                    <td>{{ $list->EH_7M }}</td>
                    <td>{{ $list->EH_8M }}</td>
                    <td>{{ $list->EH_9M }}</td>
                    <td>{{ $list->EH_10M }}</td>
                    <td>{{ $list->EH_11M }}</td>
                    <td>{{ $list->CUMPLE_SUPLE }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>