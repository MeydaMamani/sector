<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr><td colspan="29"></td></tr>
            <tr>
                <td colspan="29" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="29"></td></tr>
            <tr>
                <td colspan="29" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Atenciones Prenatales</td>
            </tr>
            <tr><td colspan="29"></td></tr>
            <tr><td colspan="29"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="6" style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Datos Gestante</th>
                <th colspan="12" style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Juntos</th>
                <th colspan="11" style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">HisMinsa</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">DNI</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Control 1</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Edad en Meses</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 0</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 1</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 2</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 3</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 4</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 5</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 6</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 7</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 8</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 9</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 10</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple Juntos</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 1</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 2</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 3</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 4</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 5</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 6</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 7</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 8</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 9</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Mes 10</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cumple His</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominal as $list)
                <tr style="text-align: center; border: 3px solid #A6A6A6;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->PROVINCIA_RES }}</td>
                    <td>{{ $list->DISTRITO_RES }}</td>
                    <td>{{ $list->DNI_MO }}</td>
                    <td>{{ $list->CONTROL1 }}</td>
                    <td>{{ $list->EDADMESES }}</td>
                    <td>{{ $list->_0_mes }}</td>
                    <td>{{ $list->_1_mes }}</td>
                    <td>{{ $list->_2_mes }}</td>
                    <td>{{ $list->_3_mes }}</td>
                    <td>{{ $list->_4_mes }}</td>
                    <td>{{ $list->_5_mes }}</td>
                    <td>{{ $list->_6_mes }}</td>
                    <td>{{ $list->_7_mes }}</td>
                    <td>{{ $list->_8_mes }}</td>
                    <td>{{ $list->_9_mes }}</td>
                    <td>{{ $list->_10_mes }}</td>
                    <td>{{ $list->CUMPLE_JUNT }}</td>
                    <td>{{ $list->CONTROL1}}</td>
                    <td>{{ $list->CONTROL2}}</td>
                    <td>{{ $list->CONTROL3}}</td>
                    <td>{{ $list->CONTROL4}}</td>
                    <td>{{ $list->CONTROL5}}</td>
                    <td>{{ $list->CONTROL6}}</td>
                    <td>{{ $list->CONTROL7}}</td>
                    <td>{{ $list->CONTROL8}}</td>
                    <td>{{ $list->CONTROL9}}</td>
                    <td>{{ $list->CONTROL10}}</td>
                    <td>{{ $list->CUMPLE_HIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>