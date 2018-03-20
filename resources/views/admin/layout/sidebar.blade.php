<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div>
                    @if(\Auth::user()->avatar == null)
                        <img src="{{ asset('uploads/user/default_avatar.jpg') }}" alt="Avatar" class="img-circle">
                    @else
                        <img src="{{ asset('uploads/user/' . \Auth::user()->avatar) }}" alt="Avatar" class="img-circle">
                    @endif
                </div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ url('dashboard/profile') }}"><i class="ti-settings"></i>Perfil</a></li>
                    <li role="separator" class="divider"></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li>
                <a href="{{ url('dashboard') }}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
            </li>

            <li class="nav-small-cap">--- Proffessional</li>

            <li>
                <a href="{{ url('dashboard/blogs') }}" class="waves-effect"><i class="icon-list fa-fw"></i> <span class="hide-menu">Blogs</span></a>
            </li>

            <li>
                <a href="{{ url('dashboard/blogcategs') }}" class="waves-effect"><i class="icon-docs fa-fw"></i> <span class="hide-menu">Blog categorias</span></a>
            </li>

            <li>
                <a href="{{ url('dashboard/services') }}" class="waves-effect"><i data-icon="P" class="linea-icon icon-list linea-basic fa-fw"></i> <span class="hide-menu">Serviços</span></a>
            </li>

            <li class="nav-small-cap">--- Configs</li>

            <li>
                <a href="{{ url('dashboard/settings') }}" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Configurações</span></a>
            </li>

            <li>
                <a href="{{ url('dashboard/users') }}" class="waves-effect"><i data-icon="&#xe00b;" class="fa fa-users"></i> <span class="hide-menu">Usuários</span></a>
            </li>

            <li>
                <a href="{{ url('dashboard/visitors') }}" class="waves-effect"><i data-icon="&#xe00b;" class="fa fa-cloud"></i> <span class="hide-menu">Visitantes</span></a>
            </li>

            <li><a href="javascript:void(0);" class="waves-effect"><i data-icon=")" class="icon-docs fa-fw"></i> <span class="hide-menu">Regras<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ url('dashboard/roles') }}">Regras</a></li>
                    <li> <a href="{{ url('dashboard/perms') }}">Permissões</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('dashboard/logs') }}" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i> Logs</a>
            </li>

            <li class="nav-small-cap">--- Logout</li>

            <li>
                <a class="waves-effect" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <i class="icon-logout fa-fw"></i> <span class="hide-menu">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->
