<aside id="layout-menu" class="layout-menu menu-vertical menu" style="background: #343A40">
    <div class="app-brand demo">
      <a href="/" class="app-brand-link">
        <span class="app-brand-logo demo">
          {{-- Logo Image --}}
          <img height="48px" src="{{ asset('assets/img/ghb.png') }}" alt="SFGHB">
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <span style="padding: 10px 30px; font-size: 11px; font-weight:200">MAIN</span>
      <!-- Dashboard -->
      <li class="menu-item 
      @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
            active
          @endif">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class='bx bxs-home-heart'></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Devotions -->      
      <li class="menu-item 
      @if (request()->routeIs('devotions.index') || request()->routeIs('devotions.create') || request()->routeIs('devotions.edit'))
      active
      @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxs-bible' ></i>
          <div data-i18n="Layouts">Devotion</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item 
          @if(request()->routeIs('devotions.index'))
            active
          @endif">
            <a href="{{ route('devotions.index') }}" class="menu-link">
              <div data-i18n="Without menu">Lists</div>
            </a>
          </li>
          <li class="menu-item
          @if(request()->routeIs('devotions.create'))
            active
          @endif">
            <a href="{{ route('devotions.create') }}" class="menu-link">
              <div data-i18n="Without navbar">Add New</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Published</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">UnPublished</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Comments</div>
            </a>
          </li>
        </ul>
      </li>
     

      
      {{-- <li class="menu-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <a href="{{ route('logout') }}" class="menu-link"
        onclick="event.preventDefault();
                                this.closest('form').submit();">
          <i class="bx bx-power-off"></i>
          <div data-i18n="Tables">Logout</div>
        </a>
        </form>
      </li> --}}
    </ul>
  </aside>
  <!-- / Menu -->