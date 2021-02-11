<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/depot/dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>

            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stock" aria-expanded="false" aria-controls="stock">
              <i class="ti-server  menu-icon"></i>
              <span class="menu-title">Gestion du Stock</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stock">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/depot/liststock')}}">List Stock </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/depot/datastock')}}">Stock</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>