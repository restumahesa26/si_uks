<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="{{ url('profile.png') }}">
        </div>
        <div class="user-name">
            {{ Auth::user()->nama }}
        </div>
        <div class="user-designation">
            {{ Auth::user()->email }}
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item @if(Route::is('dashboard') || Route::is('profile.*')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item @if(Route::is('data-siswa.*')) active @endif">
            <a class="nav-link" href="{{ route('data-siswa.index') }}">
                <i class="fa fa-graduation-cap menu-icon"></i>
                <span class="menu-title">Data Siswa</span>
            </a>
        </li>
        <li class="nav-item @if(Route::is('data-terapi,*')) active @endif">
            <a class="nav-link" href="{{ route('data-terapi.index') }}">
                <i class="fa fa-medkit menu-icon"></i>
                <span class="menu-title">Data Terapi</span>
            </a>
        </li>
        <li class="nav-item @if(Route::is('pemeriksaan.*')) active @endif">
            <a class="nav-link" href="{{ route('pemeriksaan.index') }}">
                <i class="fa fa-stethoscope menu-icon"></i>
                <span class="menu-title">Pemeriksaan</span>
            </a>
        </li>
        <li class="nav-item @if(Route::is('data-petugas.*')) active @endif">
            <a class="nav-link" href="{{ route('data-petugas.index') }}">
                <i class="fa fa-user-md menu-icon"></i>
                <span class="menu-title">Data Petugas</span>
            </a>
        </li>
        <li class="nav-item @if(Route::is('laporan.*')) active @endif">
            <a class="nav-link" href="{{ route('laporan.index') }}">
                <i class="fa fa-print menu-icon"></i>
                <span class="menu-title">Laporan</span>
            </a>
        </li>
    </ul>
</nav>
