        
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header text-center">
                <h3>UTEC</h3>
            </div>
            <div class="user-info text-center">
                <img src="{{asset('img/user.png')}}" class="img user-img" alt="user-image"><br>
                <b><span>{{ auth()->user()->nombres." ".auth()->user()->apellidos }}</span></b><br>
                <span>
                    @foreach(auth()->user()->usersRoles as $rol)
                        {{ $rol->name}}
                    @endforeach
                </span>
            </div>
            <ul class="list-unstyled components">
                <p class="text-center">Menu principal</p>
                <li>
                    <a href="#"><i class="fas fa-home ml-3"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-users ml-3"></i> Mi Centa</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-network-wired ml-3"></i> Mi Laboratorio</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-book-reader ml-3"></i> Practicas Libres</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-chart-pie ml-3"></i> Reportes</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt ml-3"></i> Cerrar Sesion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                </li>
            </ul>
        </nav>