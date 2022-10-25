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

    <ul class="menu-inner py-1 pb-5">
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

      <!-- events -->      
      <li class="menu-item 
      @if (request()->routeIs('events.index') || request()->routeIs('events.create') || request()->routeIs('events.edit'))
      active
      @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxs-calendar-event' ></i>
          <div data-i18n="Layouts">Events</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item 
          @if(request()->routeIs('events.index'))
            active
          @endif">
            <a href="{{ route('events.index') }}" class="menu-link">
              <div data-i18n="Without menu">Lists</div>
            </a>
          </li>
          <li class="menu-item
          @if(request()->routeIs('events.create'))
            active
          @endif">
            <a href="{{ route('events.create') }}" class="menu-link">
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

      <!-- news -->      
      <li class="menu-item 
      @if (request()->routeIs('news.index') || request()->routeIs('news.create') || request()->routeIs('news.edit'))
      active
      @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxs-news' ></i>
          <div data-i18n="Layouts">News</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item 
          @if(request()->routeIs('news.index'))
            active
          @endif">
            <a href="{{ route('news.index') }}" class="menu-link">
              <div data-i18n="Without menu">Lists</div>
            </a>
          </li>
          <li class="menu-item
          @if(request()->routeIs('news.create'))
            active
          @endif">
            <a href="{{ route('news.create') }}" class="menu-link">
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

            <!-- Users -->      
            <li class="menu-item 
            {{-- @if (request()->routeIs('devotions.index') || request()->routeIs('devotions.create') || request()->routeIs('devotions.edit'))
            active
            @endif --}}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='bx bxs-user-detail'></i>
                <div data-i18n="Layouts">Participants</div>
              </a>
      
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Container">Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Container">Admin</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bxs-music' ></i>
                <div data-i18n="Analytics">Audio</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bx-broadcast' ></i>
                <div data-i18n="Analytics">Broadcasts</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bxs-map-pin' ></i>
                <div data-i18n="Analytics">Chapters</div>
              </a>
            </li>

            <li class="menu-item 
             @if(request()->routeIs('healths.index') || request()->routeIs('healths.create'))
                  active
                @endif
                ">
              <a href="{{ route('healths.index') }}" class="menu-link">
                <i class='bx bx-plus-medical' ></i>
                <div data-i18n="Analytics">Health</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bx-history' ></i>
                <div data-i18n="Analytics">Activities</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bxs-notification' ></i>
                <div data-i18n="Analytics">Notifications</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bxs-church' ></i>
                <div data-i18n="Analytics">Prayers</div>
              </a>
            </li>

            <li class="menu-item 
            {{-- @if(request()->routeIs('dashboard') || request()->routeIs('dashboard.home'))
                  active
                @endif --}}
                ">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class='bx bxs-credit-card-alt' ></i>
                <div data-i18n="Analytics">Transactions</div>
              </a>
            </li>
     

      
      <!-- pages -->      
      <li class="menu-item 
      @if (request()->routeIs('page.faq') || request()->routeIs('page.others') || request()->routeIs('livestream.edit') || request()->routeIs('page.chapter') || request()->routeIs('page.social'))
      active
      @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='bx bxs-news' ></i>
          <div data-i18n="Layouts">Pages</div>
        </a>

        <ul class="menu-sub">
          {{-- <li class="menu-item 
          @if(request()->routeIs('news.index'))
            active
          @endif">
            <a href="{{ route('news.index') }}" class="menu-link">
              <div data-i18n="Without menu">Lists</div>
            </a>
          </li> --}}
          

          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Faq</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Other Pages</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{ route('livestream.edit') }}" class="menu-link">
              <div data-i18n="Container">Livestream</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Chapter background info</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Container">Social Media</div>
            </a>
          </li>

        </ul>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->