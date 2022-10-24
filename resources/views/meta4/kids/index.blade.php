@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appKidsMet4">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5 class="mb-0"><b> META 4: </b>Niños Menores de 24 meses</h5>
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
                                        <td style="background: #b5d3fa;" width="50"></td>
                                        <td>HisMinsa</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-outline card-lightblue">
                                        <div class="card-header">
                                            <h3 class="card-title">Niños de 6 a 11 Meses</h3>
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
                                                        </div>
                                                        <div class="barChart6_11m" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGraf6_11m" @change="grafChilds6_11m">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-info w-100 btn-sm mb-2" data-toggle="modal" data-target="#modal6_11m" @click="tableResumPack6_11">
                                                        Paquete
                                                    </button>
                                                    <button class="btn btn-outline-info w-100 btn-sm mb-2" data-toggle="modal" data-target="#modaldxanem6_11m" @click="tableResumDxAnemia">
                                                        Dx Anemia y Tto
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-outline card-pink">
                                        <div class="card-header">
                                            <h3 class="card-title">Niños de 4 a 5 Meses</h3>
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
                                                        </div>
                                                        <div class="barChart4_5m" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGraf6_11m" @change="grafChilds4_5m">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-secondary w-100 btn-sm mb-2" data-toggle="modal" data-target="#modal4_5m" @click="tableResumPack4_5">
                                                        Paquete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                            {{-- <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="paqueteCreds" @change="grafChildsPackage">
                                                            </div> --}}
                                                        </div>
                                                        {{-- <button @click="grafChildsCred">HOLAAAA</button> --}}
                                                        <div class="barChartCred" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGrafCred" @change="grafChildsCred">
                                                            <option value="-">Seleccione año</option>
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
                                                    <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalCred12Anios" @click="tableResumCred12">
                                                        1 a 2 Años
                                                    </button>
                                                    {{-- <button class="btn btn-outline-danger w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalPaqueteNinio" @click="tableResumCredPack">
                                                        Paquete
                                                    </button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Suplementación</h3>
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
                                                        </div>
                                                        <div class="barChartSuple" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGrafSuple" @change="grafChildsSuple">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-warning w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalSuple45" @click="tableResumSuple45">
                                                        4 a 5 Meses
                                                    </button>
                                                    <button class="btn btn-outline-warning w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalSuple611" @click="tableResumSuple611">
                                                        6 a 11 Meses
                                                    </button>
                                                    <button class="btn btn-outline-warning w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalSuple12" @click="tableResumSuple12">
                                                        1 a 2 Años
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Vacunas</h3>
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
                                                        </div>
                                                        <div class="barChartVaccine" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGrafVac" @change="grafChildsVaccine">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-primary w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalVaccine2M" @click="tableResumVac2M">
                                                        2 Meses
                                                    </button>
                                                    <button class="btn btn-outline-primary w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalVaccine4M" @click="tableResumVac4M">
                                                        4 Meses
                                                    </button>
                                                    <button class="btn btn-outline-primary w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalVaccine6M" @click="tableResumVac6M">
                                                        6 Meses
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-outline card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Tamizaje</h3>
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
                                                        </div>
                                                        <div class="barChartTmz" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 filter_fed">
                                                        <select class="form-control" data-width="100%" v-model="anioGrafTmz" @change="grafChildsTmz">
                                                            <option value="-">Seleccione año</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="TODOS">TODOS</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-success w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalTmz6M" @click="tableResumTmz6M">
                                                        6 Meses
                                                    </button>
                                                    <button class="btn btn-outline-success w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalTmz12M" @click="tableResumTmz12M">
                                                        12 Meses
                                                    </button>
                                                    <button class="btn btn-outline-success w-100 btn-sm mb-2" data-toggle="modal" data-target="#modalTmz18M" @click="tableResumTmz18M">
                                                        18 Meses
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

        <!-- MODAL NIÑOS DE 6 A 11 MESES PAQUETE -->
        <div class="modal fade" id="modal6_11m" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Paquete Niños de 6 a 11 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTabl611" @change="tableResumPack6_11">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumPack6_11" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.PAQUETE ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">6 a 11 Meses </h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="form611" @submit.prevent="Print611">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="red6_11" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="dist6_11" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anio6_11" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="type6_11" v-select2 required>
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

        <!-- MODAL NIÑOS DE 6 A 11 MESES CON DX ANEMIA -->
        <div class="modal fade" id="modaldxanem6_11m" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Dx Anemia y Tratamiento en Niños de 6 a 11 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablDx611" @change="tableResumDxAnemia">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumDX6_11" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.PAQUETE ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">6 a 11 Meses </h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formDx611" @submit.prevent="PrintDx611">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="reddx6_11" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distdx6_11" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="aniodx6_11" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typedx6_11" v-select2 required>
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

        <!-- MODAL NIÑOS DE 6 A 11 MESES PAQUETE -->
        <div class="modal fade" id="modal4_5m" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Paquete Niños de 4 a 5 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTabl45" @change="tableResumPack4_5">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumPack4_5" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.PAQUETE ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">4 a 5 Meses </h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="form45" @submit.prevent="Print45">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="red4_5" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="dist4_5" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anio4_5" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="type4_5" v-select2 required>
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumRn" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumCredMes" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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

        <!-- MODAL CRED MENSUALES 1 a 2 AÑOS -->
        <div class="modal fade" id="modalCred12Anios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Total de Niños de 1 a 2 Años</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableCred12" @change="tableResumCred12">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumCred12" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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
                                        <form method="POST" id="formCred12" @submit.prevent="PrintCred12">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provCred12" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distCred12" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioCred12" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeCred12" v-select2 required>
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

        <!-- MODAL CRED PAQUETE OJOOOOOOOOOOOOO FALTA-->
        <div class="modal fade" id="modalPaqueteNinio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Paquete Niños </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableCredPack" @change="tableResumCredPack">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTableResumCredPack" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.RN_HIS_NUM ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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
                                        <form method="POST" id="formCred12" @submit.prevent="PrintCred12">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provCred12" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distCred12" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioCred12" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeCred12" v-select2 required>
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

        <!-- MODAL SUPLEMENTACION DE 4 A 5 MESES -->
        <div class="modal fade" id="modalSuple45" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Suplementación de 4 a 5 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablSuple45" @change="tableResumSuple45">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumSuple45" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.SUPLE4_5_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Suple 4 a 5</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formSuple45" @submit.prevent="PrintSuple45">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redSuple45" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distSuple45" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioSuple45" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeSuple45" v-select2 required>
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

        <!-- MODAL SUPLEMENTACION DE 6 A 11 MESES -->
        <div class="modal fade" id="modalSuple611" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Suplementación de 6 a 11 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablSuple611" @change="tableResumSuple611">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumSuple611" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.SUPLE6_11_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Suple 6 a 11</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formSuple611" @submit.prevent="PrintSuple611">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redSuple611" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distSuple611" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioSuple611" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeSuple611" v-select2 required>
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

        <!-- MODAL SUPLEMENTACION DE 1 A 2 AÑOS -->
        <div class="modal fade" id="modalSuple12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Suplementación de 1 a 2 Años</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablSuple12" @change="tableResumSuple12">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumSuple12" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.NUM_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Suple 1 a 2 Años</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formSuple12" @submit.prevent="PrintSuple12">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redSuple12" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distSuple12" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioSuple12" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeSuple12" v-select2 required>
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

        <!-- MODAL VACUNAS DE 2 MESES -->
        <div class="modal fade" id="modalVaccine2M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Vacunas de 2 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablVac2M" @change="tableResumVac2M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumVac2M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.VACUNAS_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Vacunas 2 Meses</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formVaccine2M" @submit.prevent="PrintVac2M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redVac12" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distVac12" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioVac12" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeVac12" v-select2 required>
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

        <!-- MODAL VACUNAS DE 4 MESES -->
        <div class="modal fade" id="modalVaccine4M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Vacunas de 4 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablVac4M" @change="tableResumVac4M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumVac4M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.VACUNAS_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Vacunas 4 Meses</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formVaccine4M" @submit.prevent="PrintVac4M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redVac4" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distVac4" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioVac4" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeVac4" v-select2 required>
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

        <!-- MODAL VACUNAS DE 6 MESES -->
        <div class="modal fade" id="modalVaccine6M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Vacunas de 6 Meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTablVac4M" @change="tableResumVac6M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumVac6M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.VACUNAS_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Vacunas 6 Meses</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formVaccine6M" @submit.prevent="PrintVac6M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redVac6" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distVac6" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioVac6" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeVac6" v-select2 required>
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

        <!-- MODAL TAMIZAJE 6 MESES -->
        <div class="modal fade" id="modalTmz6M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tamizaje - 6 meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableTmz6M" @change="tableResumTmz6M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumTmz6M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.TMZ_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Tamizaje</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formTmz6M" @submit.prevent="PrintTmz6M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redTmz6M" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distTmz6M" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioTmz6M" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeTmz6M" v-select2 required>
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

        <!-- MODAL TAMIZAJE 12 MESES -->
        <div class="modal fade" id="modalTmz12M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tamizaje - 12 meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableTmz12M" @change="tableResumTmz12M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumTmz12M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.TMZ_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Tamizaje</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formTmz12M" @submit.prevent="PrintTmz12M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redTmz12M" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distTmz12M" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioTmz12M" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeTmz12M" v-select2 required>
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

        <!-- MODAL TAMIZAJE 18 MESES -->
        <div class="modal fade" id="modalTmz18M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tamizaje - 18 meses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-2 col-md-3">
                                    <select class="form-control" data-width="100%" v-model="anioTableTmz18M" @change="tableResumTmz18M">
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
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTablResumTmz18M" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.TMZ_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br><br>
                                <div class="card" style="border-color: #198754;">
                                <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Tamizaje</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formTmz18M" @submit.prevent="PrintTmz18M">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="redTmz18M" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distTmz18M" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="anioTmz18M" v-select2 required>
                                                    <option value="-">Seleccione Año</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="TODOS">TODOS</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeTmz18M" v-select2 required>
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
    </div>

    <script src="./js/meta4/kids/js/met4kids.js"></script>
    <script src="./js/meta4/kids/vue/creds.js"></script>
    {{-- <script src="./js/meta4/kids/vue/suple.js"></script> --}}
@endsection

@section('scripts')

@endsection