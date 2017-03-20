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
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('contratos.index') }}" id="contratos">Contratos</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="#" id="receptors">Rutas</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="#" id="giros">Giros</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="# " id="users">Opciones Avanzadas</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="# " id="users">Cierre</a>
            </li>
            <li>
                <a href="{{ route('auth.logout') }}"> Salid del Sistema </a>
            </li>
            @endif
            </ul>           
        </div>
    </div>
</div>