<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}
        <a class="navbar-brand" href={{url('graph')}}>Tracker</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="navbar-nav navbar-top-links navbar-right">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('user/create') }}">{{ __('Registrarse') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                {{--<li class="sidebar-search">--}}
                    {{--<div class="input-group custom-search-form">--}}
                        {{--<input type="text" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="button">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                            {{--</span>--}}
                    {{--</div>--}}
                    {{--<!-- /input-group -->--}}
                {{--</li>--}}
                <li>
                    <a href={{url('graph')}}><i class="fa fa-area-chart fa-fw"></i> Gráfico</a>
                </li>
                @Auth

                    @if(Auth::user()->roles->first()->name == 'admin')
                <li>
                    <a href={{url('otros')}}><i class="fa fa-wrench fa-fw"></i> Administración areas</a>
                </li>
                <li>
                    <a href={{url('user')}}><i class="fa fa-wrench fa-fw"></i> Administración de usuarios</a>
                </li>
                    @endif

                    <li>
                        <a href={{url('persona/'.Auth::user()->persona->id)}}><i class="fa fa-suitcase fa-fw"></i> Configuración de perfil</a>
                    </li>
                @EndAuth

                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a href="flot.html">Flot Charts</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="morris.html">Morris.js Charts</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a href="panels-wells.html">Panels and Wells</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="buttons.html">Buttons</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="notifications.html">Notifications</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="typography.html">Typography</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="icons.html"> Icons</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="grid.html">Grid</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a href="#">Second Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">Second Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                            {{--<ul class="nav nav-third-level">--}}
                                {{--<li>--}}
                                    {{--<a href="#">Third Level Item</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Third Level Item</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Third Level Item</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Third Level Item</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<!-- /.nav-third-level -->--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a href="blank.html">Blank Page</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="login.html">Login Page</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>