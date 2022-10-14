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
            <tr><td colspan="19"></td></tr>
            <tr>
                <td colspan="19" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="19"></td></tr>
            <tr>
                <td colspan="19" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Creds en Niños de 1 a 2 Años - {{ $anio }}</td>
            </tr>
            <tr><td colspan="19"></td></tr>
            <tr><td colspan="19"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="5" style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Datos Niño</th>
                <th colspan="7" style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Juntos</th>
                <th colspan="7" style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">HisMinsa</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 12 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 14 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 16 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 18 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 20 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 22 Mes</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 12 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 14 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 16 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 18 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 20 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 22 Mes</th>
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
                    <td>{{ $list->_CRED_12_mes }}</td>
                    <td>{{ $list->_CRED_14_mes }}</td>
                    <td>{{ $list->_CRED_16_mes }}</td>
                    <td>{{ $list->_CRED_18_mes }}</td>
                    <td>{{ $list->_CRED_20_mes }}</td>
                    <td>{{ $list->_CRED_22_mes }}</td>
                    <td>{{ $list->CUMPLE_JUNTOS }}</td>
                    <td>{{ $list->CTRL12 }}</td>
                    <td>{{ $list->CTRL14 }}</td>
                    <td>{{ $list->CTRL16 }}</td>
                    <td>{{ $list->CTRL18 }}</td>
                    <td>{{ $list->CTRL20 }}</td>
                    <td>{{ $list->CTRL22 }}</td>
                    <td>{{ $list->CUMPLE_HIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>