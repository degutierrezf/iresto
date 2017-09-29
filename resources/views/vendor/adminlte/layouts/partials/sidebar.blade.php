<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->

        @if (Auth::user()->level==0)
            <ul class="sidebar-menu">
                <li class="header">General</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ url('mesas') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
                <li class="">
                    <a href="{{ url('/logout') }}" id="logout"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class='fa fa-sign-out'></i> <span> Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="submit" value="logout" style="display: none;">
                    </form></li>
            </ul>
        @else
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">General</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-cutlery'></i> <span>Restorant</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/resto/activas">Ventas Activas</a></li>
                    <li><a href="/resto/realizadas">Ventas Realizadas</a></li>
                    <li><a href="/resto/informe">Informe de Ventas</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-bed'></i> <span>Cabañas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/cabana/reserva">Nueva Reserva</a></li>
                    <li><a href="/cabana/activas">Reservas Activas</a></li>
                    <li><a href="/cabana/historicas">Reservas Históricas</a></li>
                    <li><a href="/cabana/informe">Informe Reservas</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>Pagos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Pagos Activos</a></li>
                    <li><a href="#">Histórico de Pagos</a></li>
                    <li><a href="#">Informe de Pagos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Clientes / Proveedores</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Nuevo Cliente / Proveedor</a></li>
                    <li><a href="#">Gestión Cliente / Proveedor</a></li>
                </ul>
            </li>

            <li class="header">Stock</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-archive'></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Crear Sub-Producto</a></li>
                    <li><a href="#">Crear Producto</a></li>
                    <li><a href="#">Listado Stock Mínimo</a></li>
                    <li><a href="#">Compra de Productos</a></li>
                    <li><a href="#">Bodega y Merma</a></li>
                </ul>
            </li>

            <li class="header">Informes</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Informes</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>Compras</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Informes</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-line-chart'></i> <span>Estadísticas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Ventas</a></li>
                    <li><a href="#">Reservas</a></li>
                    <li><a href="#">Inventario / Bodega</a></li>
                </ul>
            </li>

            <li class="header">Sistema</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-gear'></i> <span>Opciones Generales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Configuración General</a></li>
                    <li><a href="#">Usuario del Sistema</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
        @endif

    </section>
    <!-- /.sidebar -->
</aside>
