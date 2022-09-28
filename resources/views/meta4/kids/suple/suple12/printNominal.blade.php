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
            <tr><td colspan="18"></td></tr>
            <tr>
                <td colspan="18" style="font-size: 20px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">DIRESA PASCO DEIT</td>
            </tr>
            <tr><td colspan="18"></td></tr>
            <tr>
                <td colspan="18" style="font-size: 17px; border: 3px solid #807d7d; font-weight: 500; text-align: center;">Reporte Nominal de Suplementación en Niños de 1 a 2 Años {{ $anio }}</td>
            </tr>
            <tr><td colspan="18"></td></tr>
            <tr><td colspan="18"></td></tr>
        </thead>
        <thead>
            <tr>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">#</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Provincia</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Distrito</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Documento</th>
                <th style="background: #DDEBF7; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Fecha Nacido</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 12</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 13</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 14</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 15</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 16</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 17</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 18</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 19</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 20</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 21</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 22</th>
                <th style="background: #B5D3FA; font-weight: 500; text-align: center; border: 3px solid #A6A6A6;">Suple 23</th>
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