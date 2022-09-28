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
            <tr><td colspan="17"></td></tr>
            <tr>
                <td colspan="17" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="17"></td></tr>
            <tr>
                <td colspan="17" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Creds en Niños Menores de 1 Año - {{ $anio }}</td>
            </tr>
            <tr><td colspan="17"></td></tr>
            <tr><td colspan="17"></td></tr>
        </thead>
        <thead>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 1</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 2</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 3</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 4</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 5</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 6</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 7</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 8</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 9</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 17</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 11</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominal as $list)
                <tr style="text-align: center; border: 3px solid #A6A6A6;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->PROVINCIA }}</td>
                    <td>{{ $list->DISTRITO }}</td>
                    <td>{{ $list->NUMERO_DE_DOCUMENTO_DEL_NINO }}</td>
                    <td>{{ $list->FECHA_DE_NACIMIENTO }}</td>
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
                    <td>{{ $list->CUMPLE_HIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>