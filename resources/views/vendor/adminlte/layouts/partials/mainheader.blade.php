<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>i</b>R</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>i</b>Resto <small>1.0</small></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->

                <!-- Tasks Menu -->

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Administración</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header"><p>
                                    Hola {{ Auth::user()->name }}
                                </p>
                                <br><br>
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>
                            </li>
                            <!-- Menu Body -->
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
