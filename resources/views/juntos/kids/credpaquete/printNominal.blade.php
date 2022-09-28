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
            <tr><td colspan="48"></td></tr>
            <tr>
                <td colspan="48" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="48"></td></tr>
            <tr>
                <td colspan="48" style="font-size: 18px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal Paquete Niños - {{ $anio }}</td>
            </tr>
            <tr><td colspan="48"></td></tr>
            <tr><td colspan="48"></td></tr>
        </thead>
        <thead>
            <tr>
                <th colspan="6" style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Datos Niño</th>
                <th colspan="22" style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">HisMinsa</th>
                <th colspan="20" style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Juntos</th>
            </tr>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Edad en Meses</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 1 RN</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 2 RN</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 3 RN</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 4 RN</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 1 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 2 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 3 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 4 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 5 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 6 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 7 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 8 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 9 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 10 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 11 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 12 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 14 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 16 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 18 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 20 Mes</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 22 Mes</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Avance His</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 1 RN</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 2 RN</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 1 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 2 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 3 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 4 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 5 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 6 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 7 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 8 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 9 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 10 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 11 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 12 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 14 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 16 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 18 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 20 Mes</th>
                <th style="background: #F6C3CF; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Cntrl 22 Mes</th>
                <th style="background: #FFFF00; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Avance Juntos</th>
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
                    <td>{{ $list->EDADMESES }}</td>
                    <td>{{ $list->CTRLRN1}}</td>
                    <td>{{ $list->CTRLRN2}}</td>
                    <td>{{ $list->CTRLRN3}}</td>
                    <td>{{ $list->CTRLRN4}}</td>
                    <td>{{ $list->CTRL1}}</td>
                    <td>{{ $list->CTRL2}}</td>
                    <td>{{ $list->CTRL3}}</td>
                    <td>{{ $list->CTRL4}}</td>
                    <td>{{ $list->CTRL5}}</td>
                    <td>{{ $list->CTRL6}}</td>
                    <td>{{ $list->CTRL7}}</td>
                    <td>{{ $list->CTRL8}}</td>
                    <td>{{ $list->CTRL9}}</td>
                    <td>{{ $list->CTRL10}}</td>
                    <td>{{ $list->CTRL11}}</td>
                    <td>{{ $list->CTRL12}}</td>
                    <td>{{ $list->CTRL14}}</td>
                    <td>{{ $list->CTRL16}}</td>
                    <td>{{ $list->CTRL18}}</td>
                    <td>{{ $list->CTRL20}}</td>
                    <td>{{ $list->CTRL22}}</td>
                    <td>{{ $list->AVANCE_HIS }}</td>
                    <td>{{ $list->CRN1 }}</td>
                    <td>{{ $list->CRN2 }}</td>
                    <td>{{ $list->_CRED_1_mes }}</td>
                    <td>{{ $list->_CRED_2_mes }}</td>
                    <td>{{ $list->_CRED_3_mes }}</td>
                    <td>{{ $list->_CRED_4_mes }}</td>
                    <td>{{ $list->_CRED_5_mes }}</td>
                    <td>{{ $list->_CRED_6_mes }}</td>
                    <td>{{ $list->_CRED_7_mes }}</td>
                    <td>{{ $list->_CRED_8_mes }}</td>
                    <td>{{ $list->_CRED_9_mes }}</td>
                    <td>{{ $list->_CRED_10_mes }}</td>
                    <td>{{ $list->_CRED_11_mes }}</td>
                    <td>{{ $list->_CRED_12_mes }}</td>
                    <td>{{ $list->_CRED_14_mes }}</td>
                    <td>{{ $list->_CRED_16_mes }}</td>
                    <td>{{ $list->_CRED_18_mes }}</td>
                    <td>{{ $list->_CRED_20_mes }}</td>
                    <td>{{ $list->_CRED_22_mes }}</td>
                    <td>{{ $list->AVANCE_JUNTOS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>