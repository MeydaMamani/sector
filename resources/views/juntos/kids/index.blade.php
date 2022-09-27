@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appKids">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5 class="mb-0">Niños Menores de 24 meses</h5>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right font-14">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Niños</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="info-box elevation-2 p-2">
                                <div class="info-box-content">
                                    <span class="info-box-text font-13 text-center">Cant. Miembros Objetivos</span>
                                    <div class="d-flex">
                                        <div class="col-md-5 justify-content-center align-items-center d-flex">
                                            <img src="./img/user_cant.png" width="33" alt="icon cantidad total">
                                        </div>
                                        <span class="info-box-number col-md-7 text-secondary font-23">[[ total ]]</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card elevation-2">
                                <h5 class="card-header text-white text-center p-1 font-13 bg-olive">Filtro Nominal</h5>
                                <div class="card-body p-2">
                                    <form method="POST" id="formulario" @submit.prevent="PrintNominal">
                                        <div class="col-md-12 mb-2 p-0">
                                            <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="red" @change="filtersDistricts" v-select2>
                                                <option value="">Seleccione Red</option>
                                                <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-2 p-0">
                                            <select class="form-control select2 show-tick" data-width="100%" v-model="distrito" name="distrito" v-select2>
                                                <option value="">Seleccione Distrito</option>
                                                <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-2 p-0">
                                            <select class="form-control select2 show-tick" data-width="100%" v-model="anio" name="anio" v-select2>
                                                <option value="">Seleccione año</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 p-0">
                                            <button class="btn btn-outline-success btn-block btn-sm mt-1 font-12" type="submit"><i class="fa fa-print"></i> Descargar</button>
                                        </div>
                                    </form>
                                </div>
                            </div><br>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="background: #f6c3cf;" width="50"></td>
                                        <td>Juntos</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #b5d3fa;" width="50"></td>
                                        <td>HisMinsa</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #bbedbb;" width="50"></td>
                                        <td>Coinciden</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-outline card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Controles Creds (Según Ficha Fed)</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="border border-secondary">
                                                        <div class="d-flex">
                                                            <h6 class="p-2 mb-0 text-center col-md-11">Avance</h6>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="paqueteCreds" @change="grafChildsPackage">
                                                            </div>
                                                        </div>
                                                        {{-- <button @click="grafChildsCred">HOLAAAA</button> --}}
                                                        <div class="barChartCred" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGrafCred" @change="grafChildsCred">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalRecienNacidos" @click="tableResumRn">
                                                        Recién Nacidos
                                                    </button>
                                                    <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalCredsMes" @click="tableResumCredMes">
                                                        Menor de 1 año
                                                    </button>
                                                    <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalCred12Anios">
                                                        1 a 2 Años
                                                    </button>
                                                    <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalPaqueteNinio">
                                                        Paquete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- MODAL CRED RECIEN NACIDOS -->
        <div class="modal fade" id="modalRecienNacidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creds - Recién Nacidos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableRn" @change="tableResumRn">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="TODOS">TODOS</option>
                                    </select>
                                </div>
                                <div class="table-responsive" id="cred_juntos">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="font-10 text-center" style="background: #e0eff5;">
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Provincia</th>
                                                <th class="align-middle">Distrito</th>
                                                <th class="align-middle">Den</th>
                                                <th class="align-middle">Num Juntos</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Coin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumRn" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA_RES ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO_RES ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_JUNT_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_JUNT) ]]%</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_HIS) ]]%</td>
                                                <template v-if="format.AVANCE_JUNT == format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #bbedbb;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT < format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #b5d3fa;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT > format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #f6c3cf;"></td>
                                                </template>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Recién Nacidos</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formRn" @submit.prevent="PrintRn">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redRn" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distRn" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioRn" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeRn" v-select2 required>
                                                    <option value="" selected>Seleccione Tipo</option>
                                                    <option value="nominal">NOMINAL</option>
                                                    <option value="conteo">CONTEO</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-outline-success btn-block btn-sm mt-1 font-12 w-100"><i class="fa fa-print"></i> Descargar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CRED MENSUALES MENOS DE 1 AÑO -->
        <div class="modal fade" id="modalCredsMes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Total de Niños de 1 a 11 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableCredMes" @change="tableResumCredMes">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="TODOS">TODOS</option>
                                    </select>
                                </div>
                                <div class="table-responsive" id="cred_juntos">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="font-10 text-center" style="background: #e0eff5;">
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Provincia</th>
                                                <th class="align-middle">Distrito</th>
                                                <th class="align-middle">Den</th>
                                                <th class="align-middle">Num Juntos</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Coin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumCredMes" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA_RES ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO_RES ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_JUNT_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_JUNT) ]]%</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_HIS) ]]%</td>
                                                <template v-if="format.AVANCE_JUNT == format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #bbedbb;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT < format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #b5d3fa;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT > format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #f6c3cf;"></td>
                                                </template>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Niños menores de 1 año</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formCredMes" @submit.prevent="PrintCredMes">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provCredMes" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distCredMes" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioCredMes" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeCredMes" v-select2 required>
                                                    <option value="" selected>Seleccione Tipo</option>
                                                    <option value="nominal">NOMINAL</option>
                                                    <option value="conteo">CONTEO</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-outline-success btn-block btn-sm mt-1 font-12 w-100"><i class="fa fa-print"></i> Descargar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CRED MENSUALES DE 1 A 2 AÑOS -->
        <div class="modal fade" id="modalCred12Anios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Total de Niños de 2 a 23 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableCredMes" @change="tableResumCredMes">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="TODOS">TODOS</option>
                                    </select>
                                </div>
                                <div class="table-responsive" id="cred_juntos">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="font-10 text-center" style="background: #e0eff5;">
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Provincia</th>
                                                <th class="align-middle">Distrito</th>
                                                <th class="align-middle">Den</th>
                                                <th class="align-middle">Num Juntos</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                                <th class="align-middle">Coin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumCredMes" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA_RES ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO_RES ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_JUNT_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_JUNT) ]]%</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.ceil(format.AVANCE_HIS) ]]%</td>
                                                <template v-if="format.AVANCE_JUNT == format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #bbedbb;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT < format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #b5d3fa;"></td>
                                                </template>
                                                <template v-else-if="format.AVANCE_JUNT > format.AVANCE_HIS">
                                                    <td class="align-middle text-center" style="background: #f6c3cf;"></td>
                                                </template>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Niños menores de 1 año</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formCredMes" @submit.prevent="PrintCredMes">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provCredMes" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distCredMes" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioCredMes" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeCredMes" v-select2 required>
                                                    <option value="" selected>Seleccione Tipo</option>
                                                    <option value="nominal">NOMINAL</option>
                                                    <option value="conteo">CONTEO</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-outline-success btn-block btn-sm mt-1 font-12 w-100"><i class="fa fa-print"></i> Descargar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CRED MENSUALES DE 1 A 2 AÑOS -->
        <div class="modal fade" id="modalPaqueteNinio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Paquete Niño</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9" id="table_resume">
                                <div class="d-flex">
                                    <div class="mb-2 col-md-3 filter_fed col-md-3">
                                        <select class="form-select" name="anioPaquete" id="anioPaquete" onchange="tableResumPaqueteNinio();">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="TODOS" selected>TODOS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9 d-flex font-13">
                                        <b>&nbsp; &nbsp; &nbsp;Den:</b> &nbsp;&nbsp;<span id="denominador"></span>
                                        <b>&nbsp; &nbsp; &nbsp;Num Juntos:</b> &nbsp;&nbsp;<span id="num_junt"></span>
                                        <b>&nbsp; &nbsp; &nbsp;Num His:</b> &nbsp;&nbsp;<span id="num_his"></span>
                                    </div>
                                </div>
                                <div id="table_resume_paquete"></div>
                            </div>
                            <div class="col-md-3 p-0">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                    <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">1 a 2 años</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" name="f18" action="./junt_print_creds.php">
                                            <div class="mb-2 filter_fed">
                                                <select class="form-select" name="red18" id="red18" onchange="cambia_distrito18();" aria-label="Default select example">
                                                    <option value="0" selected>Seleccione Red</option>
                                                    <option value="1">DANIEL ALCIDES CARRION</option>
                                                    <option value="2">OXAPAMPA</option>
                                                    <option value="3">PASCO</option>
                                                    <option value="4">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 filter_fed">
                                                <select class="select_gestante form-select" name="distrito18" id="distrito18">
                                                    <option value="-" selected>Seleccione Distrito</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 filter_fed">
                                                <select class="select_gestante form-select" name="anio18" id="anio18">
                                                    <option value="-" selected>Seleccione Año</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 filter_fed">
                                                <select class="select_gestante form-select" name="paquete" id="paquete">
                                                    <option value="-" selected>Seleccione Tipo</option>
                                                    <option value="packNom">Nominal</option>
                                                    <option value="packCont">Conteo</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="submit" name="dataPaquete" class="btn btn-outline-success mb-2 btn-sm w-100"><i class="mdi mdi-printer"></i> Descargar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/juntos/kids/vue/kids.js"></script>
    <script src="./js/juntos/kids/js/kids.js"></script>
@endsection

@section('scripts')

@endsection