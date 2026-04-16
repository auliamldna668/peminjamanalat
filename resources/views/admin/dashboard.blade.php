<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
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

            /* ── BASE ── */
            body { background-color: var(--bg-body) !important; font-family: 'DM Sans', sans-serif; color: var(--text-main); }
            #layoutSidenav_content main,
            #layoutSidenav_content { background-color: var(--bg-body) !important; }

            /* ── PAGE HEADER ── */
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

            /* ── STAT CARDS ── */
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

            /* ── SECTION TITLE ── */
            .section-title {
                font-family: 'Playfair Display', serif; font-size: 1.1rem;
                font-weight: 600; color: var(--text-main); margin-bottom: 14px;
                display: flex; align-items: center; gap: 10px;
            }
            .section-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }

            /* ── CONTENT CARD ── */
            .content-card {
                background: var(--bg-card); border-radius: var(--radius);
                border: 1.5px solid var(--border); box-shadow: var(--shadow); overflow: hidden;
                animation: fadeUp 0.5s ease both;
            }
            .content-card-header {
                padding: 18px 24px; border-bottom: 1.5px solid var(--border);
                display: flex; align-items: center; justify-content: space-between;
            }
            .content-card-header h3 { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 600; margin: 0; }
            .content-card-body { padding: 20px 24px; }

            /* ── TABLE ── */
            .pastel-table { width: 100%; border-collapse: separate; border-spacing: 0 6px; }
            .pastel-table thead th {
                font-size: 0.71rem; text-transform: uppercase; letter-spacing: 0.9px;
                color: var(--text-muted); font-weight: 600; padding: 4px 14px 10px;
                border: none; background: transparent;
            }
            .pastel-table tbody tr { background: var(--bg-card); transition: background 0.15s; }
            .pastel-table tbody tr:hover { background: var(--bg-body); }
            .pastel-table tbody td {
                padding: 12px 14px; font-size: 0.875rem; color: var(--text-main);
                border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
                vertical-align: middle;
            }
            .pastel-table tbody td:first-child { border-left: 1px solid var(--border); border-radius: 10px 0 0 10px; }
            .pastel-table tbody td:last-child  { border-right: 1px solid var(--border); border-radius: 0 10px 10px 0; }

            .avatar-circle {
                width: 32px; height: 32px; border-radius: 50%;
                display: inline-flex; align-items: center; justify-content: center;
                font-size: 0.72rem; font-weight: 700; flex-shrink: 0;
            }
            .borrower-cell { display: flex; align-items: center; gap: 10px; }
            .borrower-name { font-weight: 500; font-size: 0.875rem; }
            .borrower-id   { font-size: 0.72rem; color: var(--text-muted); }

            /* ── BADGES ── */
            .badge-pastel {
                display: inline-flex; align-items: center; gap: 5px;
                font-size: 0.72rem; font-weight: 600; padding: 4px 11px; border-radius: 20px;
            }
            .badge-pastel.returned  { background: var(--p-mint);    color: var(--accent-mint); }
            .badge-pastel.borrowed  { background: var(--p-sky);     color: var(--accent-sky); }
            .badge-pastel.late      { background: var(--p-rose);    color: var(--accent-rose); }
            .badge-pastel.waiting   { background: var(--p-lavender);color: var(--accent-lavender); }

            /* ── EQUIPMENT LIST ── */
            .equip-item { display: flex; align-items: center; gap: 14px; padding: 13px 0; border-bottom: 1px solid var(--border); }
            .equip-item:last-child { border-bottom: none; }
            .equip-emoji { width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
            .equip-info { flex: 1; min-width: 0; }
            .equip-name  { font-size: 0.875rem; font-weight: 500; }
            .equip-total { font-size: 0.72rem; color: var(--text-muted); }
            .equip-bar-wrap { height: 5px; background: var(--border); border-radius: 99px; margin-top: 5px; overflow: hidden; }
            .equip-bar  { height: 100%; border-radius: 99px; transition: width 0.7s cubic-bezier(.4,0,.2,1); }
            .avail-count{ font-size: 0.85rem; font-weight: 700; min-width: 28px; text-align: right; }

            /* ── QUICK ACTIONS ── */
            .quick-btn {
                display: flex; align-items: center; gap: 14px;
                padding: 13px 18px; border-radius: var(--radius-sm);
                border: 1.5px solid var(--border); background: var(--bg-card);
                color: var(--text-main); font-size: 0.875rem; font-weight: 500;
                text-decoration: none; transition: all 0.2s; cursor: pointer; width: 100%; margin-bottom: 10px;
            }
            .quick-btn:hover { transform: translateX(4px); border-color: transparent; box-shadow: var(--shadow-hover); text-decoration: none; color: var(--text-main); }
            .quick-btn .qb-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0; }
            .quick-btn .qb-arrow { margin-left: auto; color: var(--text-muted); font-size: 0.75rem; }
            .quick-btn.q-rose:hover  { background: var(--p-rose); }
            .quick-btn.q-mint:hover  { background: var(--p-mint); }
            .quick-btn.q-sky:hover   { background: var(--p-sky); }
            .quick-btn.q-peach:hover { background: var(--p-peach); }

            /* ── ACTIVITY FEED ── */
            .activity-item { display: flex; gap: 14px; padding: 12px 0; border-bottom: 1px solid var(--border); }
            .activity-item:last-child { border-bottom: none; }
            .activity-dot { width: 10px; height: 10px; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
            .activity-text { font-size: 0.84rem; line-height: 1.5; }
            .activity-text strong { font-weight: 600; }
            .activity-time { font-size: 0.72rem; color: var(--text-muted); margin-top: 3px; }

            /* ── MISC ── */
            .view-all { font-size: 0.78rem; font-weight: 600; color: var(--accent-lavender); text-decoration: none; display: flex; align-items: center; gap: 4px; }
            .view-all:hover { color: var(--accent-rose); text-decoration: none; }

            /* ── ANIMATIONS ── */
            @keyframes fadeUp {
                from { opacity: 0; transform: translateY(16px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            .stat-card:nth-child(1) { animation-delay: 0.05s; }
            .stat-card:nth-child(2) { animation-delay: 0.12s; }
            .stat-card:nth-child(3) { animation-delay: 0.19s; }
            .stat-card:nth-child(4) { animation-delay: 0.26s; }
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
                            <div class="col-xl-3 col-sm-6">
                                <div class="stat-card rose">
                                    <div class="stat-icon"><i class="fas fa-clipboard-list"></i></div>
                                    <div class="stat-label">Total Peminjaman</div>
                                    <div class="stat-value">-</div>
                                    <div class="stat-sub">
                                        <span class="stat-pill up"><i class="fas fa-arrow-up" style="font-size:.6rem"></i> 12%</span>&nbsp;dari bulan lalu
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="stat-card sky">
                                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                                    <div class="stat-label">Sedang Dipinjam</div>
                                    <div class="stat-value">-</div>
                                    <div class="stat-sub" style="color:var(--accent-sky)">● Aktif sekarang</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="stat-card mint">
                                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                                    <div class="stat-label">Kembali Hari Ini</div>
                                    <div class="stat-value">-</div>
                                    <div class="stat-sub">
                                        <span class="stat-pill up"><i class="fas fa-arrow-up" style="font-size:.6rem"></i> 3</span>&nbsp;lebih dari kemarin
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="stat-card peach">
                                    <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                    <div class="stat-label">Terlambat</div>
                                    <div class="stat-value">-</div>
                                    <div class="stat-sub">
                                        <span class="stat-pill down"><i class="fas fa-arrow-down" style="font-size:.6rem"></i> 2</span>&nbsp;perlu tindakan segera
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="height:32px"></div>
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
        <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
        <script>
            // Live date in Indonesian
            const d = new Date();
            const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            document.getElementById('live-date').textContent =
                days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
        </script>
    </body>
</html>