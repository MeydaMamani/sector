@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appCunaScd">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5 class="mb-0">Scd</span></h5>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right font-14">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Scd</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card card-success border border-success">
                                <div class="card-header bg-olive">
                                    <h3 class="card-title">Reporte Nominal</h3>
                                </div>
                                <form method="POST" id="formulario" @submit.prevent="PrintNominal">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1" class="font-13">Seleccione una Red:</label>
                                                    <select class="form-control select2 show-tick" style="width: 100%;" v-model="red" name="red" id="red" @change="filtersDistricts" v-select2>
                                                        <option value="">Seleccione Red</option>
                                                        <option v-for="format in listProvinces" :value="format.Provincia">[[ format.Provincia ]]</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1" class="font-13">Seleccione un Distrito:</label>
                                                    <select class="form-control select2 show-tick" style="width: 100%;" v-model="distrito" name="distrito" id="distrito" v-select2>
                                                        <option value="">Seleccione Distrito</option>
                                                        <option v-for="format in listDistricts" :value="format.Distrito">[[ format.Distrito ]]</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1" class="font-13">Seleccione Año:</label>
                                                    <select class="form-control select2 show-tick" style="width: 100%;" v-model="anio" id="anio" name="anio" v-select2>
                                                        <option value="">Seleccione año</option>
                                                        <option value="2022">2022</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center p-1">
                                        <button type="submit" id="export_data" name="exportarCSV" class="btn btn-outline-success btn-sm m-2"><i class="fa fa-download"></i> Descargar Excel</button>
                                    </div>
                                </form>
                              </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script src="./js/cuna/scd/vue/scd.js"></script>

@endsection

@section('javascript')
@endsection