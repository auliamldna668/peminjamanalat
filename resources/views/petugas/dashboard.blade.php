
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* ── PASTEL THEME VARIABLES ── */
        :root {
            --p-rose:    #FADADD;
            --p-peach:   #FFE5CC;
            --p-mint:    #C8F0E0;
            --p-sky:     #C9E8F8;
            --p-lavender:#DDD6F3;
            --p-lemon:   #FEF6C0;

            --accent-rose:    #E8899A;
            --accent-peach:   #F4A261;
            --accent-mint:    #52B788;
            --accent-sky:     #4DA8DA;
            --accent-lavender:#9B89D9;
            --accent-lemon:   #D4A017;

            --bg-body:   #FAF8F5;
            --bg-card:   #FFFFFF;
            --text-main: #3D3532;
            --text-muted:#9A9390;
            --border:    #EDE9E4;
            --radius:    18px;
            --radius-sm: 10px;
            --shadow:    0 2px 20px rgba(0,0,0,0.06);
            --shadow-hover: 0 8px 32px rgba(0,0,0,0.10);
        }

        body { background-color: var(--bg-body) !important; font-family: 'DM Sans', sans-serif; color: var(--text-main); }
        #layoutSidenav_content main,
        #layoutSidenav_content { background-color: var(--bg-body) !important; }

        .dash-header {
            display: flex; align-items: flex-end; justify-content: space-between;
            padding: 36px 0 24px; flex-wrap: wrap; gap: 12px;
        }
        .dash-header-left h1 {
            font-family: 'Playfair Display', serif; font-size: 2rem;
            font-weight: 700; color: var(--text-main); margin: 0; letter-spacing: -0.5px;
        }
        .dash-header-left p { margin: 4px 0 0; color: var(--text-muted); font-size: 0.85rem; }
        .dash-date-badge {
            background: var(--p-lavender); color: var(--accent-lavender);
            border-radius: 40px; padding: 8px 18px; font-size: 0.82rem;
            font-weight: 600; display: flex; align-items: center; gap: 7px;
        }

        .stat-card {
            background: var(--bg-card); border-radius: var(--radius);
            border: 1.5px solid var(--border); padding: 24px 24px 20px;
            box-shadow: var(--shadow); transition: box-shadow 0.25s, transform 0.25s;
            position: relative; overflow: hidden;
            animation: fadeUp 0.5s ease both;
        }
        .stat-card:hover { box-shadow: var(--shadow-hover); transform: translateY(-3px); }
        .stat-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 4px; border-radius: var(--radius) var(--radius) 0 0;
        }
        .stat-card.rose::before   { background: var(--accent-rose); }
        .stat-card.sky::before    { background: var(--accent-sky); }
        .stat-card.mint::before   { background: var(--accent-mint); }
        .stat-card.peach::before  { background: var(--accent-peach); }

        .stat-icon {
            width: 48px; height: 48px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; margin-bottom: 14px;
        }
        .stat-card.rose  .stat-icon { background: var(--p-rose);    color: var(--accent-rose); }
        .stat-card.sky   .stat-icon { background: var(--p-sky);     color: var(--accent-sky); }
        .stat-card.mint  .stat-icon { background: var(--p-mint);    color: var(--accent-mint); }
        .stat-card.peach .stat-icon { background: var(--p-peach);   color: var(--accent-peach); }

        .stat-label { font-size: 0.72rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.9px; margin-bottom: 4px; }
        .stat-value { font-family: 'Playfair Display', serif; font-size: 2.6rem; font-weight: 700; line-height: 1; }
        .stat-sub   { font-size: 0.78rem; color: var(--text-muted); margin-top: 8px; }
        .stat-pill  { display: inline-flex; align-items: center; gap: 4px; font-size: 0.72rem; font-weight: 600; padding: 2px 9px; border-radius: 20px; }
        .stat-pill.up   { background: var(--p-mint); color: var(--accent-mint); }
        .stat-pill.down { background: var(--p-rose); color: var(--accent-rose); }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.12s; }
        .stat-card:nth-child(3) { animation-delay: 0.19s; }
    </style>
</head>
<body class="sb-nav-fixed">

<x-navbar></x-navbar>

<div id="layoutSidenav">
    <x-sidebar></x-sidebar>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                {{-- PAGE HEADER --}}
                <div class="dash-header">
                    <div class="dash-header-left">
                        <h1>Selamat Datang 👋</h1>
                        <p>Sistem Peminjaman Alat Olahraga &mdash; </p>
                    </div>
                    <div class="dash-date-badge">
                        <i class="fas fa-calendar-alt"></i>
                        <span id="live-date"></span>
                    </div>
                </div>

                {{-- STAT CARDS --}}
                <div class="row g-3 mb-4">
                    <div class="col-xl-4 col-sm-6">
                        <div class="stat-card rose">
                            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="stat-label">Setujui Peminjaman</div>
                            <div class="stat-value">24</div>
                            <div class="stat-sub">
                                <span class="stat-pill up"><i class="fas fa-arrow-up" style="font-size:.6rem"></i> 8</span>&nbsp;permintaan baru
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="stat-card sky">
                            <div class="stat-icon"><i class="fas fa-eye"></i></div>
                            <div class="stat-label">Memantau Pengembalian</div>
                            <div class="stat-value">15</div>
                            <div class="stat-sub" style="color:var(--accent-sky)">● Aktif sekarang</div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="stat-card mint">
                            <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                            <div class="stat-label">Laporan</div>
                            <div class="stat-value">7</div>
                            <div class="stat-sub">
                                <span class="stat-pill up"><i class="fas fa-arrow-up" style="font-size:.6rem"></i> 2</span>&nbsp;laporan baru
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script>
    const d = new Date();
    const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    document.getElementById('live-date').textContent =
        days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
</script>

</body>
</html>
