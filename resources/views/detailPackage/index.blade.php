@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appPackageKidsPregnant">
        <section class="content">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 mt-3 text-end">
                            <div class="card">
                                <div class="card-body border border-primary p-2">
                                    <form method="POST" id="formulario" @submit.prevent="searchFormUser">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 filter_fed mt-1">
                                                <select class="custom-select form-control-border" name="type" id="type" v-model="type">
                                                    <option value="1">Niño</option>
                                                    <option value="2">Gestante</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 filter_fed mb-2 mt-1">
                                                <input class="form-control form-control-border" ref='focusMe' type="text" name="doc" placeholder="Ingrese su dni..." maxlength="8">
                                            </div>
                                            <div class="col-md-4 mt-1 p-0">
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-primary btn-sm m-1" type="submit"> Buscar</button>
                                                    <button class="btn btn-secondary btn-sm m-1" type="button" id="clear"> Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mt-4">
                            <ul class="list-group p-1" v-show="viewKids">
                                <li class="list-group-item d-flex border-primary text-center">
                                    <div class="col-md-5">
                                        <b>DNI: </b><span> [[ listsKids.DOCUMENTO ]]</span>
                                    </div>
                                    <div class="col-md-7">
                                        <b>Fecha de Nacido:</b><span> [[ listsKids.FECHA_NACIMIENTO_NINO ]]</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group p-1" v-show="viewPregnant">
                                <li class="list-group-item d-flex border-primary justify-content-center">
                                    <b class="mr-3">Número de DNI: </b><span> [[ listPregnant.DOCUMENTO ]]</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2 mt-3" v-show="nameBdView">
                            <div class="box mt-3">
                              <span></span>
                              <span class="span2"></span>
                              <span></span>
                              <span class="span2"></span>
                              <h6 class="text-center mb-0">[[ nameBD.BD ]]</h6>
                            </div>
                        </div>
                    </div>
                    <div class="page-wrapper">
                        <div class="design_boy" v-show="viewKids">
                            @include('detailPackage.kids')
                        </div>
                        <div class="design_pregnant" v-show="viewPregnant">
                            @include('detailPackage.pregnant')
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script src="./js/patient/vue/users.js"></script>
    <script src="./js/patient/js/users.js"></script>
@endsection

@section('javascript')
@endsection