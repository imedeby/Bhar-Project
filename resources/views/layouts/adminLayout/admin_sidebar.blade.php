<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#facture" aria-expanded="false" aria-controls="facture">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Gestion de Facture</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="facture">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/add_facture')}}">Nouvelle facture</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/hist_facture')}}">Historique facture</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#devis" aria-expanded="false" aria-controls="devis">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Gestion de Devis</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="devis">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/devis')}}">Nouvelle devis </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/hist_devis')}}">Historique devis</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stock" aria-expanded="false" aria-controls="stock">
              <i class="ti-server  menu-icon"></i>
              <span class="menu-title">Gestion du Stock</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stock">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/liststock')}}">List Stock </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/datastock')}}">Stock</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>