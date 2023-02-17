<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div>
        <h2>Relación de Niños Observados a Subsanar </h2>
        <p>Por favor levantar observaciones Paquete Niño</p>
        <table>
            <thead>
                <tr><td colspan="20"></td></tr>
                <tr>
                    <td colspan="20" style="font-size: 20px; border: 1px solid #807d7d; font-weight: 600; text-align: center;">DIRESA PASCO DEIT</td>
                </tr>
                <tr><td colspan="20"></td></tr>
                <tr>
                    <td colspan="20" style="font-size: 18px; border: 1px solid #807d7d; font-weight: 600; text-align: center;">Reporte Paquete Completo - Juntos</td>
                </tr>
                <br>
            </thead>
            <thead>
                <tr>
                    <th style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">#</th>
                    {{-- <th WIDTH="24" style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Provincia</th> --}}
                    <th WIDTH="24" style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Distrito</th>
                    <th style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Documento</th>
                    <th style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Fecha Nacido</th>
                    <th style="background: #F6C3CF; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 1 Rn</th>
                    <th style="background: #F6C3CF; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 2 Rn</th>
                    <th style="background: #F6C3CF; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 3 Rn</th>
                    <th style="background: #F6C3CF; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 4 Rn</th>
                    <th style="background: #B1A0C7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cumple</th>
                    <th style="background: #B5D3FA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 1M</th>
                    <th style="background: #B5D3FA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 2M</th>
                    <th style="background: #FCE4D6; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Neumo 2M</th>
                    <th style="background: #E2EFDA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Rota 2M</th>
                    <th style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Penta 2M</th>
                    <th style="background: #B5D3FA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 3M</th>
                    <th style="background: #B5D3FA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Cntrl 4M</th>
                    <th style="background: white; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Suple 4 Mes</th>
                    <th style="background: #FCE4D6; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Neumo 4M</th>
                    <th style="background: #E2EFDA; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Rota 4M</th>
                    <th style="background: #DDEBF7; font-weight: 600; text-align: center; border: 1px solid #A6A6A6;">Penta 4M</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nominal as $list)
                    <tr style="text-align: center; border: 1px solid #A6A6A6; font-size: 11px;">
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        {{-- <td>{{ $list->PROVINCIA_RES }}</td> --}}
                        <td>{{ $list->DISTRITO_RES }}</td>
                        <td style="text-align: center;">{{ $list->DNI_MO }}</td>
                        <td style="text-align: center;">{{ $list->FECHA_DE_NAC_MO }}</td>
                        <td>{{ $list->CTRL1_RN }}</td>
                        <td>{{ $list->CTRL2_RN }}</td>
                        <td>{{ $list->CTRL3_RN }}</td>
                        <td>{{ $list->CTRL4_RN }}</td>
                        <td style="text-align: center;">
                            @if ($list->CUMPLE_RN == '1') Si
                            @else No
                            @endif
                        </td>
                        <td>{{ $list->CTRL1 }}</td>
                        <td>{{ $list->CTRL2 }}</td>
                        <td>{{ $list->NEUMO1_2M }}</td>
                        <td>{{ $list->ROTA1_2M }}</td>
                        <td>{{ $list->PENTA1_2M }}</td>
                        <td>{{ $list->CTRL3 }}</td>
                        <td>{{ $list->CTRL4 }}</td>
                        <td>{{ $list->EH_4M }}</td>
                        <td>{{ $list->NEUMO2_4M }}</td>
                        <td>{{ $list->ROTA2_4M }}</td>
                        <td>{{ $list->PENTA2_4M }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
