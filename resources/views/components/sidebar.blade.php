<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                {{-- CORE --}}
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                {{-- ================= ADMIN ================= --}}
                @if(auth()->user()->role == 'admin')
                    <div class="sb-sidenav-menu-heading">Admin</div>

                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        User
                    </a>

                            <a class="nav-link" href="{{ route('admin.alat.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
    Alat
</a>
                    <a class="nav-link" href="{{ route('admin.kategori.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                        Kategori
                    </a>

                    <a class="nav-link" href="{{ route('admin.peminjaman.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-hand-holding"></i></div>
                        Peminjaman
                    </a>

                    <a class="nav-link" href="{{ route('admin.pengembalian.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
                        Pengembalian
                    </a>

                    <a class="nav-link" href="{{ route('admin.logaktivitas.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                        Log Aktivitas
                    </a> 
           
                @endif


                {{-- ================= PETUGAS ================= --}}
                @if(auth()->user()->role == 'petugas')
                    <div class="sb-sidenav-menu-heading">Petugas</div>

                  <a class="nav-link" href="{{ route('petugas.peminjaman') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
    Setujui Peminjaman</a>


<a class="nav-link" href="{{ route('petugas.pengembalian') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
    Monitoring Pengembalian
</a>

                    <a class="nav-link" href="{{ route('petugas.laporan') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                        Cetak Laporan
                    </a>
                @endif


               {{-- ================= PEMINJAM ================= --}}
@if(auth()->user()->role == 'user')

    <div class="sb-sidenav-menu-heading">Peminjam</div>

    <a class="nav-link" href="{{ route('user.alat.index') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Daftar Alat
    </a>
    
<a class="nav-link" href="{{ route('user.peminjaman') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
        Peminjaman Saya
    </a>

    <a class="nav-link" href="{{ route('user.pengembalian.index') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
        Kembalikan Alat
    </a>

@endif
            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
          
    {{ auth()->user()->name }}

    </nav>
</div>