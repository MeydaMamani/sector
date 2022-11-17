@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appKids">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5 class="mb-0"><b> JUNTOS: </b>Gestantes</h5>
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
                                            <img src="./img/pregnant_total.png" width="33" alt="icon cantidad total">
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
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Exámenes Auxiliares</h3>
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
                                                        <div class="barChartEA" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-outline-primary w-100 btn-sm p-3" data-toggle="modal" data-target="#modalEA" @click="tableResumEA">
                                                        <img src="./img/pregnant_incorrect.png" width="40" alt="img bateria" class="mb-2">
                                                        <p class="mb-0">Examenes Auxiliares</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-outline card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Atención Prenatal</h3>
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
                                                        <div class="barChartAP" style="height: 160px; padding: 0px 10px 2px 0px;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-outline-success w-100 btn-sm p-3" data-toggle="modal" data-target="#modalAP" @click="tableResumAP">
                                                        <img src="./img/pregnant_correct.png" width="40" alt="img bateria" class="mb-2">
                                                        <p class="mb-0">Examenes Auxiliares</p>
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

        <!-- MODAL PARA EXAMENES AUXIALIARES -->
        <div class="modal fade" id="modalEA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Exámenes Auxiliares</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="table-responsive" id="cred_juntos">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="font-10 text-center" style="background: #e0eff5;">
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Provincia</th>
                                                <th class="align-middle">Distrito</th>
                                                <th class="align-middle">Den</th>
                                                <th class="align-middle">Num Juntos</th>
                                                <th class="align-middle">% Juntos</th>
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">% His</th>
                                                <th class="align-middle">Coin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTabResumEA" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA_RES ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO_RES ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.BATERIA_JUNT ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_JUNT)]]%</td>
                                                <td class="align-middle text-center">[[ format.BATERIA_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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
                                <div class="card" style="border-color: #198754;">
                                    <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">Examenes Auxiliares</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formEA" @submit.prevent="PrintEA">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provEA" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distEA" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeEA" v-select2 required>
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

        <!-- MODAL PARA TAMIZAJE DE 6 MESES -->
        <div class="modal fade" id="modalAP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Atenciones PreNatales</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="table-responsive" id="cred_juntos">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="font-10 text-center" style="background: #e0eff5;">
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Provincia</th>
                                                <th class="align-middle">Distrito</th>
                                                <th class="align-middle">Den</th>
                                                <th class="align-middle">Num Juntos</th>
                                                <th class="align-middle">% Juntos</th>
                                                <th class="align-middle">Num His</th>
                                                <th class="align-middle">% His</th>
                                                <th class="align-middle">Coin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(format, key) in lisTabResumAP" class="font-9">
                                                <td class="align-middle text-center">[[ key+1 ]]</td>
                                                <td class="align-middle">[[ format.PROVINCIA_RES ]]</td>
                                                <td class="align-middle">[[ format.DISTRITO_RES ]]</td>
                                                <td class="align-middle text-center">[[ format.DENOMINADOR ]]</td>
                                                <td class="align-middle text-center">[[ format.NUM_JUNT ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_JUNT)]]%</td>
                                                <td class="align-middle text-center">[[ format.NUM_HIS ]]</td>
                                                <td class="align-middle text-center">[[ Math.round(format.AVANCE_HIS) ]]%</td>
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
                                <div class="card" style="border-color: #198754;">
                                    <h5 class="card-header text-white text-center p-1 font-13" style="background: #198754;">APN</h5>
                                    <div class="card-body p-2">
                                        <form method="POST" id="formAP" @submit.prevent="PrintAP">
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" v-model="red" name="provAP" @change="filtersDistricts" v-select2 required>
                                                    <option value="">Seleccione Red</option>
                                                    <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="distAP" v-select2 required>
                                                    <option value="">Seleccione Distrito</option>
                                                    <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <select class="form-control select2 show-tick" data-width="100%" name="typeAP" v-select2 required>
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

    <script src="./js/juntos/pregnants/vue/pregnants.js"></script>
    <script src="./js/juntos/pregnants/js/pregnants.js"></script>
@endsection

@section('scripts')

@endsection