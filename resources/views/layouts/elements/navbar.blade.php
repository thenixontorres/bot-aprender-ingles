<div class="row row-header"> 
    <section class="jumbotron jumbotron-and">
        <div class="container">
            <h1 class="titulo">FUNSYSTEM</h1>
            <p>Todo lo que deseas en un solo sistema</p>
        </div>
    </section>
</div>
<!-- Navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
	       @if(Auth::user())        
        <li class="dropdown">
            <a href="·
            #" class="dropdown-toggle" data-toggle="dropdown" role="button">Contratos
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('contratos.individuales') }}">Ver Contratos Individuales</a></li>
                <li><a href="{{ route('contratos.colectivos') }}">Ver Contratos Colectivos</a></li>
                <li><a href="{{ route('contratos.individuales_create') }}">Registrar Contratos Individuales</a></li>
                <li><a href="{{ route('contratos.colectivos_create') }}">Registrar Contratos Colectivos</a></li>
            </ul>
        </li>
        <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('rutas.index')}}" id="receptors">Rutas</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('contratos.giros') }}" id="giros">Giros</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="# " id="users">Cierre</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('empleados.index') }}" id="giros">Empleados</a>
              </li>         
            <li class="dropdown">
            <a href="·
            #" class="dropdown-toggle" data-toggle="dropdown" role="button">Opciones Avanzadas
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <!-- <li><a href="{{ route('clausulas.index') }}">Clausulas</a></li> -->
                <li><a href="{{ route('estados.index') }}">Estados</a></li>
                <li><a href="{{ route('municipios.index') }}">Municipios</a></li>
                <li><a href="{{ route('planes.index') }}">Planes</a></li>
                <li><a href="{{ route('clausulas.create') }}">Agregar Clausulas</a></li>
            </ul>
        </li>
            <li>
                <a href="{{ route('auth.logout') }}"> Salir del Sistema </a>
            </li>
            @endif
            </ul>           
        </div>
    </div>
</div>