<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="./img/logo2.png" alt="Logo Diresa" class="brand-image elevation-3 img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">DEIT - PASCO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Name User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- @foreach(session('dataPerson') as $user) --}}
            <div class="image">
                {{-- @if ($user->gender == 'F') --}}
                    {{-- <img src="dist/img/user7-128x128.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                {{-- @else --}}
                    <img src="./img/woman.png" class="img-circle elevation-2" alt="User Image" style="background: white;">
                {{-- @endif --}}
            </div>
            <div class="info">
                <a href="#" class="d-block text-white"> Hola Meyda</a>
            </div>
            {{-- @endforeach --}}
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i><img src="{{ asset('./img/menu/juntos.png') }}" width="30" alt="imagen-seg"></i>
                        <p class="ml-2">Juntos <i class="right fas fa-angle-left pt-1"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/juntkids') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Niños</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestantes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i><img src="{{ asset('./img/menu/meta4.png') }}" width="30" alt="imagen-ind"></i>
                        <p class="ml-2">Meta 4 <i class="right fas fa-angle-left pt-1"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/met4kids') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Niños</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestantes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i><img src="{{ asset('./img/menu/fed.png') }}" width="30" alt="imagen-fed"></i>
                        <p class="ml-2">FED <i class="right fas fa-angle-left pt-1"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-male nav-icon"></i>
                                <p>Niños</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/premature') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Niños Prematuros</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/tmz') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tamizaje Neonatal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/supplementation') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Niños 4 Meses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/iniOport') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Incio Oportuno</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/cred') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cred Avance Mensual</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/childPackage') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Paquete Completo</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-female nav-icon"></i>
                                <p>Gestantes</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/bateria') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bateria Completa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/tratamiento') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tmz e Inicio de Tratamiento por Violencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/newUsers') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarias Nuevas con Tmz de Violencia (GG-VI02)</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user-nurse nav-icon"></i>
                                <p>Medicamentos</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/professionals') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cantidad de Profesionales EPP(2020 FED)</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/sisCovid') }}" class="nav-link">
                                <i class="fa fa-user-nurse nav-icon"></i>
                                <p>Sis-Covid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i><img src="{{ asset('./img/menu/tracing.png') }}" width="30" alt="imagen-covid"></i>
                        <p class="ml-2">Seguimiento <i class="right fas fa-angle-left pt-1"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Niños</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestante</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>